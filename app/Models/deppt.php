<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class deppt extends Model
{
    use HasFactory;
    protected $table = 'deppt';

    protected $fillable=['deptnam',];
}


