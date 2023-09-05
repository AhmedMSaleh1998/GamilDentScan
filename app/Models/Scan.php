<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Scan extends Model 
{

    protected $table = 'scans';
    public $timestamps = true;
    protected $fillable = array('patient_id', 'scan_type_id', 'current_price', 'is_recieved', 'dentist_id', 'reciptionist_id', 'technician_id', 'total_price_after_discount', 'paid_by_patient', 'whatsapp_sent', 'file', 'dicom_file_link', 'current_reciptionist_commission', 'current_technician_commission', 'reservation_time', 'working_on_time', 'delivery_time', 'reciving_time', 'recieved_time', 'reciever_name', 'status', 'discount_reason', 'organization_id');

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
        return $this->belongsTo('App\Models\Receptionist');
    }

    public function technician()
    {
        return $this->belongsTo('App\Models\Patient');
    }

    public function patient()
    {
        return $this->belongsTo('App\Models\Patient');
    }

}