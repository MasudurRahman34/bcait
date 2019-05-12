<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    public function course(){
	return $this->belongsTo('App\model\course', 'course_id', 'code');
}
}
