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
            'nama' => 'required|min:3',
            'telp' => 'required|min:6',
            'periode' => 'required|min:1',
            'bidang_usaha'=>'required',
            'dok_pelaporan_air' => 'required|mimes:docx,doc,pdf',
            'dok_izin_air' => 'required|mimes:docx,doc,pdf',
            'dok_lab_air' => 'required|mimes:docx,doc,pdf',
            'dok_pelaporan_limbah' => 'required|mimes:docx,doc,pdf',
            'dok_izin_limbah' => 'required|mimes:docx,doc,pdf',
            'dok_lab_limbah' => 'required|mimes:docx,doc,pdf',
            'dok_pelaporan_udara' => 'mimes:docx,doc,pdf',
            'dok_izin_udara' => 'mimes:docx,doc,pdf',
            'dok_lab_udara' => 'mimes:docx,doc,pdf',
        ];
    }
}
