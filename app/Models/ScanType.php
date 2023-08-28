<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ScanType extends Model
{

    protected $table = 'scan_types';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('name', 'price', 'receptionist_commision', 'technicain_commision', 'base_recieving_time');
}
