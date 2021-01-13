<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $primaryKey = 'kode_matkul';
    public $incrementing = false;
    protected $guarded = [];
}
