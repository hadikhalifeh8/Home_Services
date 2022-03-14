<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategories extends FormRequest
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
            'name' =>'required|unique:_categories,name,'.$this->id,
        //    'photo'=>'required|image|mimes:jpeg,bmp,png'
              'photo'=>'required_without:id',
              'photo.*'=>'image|mimes:jpg,jpeg,png'
        ];
    }

    public function messages()
{
    return [
        'name.required' => 'please Enter the name',
        'name.unique' => 'This Name Already Exists',

      'photo.required_without'=>'please Enter an image',
        
        //'photo.mimetypes'=>'bla'
        'mimes'=>'image type should jpeg,jpg,png only',
       
    ];
}
}
