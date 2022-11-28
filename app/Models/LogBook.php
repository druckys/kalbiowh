<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogBook extends Model
{
    use HasFactory;
    protected $table = 'log_book';
    //protected $fillable = ['nama', 'brand', 'borrow_date', 'return_date', 'initial_name', 'deskripsi'];
    protected $guarded = [];

    public function Tool(){
        return $this->belongsTo('App\Models\Tool');
        // return $this->belongsToMany(Tool::class, 'tool');
    }
}
