<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ObatValidation extends FormRequest
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
            'nama' => 'required|min:5|max:150',
            'kandungan' => 'required',
            'kategori_obat_id' => 'required|numeric',
            ''
        ];
    }
}
