<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dentist extends Model 
{

    protected $table = 'dentists';
    public $timestamps = true;
    protected $fillable = array('name', 'phone_one', 'phone_two', 'address_one', 'address_two', 'email_one', 'email_two', 'district_id');

    public function district()
    {
        return $this->belongsTo('App\Models\District');
    }

    public function scans()
    {
        return $this->hasMany('App\Models\Scan');
    }

}