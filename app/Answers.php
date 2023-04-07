<?php

namespace App;
use App\qsoption;
use App\question;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Answers extends Model
{
    public function qsoption(){
        return $this->belongsTo(qsoption::class,'option_id');
     }
     public function question(){
        return $this->belongsTo(question::class);
     }
     public function user(){
        return $this->belongsTo(User::class);
     }
}
