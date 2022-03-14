<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSubCategory extends FormRequest
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
            'name' =>'required|unique:sub_categories,name,'.$this->id,
            'category'=>'required',
            'photo'=>'required_without:id',
            'photo.*'=>'image|mimes:jpg,jpeg,png'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'please Enter the name',
            'name.unique' => 'This Name Already Exists',
            'category.required' => 'please select the category',
            'photo.required_without'=>'please Enter an image',

            'mimes'=>'image type should jpeg,jpg,png only',
        ];
    }
}
