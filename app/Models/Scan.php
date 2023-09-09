<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Scan extends Model 
{

    protected $table = 'scans';
    public $timestamps = true;
    protected $fillable = array('patient_id', 'scan_type_id', 'dentist_id', 'reciptionist_id', 'technician_id', 'current_price', 'total_price_after_discount', 'paid_by_patient', 'current_reciptionist_commission', 'current_technician_commission', 'is_recieved', 'whatsapp_sent', 'file', 'dicom_file_link', 'reservation_time', 'working_on_time', 'delivery_time', 'reciving_time', 'recieved_time', 'reciever_name', 'status', 'type', 'discount_reason', 'organization_id');

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

    public function organization()
    {
        return $this->belongsTo('App\models\Organization');
    }

}