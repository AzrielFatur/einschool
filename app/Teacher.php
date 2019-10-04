<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = ['id', 'grade_id', 'nig', 'name', 'dateofbirth', 'photo', 'gender', 'religion', 'email', 'phone_number', 'address'];
}
