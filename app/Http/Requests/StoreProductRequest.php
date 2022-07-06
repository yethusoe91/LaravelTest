<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class StoreProductRequest extends FormRequest
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
    * @return array<string, mixed>
    */
    public function rules()
    {
        if($this->_method == 'PATCH'){
            return [
                'name'  => '',
                'price' => '',
                'category_id' => '',
                'image' => 'mimes:png,jpeg,jpg,gif|max:3072',
            ];
        }else{
            return [
                'name'  => 'required',
                'price' => 'required',
                'category_id' => 'required',
                'image' => 'required|mimes:png,jpeg,jpg,gif|max:3072',
            ];
        }
        
    }
    
    public function failedValidation(Validator $validator) { 
        throw new HttpResponseException(response()->json($validator->errors(), 422)); 
    }
    
}
