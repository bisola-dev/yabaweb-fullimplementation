<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class schhis extends Model
{
    use HasFactory;
    protected $table = 'schhis';

    protected $fillable = [
   'schimg','hisimg','skolid'
    ];
    

    public function getImagePathAttribute(){

        return url('abtimg/'. $this->filename); 
    }

}
