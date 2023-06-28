<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    use HasFactory;
    public $table = 'pokemon';
    protected $primaryKey = 'id';
    public $incrementing = true;


    public function region()
    {
        return $this->belongsTo(Region::class, 'region_id');
    } 

    public function tipo()
    {
        return $this->belongsTo(Region::class, 'tipo_id');
    } 

}
