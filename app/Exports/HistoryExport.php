<?php

namespace App\Exports;

use App\Models\LogBook;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class HistoryExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return LogBook::select(
            "id",  
            "nama", 
            "borrow_date", 
            "return_date", 
            "initial_name", 
            "deskripsi",
            "status",)->get();
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function headings(): array
    {
        return ["ID", 
                "Nama Peralatan", 
                "Tanggal Peminjaman", 
                "Tanggal Pengembalian", 
                "Initial", 
                "Deskripsi",
                "Status",
            ];
    }
}
