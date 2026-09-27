<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registrations extends Model
{
    protected $fillable = [
        'event_id',
        'name',
        'email',
        'phone',
        'institution',
        'registration_code',
        'status'
    ];

    public function registration() {
        return $this->belongsTo(Events::class);
    }
}
