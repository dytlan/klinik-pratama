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
            'nama'          => 'required|min:5|max:50',
            'jk'            => 'required',
            'no_hp'         => 'required|digits_between:10,15|numeric',
            'alamat'        => 'required',
            'rt'            => 'required',
            'rw'            => 'required',
            'kelurahan'     => 'required',
            'kecamatan'     => 'required',
            'kota'          => 'required',
            'tempat_lahir'  => 'required',
            'tanggal_lahir' => 'required',
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
            'name.min'  => ':attribute minimal :min karakter. ',
            'name.max' => ':attribute maksimal :max karakter. ',
        ];
    }
}
