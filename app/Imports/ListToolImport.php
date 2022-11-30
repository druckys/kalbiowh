<?php

namespace App\Imports;

use App\Models\ListTool;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ListToolImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new ListTool([
            // 'id'                => $row['id'],
            'tools_name'      => $row['tools_name'],
            'quantity'        => $row['quantity'],
            'location'        => $row['location'],
            'note'            => $row['notes'],
        ]);
    }
}
