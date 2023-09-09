<?php

namespace App\Http\Controllers;
use App\Models\Patient;
use App\Models\Dentist;
use App\Models\Receptionist;
use App\Models\Technician;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $patientCount       = Patient::count();
        $dentistCount       = Dentist::count();
        $receptionistCount       = Receptionist::count();
        $technicianCount    = Technician::count();
        return view('admin.home' , compact('patientCount' , 'dentistCount' , 'technicianCount' , 'receptionistCount'));
    }
}
