<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Se crea el modelo Articles para coger la tabla articles de la base de datos
class Articles extends Model
{
    use HasFactory;

    public $tabla = 'articles';

    protected $fillable = ['title', 'content'];
}
