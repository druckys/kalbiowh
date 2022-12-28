<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LogBook extends Model
{
    use HasFactory, LogsActivity;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['nama', 'borrow_date','return_date', 'initial_name'])
        ->setDescriptionForEvent(fn(string $eventName) => "History Tools has been {$eventName}")
        ->useLogName('History Tools')
        ->dontLogIfAttributesChangedOnly(['updated_at']);
        // return LogOptions::defaults()->logUnguarded();
        // Chain fluent methods for configuration options
    }

    //ini untuk memanggil database 
    
    protected $table = 'log_book';
    //protected $fillable = ['nama','borrow_date', 'return_date', 'initial_name', 'deskripsi'];
    protected $guarded = [];

    // relationship database
    public function Tool(){
        return $this->belongsTo('App\Models\Tool');
        // return $this->belongsToMany(Tool::class, 'tool');
    }
}
