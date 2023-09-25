<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model 
{

    protected $table = 'organizations';
    public $timestamps = true;
    protected $fillable = array('name');

    public function scanTypes()
    {
        return $this->hasMany('App\Models\ScanType');
    }

}