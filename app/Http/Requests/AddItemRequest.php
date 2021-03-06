<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddItemRequest extends FormRequest
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
            'name'=>['required', 'min:3'],
            'description'=>['required'],
            'price'=>['required', 'numeric', 'min:2' , 'max:50000'],
            'image'=>['required', 'image', 'mimes:jpg,jpeg,png,gif,bmp', 'max:2048'],
            'contact_email'=>['required', 'email:rfc'],
            'contact_telephone'=>['required', 'numeric'],
        ];
    }
}
