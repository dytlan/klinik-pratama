<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatientValidation extends FormRequest
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
            'nama'          => 'required|max:50',
            'jk'            => 'required',
            'no_hp'         => 'required|digits_between:10,15|numeric',
            'alamat'        => 'required',
            'nik'            => 'required',
            'tempat_lahir'  => 'required',
            'tanggal_lahir' => 'required',
            'pekerjaan'     => 'required',
            'pendidikan'    => 'required',
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
            'no_hp.digits_between' => 'Nomor handphone minimal :min digit dan maksimal :max digit.',
            'name.max' => ':attribute maksimal :max karakter. ',
        ];
    }
}
