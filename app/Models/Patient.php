<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model 
{

    protected $table = 'patients';
    public $timestamps = true;
    protected $fillable = array('name', 'birth_date', 'address', 'phone_one', 'phone_two', 'email');

}