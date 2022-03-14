<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookingNow extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'customer_name' =>'required',
            'customer_email'=>'required|email|',
            'customer_phone'=>'required',

       //     'customer_email'=>'required|email|unique:bookings,customer_email',
       //     'customer_phone'=>'required|unique:bookings,customer_phone',

            'booking_date'=>'required|after:today',
            'cst_province_id'=>'required',

        ];
    }



    public function messages()
    {
        return [
            'customer_name.required' => 'please Enter the name',

            'customer_email.required' => 'please Enter the Email',
            'customer_email.email' => 'Must Be an Email Address @',
            'customer_email.unique' => 'This Email already Exist, Please Enter a New Email Address',

            'customer_phone.required' => 'please Enter the Phone Number',
            'customer_phone.unique' => 'This Phone Number already Exist, Please Enter a New Phone Number',

            'booking_date.required'=>'Enter The Date',
            'booking_date.after'=>'You Cannot use tommorow date',
            
            'cst_province_id.required'=>'Please Select a Province',

        ];
    }



}
