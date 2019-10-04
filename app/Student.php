<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['id', 'grade_id', 'nis', 'name', 'dateofbirth', 'photo', 'gender', 'religion', 'email', 'phone_number', 'address'];

    // public function grade()
    // {
    //     return $this->belongsTo('App\Grade', 'id');
    // }
}