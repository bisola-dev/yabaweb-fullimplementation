<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class paymenttype extends Model
{
    use HasFactory;
    protected $table = 'paymenttype';

    protected $fillable=['namkzx',];
}
