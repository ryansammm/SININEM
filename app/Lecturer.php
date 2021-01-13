<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    protected $guarded = [];
    public $incrementing = false;
    protected $primaryKey = 'nidn';
}
