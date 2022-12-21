<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reg extends Model
{
    use HasFactory;
    protected $table= 'reg';

    protected $fillable=['regn','regacr','regh','regfn','regh'];
 
}
