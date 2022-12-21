<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class scrollzy extends Model
{
    use HasFactory;
    protected $table = 'scrollzy';

    protected $fillable=['smalyz','bigyz','linyz','lurlyz',];
}
