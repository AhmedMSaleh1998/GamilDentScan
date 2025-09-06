<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ScanType extends Model 
{

    protected $table = 'scan_types';
    public $timestamps = true;
    protected $guarded = ['id'];

    public function organization()
    {
        return $this->belongsTo('App\Models\Organization');
    }

}