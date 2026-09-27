<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $fillable = ['name', 'slug'];

    public function events() {
        return $this->hasMany(Events::class, 'category_id', 'id');
    }
}
