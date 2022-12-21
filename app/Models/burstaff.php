<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class burstaff extends Model
{
    use HasFactory;
    protected $table = 'burstaff';

    protected $fillable=['fullnam'];
}