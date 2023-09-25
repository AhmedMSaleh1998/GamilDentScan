<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Scan extends Model 
{

    protected $table = 'scans';
    public $timestamps = true;
    protected $fillable = array('patient_id', 'scan_type_id', 'dentist_id', 'receptionist_id', 'technician_id', 'current_price', 'total_price_after_discount', 'paid_by_patient', 'current_receptionist_commission', 'current_technician_commission', 'is_recived', 'whatsapp_sent', 'dicom_file_link', 'reservation_time', 'organization_id', 'discount_reason', 'type', 'status', 'confirmation_time', 'working_time', 'receipt_time', 'recevied_time', 'recevier_name');

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

    public function technicians()
    {
        return $this->belongsTo('App\Models\Technician');
    }

    public function patient()
    {
        return $this->belongsTo('App\models\Patient');
    }

    public function organization()
    {
        return $this->belongsTo('App\Models\Organization');
    }

}