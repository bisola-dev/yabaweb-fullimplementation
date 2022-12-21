<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class acad extends Model
{
    use HasFactory;
    protected $table = 'acad';
    protected $fillable=['acad','acadacr','acadfn','abtacad','headprof'];
}
