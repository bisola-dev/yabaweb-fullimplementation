<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class progstat extends Model
{
    use HasFactory;
    protected $table= 'progstat';

    protected $fillable=['skolid','deptid', 'progid', 'prog','statnam'];
 
}
