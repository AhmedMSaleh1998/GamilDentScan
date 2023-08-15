<?php

namespace App/models;

use Illuminate\Database\Eloquent\Model;

class ScanFile extends Model 
{

    protected $table = 'scan_files';
    public $timestamps = true;
    protected $fillable = array('scan_id', 'file_name');

}