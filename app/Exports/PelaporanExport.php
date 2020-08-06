<?php

namespace App\Exports;

use App\Pelaporan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class PelaporanExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Pelaporan::all();
    }

    public function headings(): array
    {
        return [
            '#',
            'Nama',
            'Telepon',
            'Email',
            'Nama Perusahaan',
            'Bidang Usaha',
            'Jenis Pelaporan',
            'Periode',
            'Dok.Pelaporan',
            'Dok.Izin',
            'Dok.Lab',
            'Status',
            'User ID',
            'Tanggal Dibuat',
            'Terahir Diperbaharui'
        ];
    }
}
