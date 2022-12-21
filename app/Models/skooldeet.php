<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class skooldeet extends Model
{
    use HasFactory;
    protected $table = 'skooldeet';

    protected $fillable=['skolssn','skolsh','skolsacr','skolsfn','abtskol'];
}
