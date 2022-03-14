<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    
    protected $table = '_categories';
    protected $fillable=['name'];
   // protected $guarded=[];

/*    public function subcategory_rln()
    {
        return $this->hasMany('App\Models\SubCategory', 'category_id');
    }*/

  /*  public function user()
    {
        return $this->belongsTo('App\User', 'category');
    }*/

     // علاقة بين الفئة والصور لجلب اسم الصور  في جدول الفئات 
     public function image()
     {
         return $this->morphOne('App\Models\Image', 'imageable');
     }
  
}
