<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class qsoption extends Model
{
    public function question(){
       return $this->belongsTo(question::class);
    }
}
