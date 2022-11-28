<?php

namespace App\Imports;

use App\Models\ListSparepart;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ListSparepartImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new ListSparepart([
        // 'id'                => $row['id'],
            'sparepart_code'        => $row['kode_sparepart'],
            'sparepart_name'        => $row['deskripsi'],
            'brand'                 => $row['brand'],
            'specification'         => $row['specification'],
            'equipment_number'      => $row['equipment_number'],
            'location'              => $row['letak'],
        ]);
    }
}
