<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListSparepart extends Model
{
    use HasFactory;
    protected $table = 'list_sparepart';
    // protected $fillable = ['sparepart_code', 'sparepart_name', 'brand', 'specification', 'equipment_number','location'];
    protected $guarded = [];
}
