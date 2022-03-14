<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $table = 'sub_categories';
    protected $fillable=['name','category_id'];
    //protected $guarded=[];




     // علاقة بين الكاتيغوري (الفئه) و(ساب كات )(الفئه الفرعيه)) لجلب اسم  كات في جدول ساب كات
    public function category_rltn()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }

   /* public function user()
    {
        return $this->belongsTo('App\User', 'sub_category');
    }*/

     // علاقة بين الفئة والصور لجلب اسم الصور  في جدول الفئات 
     public function image()
     {
         return $this->morphOne('App\Models\Image', 'imageable');
     }
}
