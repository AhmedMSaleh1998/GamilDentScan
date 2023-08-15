<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Patient extends Model 
{

    protected $table = 'patients';
    public $timestamps = true;
    protected $fillable = array('name', 'birth_date', 'address', 'phone_one', 'phone_two', 'email');

    public function age()
    {
        return Carbon::parse($this->attributes['birth_date'])->age;
    }
}