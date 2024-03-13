<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Technician extends Model 
{

    protected $table = 'technicians';
    public $timestamps = true;
    protected $fillable = array('name', 'phone', 'address', 'fixed_salary', 'email');

}