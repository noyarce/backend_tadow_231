<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;
    public $fillable=[
        'reg_nombre'
    ];

    public function pokemon()
    {
        return $this->hasMany(Pokemon::class);
    }
}
