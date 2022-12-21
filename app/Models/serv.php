<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class serv extends Model
{
    use HasFactory;

    protected $table = 'serv';

    protected $fillable=['servn','servacr','servh','servfn','servlogo','dirlogo'];
}
