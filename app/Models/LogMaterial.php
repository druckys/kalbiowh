<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Activitylog\Traits\LogsActivity;

class LogMaterial extends Model
{
    use HasFactory, LogsActivity;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['nama_material', 'ukuran','jumlah', 'tanggal', 'initial'])
        ->setDescriptionForEvent(fn(string $eventName) => "You have {$eventName} Material")
        ->useLogName('History Materials')
        ->dontLogIfAttributesChangedOnly(['updated_at']);
        // return LogOptions::defaults()->logUnguarded();
        // Chain fluent methods for configuration options
    }

    
    protected $table = 'log_material';
    protected $guarded = [];
}
