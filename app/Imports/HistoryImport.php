<?php

namespace App\Imports;

use App\Models\LogBook;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
class HistoryImport implements ToModel, WithHeadingRow
{
    // /**
    // * @param array $row
    // *
    // * @return \Illuminate\Database\Eloquent\Model|null
    // */
   
    
    public function model(array $row)
    {
        return new LogBook([
            //table database => table excel, no uppercase dan spasi dibaca '_'
            // 'id'            => $row['id'],
            // 'tool_code'     => $row['kode_tools'],
            'nama'          => $row['nama_peralatan'],
            'borrow_date'   => $row['tanggal_peminjaman'],
            'return_date'   => $row['tanggal_pengembalian'],
            'initial_name'  => $row['initial'],
            'deskripsi'     => $row['deskripsi'],
            'status'        => $row['status'],
        ]);
    }
}
