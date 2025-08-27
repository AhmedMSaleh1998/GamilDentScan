<?php

namespace App\Models;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{

    protected $table = 'patients';
    public $timestamps = true;
    protected $fillable = array('name', 'birth_date', 'address', 'phone_one', 'phone_two', 'email', 'request_photo');

    public function age()
    {
        return Carbon::parse($this->attributes['birth_date'])->age;
    }
}
