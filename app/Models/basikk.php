<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class basikk extends Model
{
    use HasFactory;
    protected $table = 'basikk';

    protected $fillable=['fonyz','emalyz','welcumyz','posyz','mapyz','utubeyz',];
}
