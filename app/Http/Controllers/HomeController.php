<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Image;
use App\Models\SubCategory;
use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
     //   $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $subcategory = SubCategory::inRandomOrder()->take(24)->get();

        $all_subcategoriess = SubCategory::all();

        $sprovider = User::where('utype','SVP')->inRandomOrder()->take(3)->get();

        $category_8 = Category::inRandomOrder()->take(8)->get();

        $sprovider_5 = User::where('utype','SVP')->inRandomOrder()->take(5)->get();


        return view('Pages.homePage',compact('subcategory', 'sprovider', 'category_8', 'sprovider_5'));
        return view('Pages.All_SubCategories',compact('all_subcategoriess'));       
    }
            //Service Providers by Subcategory
    public function servicebycategory( $category, $subcategory) 
    {
       $sub_category = SubCategory::where('name',$subcategory)->first();
       $sub_category_id= $sub_category->id;

       $usr = User::where('sub_category',$sub_category_id)->get();
        return view('Pages.Service_by_SubCategory',compact( 'usr','sub_category'));
      }

          
    public function all_categories()
    {
      $categories = Category::all();
      return view('Pages.All_Categories',compact( 'categories'));
    } 
    
  

         // SubCategory By Category
   public function subcategory_by_category($category)
    {
       $Category_s = Category::where('name', $category)->first();
       $category_id = $Category_s->id;

       $subcategory = SubCategory::where('category_id',$category_id)->get();
       return view('Pages.SubCategory_by_Category',compact( 'Category_s','subcategory'));
    }


    // SubCategory By Category
  /*  public function subcategory_by_category()
    {
      
       $category_id = Category::get('id');
       $subcategory = SubCategory::where('category_id',$category_id)->get();
       return view('Pages.SubCategory_by_Category',compact( 'Category_s','subcategory'));
    }*/
  
}
