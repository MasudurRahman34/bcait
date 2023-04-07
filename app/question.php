<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\qsoption;

class question extends Model
{
    public function qsoption(){
       return $this->hasMany(qsoption::class,'question_id','id');
    }
}

