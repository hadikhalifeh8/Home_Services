<?php

namespace App;

use App\Models\Image;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
//use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','utype', 'phone', 'address', 'experiance', 'category', 'sub_category',
        'province','pricee'
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    //علاقه بين المستخدم والمحافظات
    public function province()
    {
        return $this->belongsTo('App\Models\Province', 'province');
    }

     // category علاقه بين المستخدم و  c
     public function category_rltn()
     {
         return $this->belongsTo('App\Models\Category', 'category');
     }

      // sub_category علاقه بين المستخدم و  c
      public function subcategory()
      {
          return $this->belongsTo('App\Models\SubCategory', 'sub_category');
      }

       // علاقة بين مقدم الخدمة والصور لجلب اسم الصور  في جدول مقدم الخدمة 
       public function image()
       {
           return $this->morphOne('App\Models\Image','imageable');
       }
}
