<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OngPost extends FormRequest
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
          'name' => 'required|string',
          'email' => 'required|email',
          'whatsapp' => 'required|string',
          'city' => 'required|string',
          'uf' => 'required|string|size:2'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'A name is required',
            'email.required'  => 'A email is required',
            'whatsapp.required'  => 'A whatsapp is required',
            'city.required'  => 'A city is required',
            'uf.required'  => 'A uf is required',
        ];
    }
}
