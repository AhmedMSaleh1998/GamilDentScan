<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Scan extends Model 
{

    protected $table = 'scans';
    public $timestamps = true;
    protected $guarded = ['id'];

    public function scanType()
    {
        return $this->belongsTo('App\Models\ScanType');
    }

    public function dentist()
    {
        return $this->belongsTo('App\Models\Dentist');
    }

    public function receptionist()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function technician()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function patient()
    {
        return $this->belongsTo('App\Models\Patient');
    }

    public function organization()
    {
        return $this->belongsTo('App\Models\Organization');
    }

}