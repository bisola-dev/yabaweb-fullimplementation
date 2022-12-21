<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lib extends Model
{
    use HasFactory;

    protected $table = 'lib';

    protected $fillable=['libn','libacr','libfn','libh'];
}
