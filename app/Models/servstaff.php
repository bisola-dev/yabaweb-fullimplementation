<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class servstaff extends Model
{
    use HasFactory;
    protected $table = 'servstaff';

    protected $fillable=['fullnam'];
}
