<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    protected $fillable = [
        'category_id',
        'title',
        'slug', 
        'description', 
        'speaker_name', 
        'location', 
        'start_date', 
        'end_date', 
        'quota', 
        'banner_image', 
        'status'
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];

    public function category() {
        return $this->belongsTo(Categories::class, 'category_id', 'id'); // category_id = foreign key, 'id' = primary key
    }

    public function registrations() {
        return $this->hasMany(Registrations::class, 'event_id', 'id');
    }
}
