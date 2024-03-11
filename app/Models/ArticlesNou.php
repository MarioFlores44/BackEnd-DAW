<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;


class ArticlesNou extends Authenticatable
{
    use HasFactory, HasApiTokens, Notifiable;
    protected $table = 'articles';
    public $timestamps = false;

    protected $fillable = [
        'article',
        'user'
    ];
}