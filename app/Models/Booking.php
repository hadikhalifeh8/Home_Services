<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'bookings';
    protected $guarded=[];


 //  علاقه بين الحجز وصاحب المهنه العمل لجلب إسم صاحب العمل  
    public function usr_rltn()
    {
        return $this->belongsTo('App\User', 'sprovider_id');
    }

     //  علاقه بين الحجز والكاتيغوري (الفئه)  لجلب إسم الكاتيغوري (الفئه)  
     public function category_bk_rltn()
     {
         return $this->belongsTo('App\Models\Category', 'category_id');
     }

       //  علاقه بين الحجز و(ساب كات )(الفئه الفرعيه)  لجلب إسم (ساب كات )(الفئه الفرعيه)  
       public function subcategory_bk_rltn()
       {
           return $this->belongsTo('App\Models\SubCategory', 'subcategory_id');
       }

        //  علاقه بين الحجز والمحافظات لجلب إسموالمحافظه  
        public function province_bk_rltn()
        {
            return $this->belongsTo('App\Models\Province', 'province_id');
        }

}
