<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Receptionist extends Model 
{

    protected $table = 'receptionists';
    public $timestamps = true;
    protected $fillable = array('name', 'phone', 'address', 'email', 'fixed_salary');

}