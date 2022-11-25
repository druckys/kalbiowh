<?php

namespace App\Exports;

use App\Models\LogMaterial;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class HistoryMaterialExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return LogMaterial::select(
            "id",
            "nama_material",
            "ukuran",
            "jumlah",
            "satuan",
            "tanggal",
            "initial")->get();
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function headings(): array
    {
        return ["ID", 
                "Nama Material", 
                "Ukuran", 
                "Jumlah(out)", 
                "Satuan", 
                "Tanggal Pengambilan", 
                "Initial",
            ];
    }
}
