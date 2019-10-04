<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $fillable = ['id', 'teacher_id', 'class_name', 'class_sort'];

    // public function student()
    // {
    //     return $this->hasMany('App\Student', 'grade_id');
    // }
}
