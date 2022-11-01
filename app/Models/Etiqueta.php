<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etiqueta extends Model
{
    protected $table = 'etiqueta';
    public $timestamps = false;
    protected $fillable = [
        'descripcion',
    ];

}
