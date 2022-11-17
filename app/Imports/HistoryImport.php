<?php

namespace App\Imports;

use App\Models\LogBook;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class HistoryImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new LogBook([
            // "ID"                    => $row['id'],
            // "Nama Peralatan"        => $row['nama'],
            // "Brand"                 => $row['brand'],
            // "Tanggal Peminjaman"    => $row['borrow_date'],
            // "Tanggal Pengembalian"  => $row['return_date'],
            // "Initial"               => $row['initial_name'],
            // "Deskripsi"             => $row['deskripsi'],

            'id'                  => $row['id'],
            'nama'          => $row['nama'],
            'brand'         => $row['brand'],
            'borrow_date'    => $row['borrow_date'],
            'return_date'    => $row['return_date'],
            'initial_name'    => $row['initial_name'],
            'deskripsi'       => $row['deskripsi'],

            // "id"                    => $row['ID'],
            // "nama"        => $row['Nama Peralatan'],
            // "brand"                 => $row['Brand'],
            // "borrow_date"    => $row['Tanggal Peminjaman'],
            // "return_date"  => $row['Tanggal Pengembalian'],
            // "initial_name"               => $row['Initial'],
            // "deskripsi"             => $row['Deskripsi'],
        ]);
    }
}
