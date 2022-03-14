<?php

use App\Http\Middleware\AuthAdmin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Auth::routes();

     //For Pages/ Users
Route::get('/', 'HomeController@index')->name('home');
Route::get('/AllCategories','HomeController@all_categories')->name('categories.all');

          //get Service Provider By subcategories
Route::get('/Service/{category}/{subcategory}','HomeController@servicebycategory');

          //get SubCategories By Category
 Route::get('/{category}','HomeController@subcategory_by_category');
// Route::get('/category','HomeController@subcategory_by_category_');

         
          //Get SubCategory Directly When Choose a Category.
    Route::get('/Get_subcategory/{id}', 'Admin\SubCategoryController@Get_subcategory');
   

           // For Admin
    Route::middleware(['auth','verified','authadmin'])->namespace('Admin')->group(function(){
                Route::resource('Categories', 'CategoryController');
                Route::resource('SubCategory', 'SubCategoryController');

      //   Route::get('getSprovider','CategoryController@getserviceprovider')->name('Sproviders.all');       

    });
   
           // For Service Provider
   Route::middleware(['auth','verified','authsprovider'])->namespace('ServiceProvider')->group(function(){
               Route::resource('ServiceProvider_pro', 'SproviderController');
    });

    //For Cusomer 
    Route::middleware(['auth','verified','authcustomer'])->namespace('Booking')->group(function(){
           Route::resource('Book_now', 'BookingController',
                         ['names' => ['show' => 'book_show', 'store'=>'book_store']] 
                     );

                      //  Route::get('Book_now', 'BookingController@index');

});
            
   
   

