<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class newprog extends Model
{
    use HasFactory;

    protected $table = 'newprog';

    protected $fillable=['prog',];
}
