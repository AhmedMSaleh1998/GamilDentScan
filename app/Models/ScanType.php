<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ScanType extends Model 
{

    protected $table = 'scan_types';
    public $timestamps = true;
    protected $fillable = array('name', 'receptionist_commision', 'technician_commision', 'base_recieving_time', 'organization_id', 'whatsapp_price', 'dvd_price', 'report_price');

    public function organization()
    {
        return $this->belongsTo('App\Models\Organization');
    }

}