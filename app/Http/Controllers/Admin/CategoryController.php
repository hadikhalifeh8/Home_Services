<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategories;
use App\Models\Category;
use App\Models\Image;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{

      /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      //  $this->middleware('authadmin', ['except' => 'logout']);
        
    }





    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::all();
        return view('AdminPages.Category', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategories $request)
    {
        DB::beginTransaction();

        try {
            $validated = $request->validated();
            $category = new Category();
            $category->name = $request->name;
            $category->save();


               //Insert image
            if($request->hasfile('photo'))
            {
                foreach($request->file('photo') as $file)
                {
                    $name = $file->getClientOriginalName();
                    $file->storeAs('attachments/categories/', $file->getClientOriginalName(),'upload_attachments');

                    // insert in image_table
                    $images= new Image();
                    $images->filename=$name;
                    $images->imageable_id= $category->id;
                    $images->imageable_type = 'App\Models\Category';
                    $images->save();
                }
            }


          DB::commit(); // insert data
          toastr()->success('Category Saved Successfully');
          return redirect()->route('Categories.index');

        } 
        catch (\Exception $ex) {
            DB::rollback();
            return redirect()->back()->withErrors(['error'=>$ex->getMessage()]);
        }


      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

   
    public function update(StoreCategories $request)
    {
       // return $request;
       DB::beginTransaction();
       try {
             $validated =  $request->validated();
             $categories = Category::findOrFail( $request->id);

            $categories->name =  $request->name;
         
            $categories->save();

            if($request->hasfile('photo'))
            {
               // $file->storeAs('attachments/categories/', $file->getClientOriginalName(),'upload_attachments');
              /*  $cat_img = ('attachments/categories/'.$categories->image['filename']); // get previous image from folder
                if (File::exists($cat_img)) { // unlink or remove previous image from folder
                    unlink($cat_img);
                 }*/

                 foreach($request->file('photo') as $file)
                {

                    $name = $file->getClientOriginalName();
                    $file->storeAs('attachments/categories/', $file->getClientOriginalName(),'upload_attachments');

                               
                       $categories->image->update([
                     'filename'=>$name,
                     'imageable_id'=>$categories->id,
                     'imageable_type'=>'App\Models\Category',
                    ]);
                
                
            }

             // Delete img in server disk
      //  Storage::disk('upload_attachments')->delete('attachments/categories/'.$categories->image['filename']);

            /*********************
             * 
             * 
             * foreach
             */
            

                 
           }

              

               DB::commit(); // insert data
             toastr()->success('Category Updated Successfully');
             return redirect()->route('Categories.index');

         
       }  catch (\Exception $ex) {
        DB::rollback();
        return redirect()->back()->withErrors(['error'=>$ex->getMessage()]);
           
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $categories = Category::findOrFail($request->id)->delete();
        toastr()->error('Category has been Deleted Successfully');
        return redirect()->route('Categories.index');
    }
   
}
