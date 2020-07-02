<?php

namespace App\Exports;

use App\Pengaduan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class PengaduanExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Pengaduan::all();
    }

    public function headings(): array
    {
        return [
            '#',
            'NIK',
            'Nama Pengadu',
            'Telepon',
            'Email',
            'Lokasi',
            'Deskripsi',
            'Foto',
            'Tanggal Dibuat',
            'Terahir Diperbaharui'
        ];
    }
}
