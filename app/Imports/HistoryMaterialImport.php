<?php

namespace App\Imports;

use App\Models\LogMaterial;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class HistoryMaterialImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new LogMaterial([
            //table database => table excel, no uppercase dan spasi dibaca '_' dan simbol diabaikan5
            'id'                => $row['id'],
            'nama_material'     => $row['nama_material'],
            'ukuran'            => $row['ukuran'],
            'jumlah'            => $row['jumlahout'],
            'satuan'            => $row['satuan'],
            'tanggal'           => $row['tanggal_pengambilan'],
            'initial'           => $row['initial'],
        ]);
    }
}
