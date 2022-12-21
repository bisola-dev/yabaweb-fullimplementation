<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class know extends Model
{
    use HasFactory;
    protected $table = 'know';

    protected $fillable=['known','knowabt','knowcat'];
}


