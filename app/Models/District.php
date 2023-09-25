<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model 
{

    protected $table = 'districts';
    public $timestamps = true;
    protected $fillable = array('name');

    public function dentists()
    {
        return $this->hasMany('App\Models\Dentist');
    }

}