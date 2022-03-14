<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSubCategory;
use App\Models\Category;
use App\Models\Image;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategory = SubCategory::all();
        $category = Category::all();
        return view('AdminPages.SubCategory', compact('subcategory', 'category'));
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
    public function store(StoreSubCategory $request)
    {
        DB::beginTransaction();
        try {
            $validated = $request->validated();
            $subcategory = new SubCategory();

        $subcategory->name = $request->name;
        $subcategory->category_id = $request->category;
        $subcategory->save();


           // insert img
           if($request->hasfile('photo'))
           {
               foreach($request->file('photo') as $file)
               {
                   $name = $file->getClientOriginalName();
                   $file->storeAs('attachments/subcategories/', $file->getClientOriginalName(),'upload_attachments');

                   // insert in image_table
                   $images= new Image();
                   $images->filename=$name;
                   $images->imageable_id= $subcategory->id;
                   $images->imageable_type = 'App\Models\SubCategory';
                   $images->save();
               }
           }

           DB::commit(); // insert data
        toastr()->success('SubCategory Saved Successfully');
        return redirect()->route('SubCategory.index');

        } catch (\Exception $ex) {
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreSubCategory $request)
    {
        try {
            $validated = $request->validated();
            $subcategory = SubCategory::findOrFail($request->id);

            $subcategory->name = $request->name;
            $subcategory->category_id =$request->category;

         /*   if($request->has('id'))
           {

            $path=('upload_attachments').'attachments/subcategories/'.$subcategory->name.'/'. $request->filename;
           }*/

            $subcategory->save();

            //update  image
            if($request->hasfile('photo'))
            {
                foreach($request->file('photo') as $file)
                {

              $name = $file->getClientOriginalName();
             $file->storeAs('attachments/subcategories/', $file->getClientOriginalName(),'upload_attachments');
            
                    $subcategory->image->update([
                  'filename'=>$name,
                  'imageable_id'=>$subcategory->id,
                  'imageable_type'=>'App\Models\SubCategory',
                 ]);

             }
         }      
            DB::commit();   // insert data
            toastr()->success('SubCategory Updated Successfully');
            return redirect()->route('SubCategory.index');




        }  catch (\Exception $ex) {
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
        $subcategory = SubCategory::findOrFail($request->id)->delete();

            toastr()->error('SubCategory Deleted Successfully');
            return redirect()->route('SubCategory.index');

    }

    public function Get_subcategory($id)
    {
        $list_subcategory = SubCategory::where("category_id", $id)->pluck("name", "id");
        return $list_subcategory;
    }
}
