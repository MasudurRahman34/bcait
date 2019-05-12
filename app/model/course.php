<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class course extends Model
{
    public function students(){
	return $this->hasMany('App\model\student', 'course_id', 'code');
}
}
