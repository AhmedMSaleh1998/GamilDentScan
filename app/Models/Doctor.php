<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model 
{

    protected $table = 'doctors';
    public $timestamps = true;
    protected $fillable = array('name', 'phone', 'email');

}