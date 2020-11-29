<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UserValidation extends FormRequest
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
            'nama' => 'required|min:5|max:50',
            'username' => 'required|unique:App\Models\User,username'.Auth::id(),
            'password' => 'required'
        ];
    }

    /**
    * Get the error messages for the defined validation rules.
    *
    * @return array
    */
    public function messages(){
        return [
            '*.required' => ':attribute wajib di isi.',
            'username.unique' => ':input telah terdaftar.',
            'name.min'  => ':attribute minimal :min karakter. ',
            'name.max' => ':attribute maksimal :max karakter. ',
        ];
    }
}
