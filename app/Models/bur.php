<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bur extends Model
{
    use HasFactory;
    protected $table = 'bur';

    protected $fillable=['burn','buracr','burfn','burh','mapyz','utubeyz',];
}
