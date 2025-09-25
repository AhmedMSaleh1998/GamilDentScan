<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Carbon\Carbon;

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

    public function age(): ?int
    {
        if (! $this->birth_date) {
            return null; // or return 0 if you prefer
        }

        return Carbon::parse($this->birth_date)->age;
    }
}
