<?php

namespace App\Http\Controllers;

use App\Http\Requests\Patient\AddPatientRequest;
use App\Http\Requests\Patient\EditPatientRequest;
use App\Models\Patient;
use App\Models\Scan;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patients = Patient::all();
        return view('admin.patient.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.patient.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddPatientRequest $request)
    {
        Patient::create($request->validated());
        return redirect(route('admin.patient.index'))->with(['success' => 'تم إنشاء طبيب اسنان جديد بنجاح']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $patient = Patient::find($id);
        $scans = Scan::where('patient_id', $id)->get();
        return view('admin.patient.show', compact('patient', 'scans'))->with(['success' => 'تم عرض الطبيب بنجاح']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $patient = Patient::find($id);
        return view('admin.patient.edit', compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditPatientRequest $request,  $id)
    {
        $patient = Patient::find($id);
        $newPatient = $request->validated();
        $patient->update($newPatient);
        return redirect(route('admin.patient.index'))->with(['success' => 'تم تعديل بيانات الطبيب بنجاح']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $patient = Patient::find($id);
        $patient->delete();
        return redirect(route('admin.patient.index'))->with(['success' => 'تم حذف بيانات الطبيب بنجاح']);
    }
}
