<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Patient extends Model
{

    protected $table = 'patients';
    public $timestamps = true;
    protected $guarded = ['id'];

    /**
     * Each scan belongs to one patient.
     */
    public function scans(): HasMany
    {
        return $this->hasMany(Scan::class, 'patient_id', 'id');
    }
    public function age()
    {
        return '25';
    }
}
