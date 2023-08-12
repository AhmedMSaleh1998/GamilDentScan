<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PatientScan extends Model 
{

    protected $table = 'patient_scans';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('patient_id', 'scan_id', 'current_price', 'current_discount', 'is_recieved', 'recieve_time', 'reciever_name', 'doctor_id', 'reciptionist_id', 'technician_id', 'total_price_after_discount', 'paid_by_patient', 'whatsapp_sent', 'file', 'dicom_file_link');

}