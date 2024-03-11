<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    use HasFactory;

    public $tabla = 'articles';
}


class ArticlesNou extends Authenticatable
{
    use HasFactory, HasApiTokens, Notifiable;
    protected $tabla = 'articles';
    public $timestamps = false;

    protected $fillable = [
        'article',
        'user'
    ];
}