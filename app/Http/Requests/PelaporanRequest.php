<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PelaporanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }   

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'nama' => ['required', 'min:3'],
            'telp' => ['required', 'min:6'],
            'email' => ['required', 'min:6'],
            'nama_perusahaan' => ['required', 'min:6'],
            'bidang_usaha'=> ['required', 'min:3'],
            'jenis' => ['required', 'min:3'],
            'periode' => ['required', 'min:1'],
            'dok_pelaporan' => ['required', 'mimes:docx,doc,pdf'],
            'dok_izin' => ['required', 'mimes:docx,doc,pdf'],
            'dok_lab' => ['mimes:docx,doc,pdf'],
        ];
    }

}
