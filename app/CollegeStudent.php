<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CollegeStudent extends Model
{
    protected $table = 'collegestudents';
    protected $primaryKey = 'nim';
    public $incrementing = false;
    protected $guarded = [];
}
