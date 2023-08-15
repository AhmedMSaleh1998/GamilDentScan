<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Scan extends Model 
{

    protected $table = 'scans';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('patient_id', 'scan_id', 'current_price', 'current_discount', 'is_recieved', 'dentist_id', 'reciptionist_id', 'technician_id', 'total_price_after_discount', 'paid_by_patient', 'whatsapp_sent', 'file', 'dicom_file_link', 'current_reciptionist_commission', 'current_technician_commission', 'reservation_time', 'working_on_time', 'delivery_time', 'reciving_time', 'recieved_time', 'reciever_name', 'status');

}