<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddPatientRequest;
use App\Http\Requests\EditPatientRequest;
use App\Models\Patient;
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
        return redirect(route('admin.patient.index'))->with(['success' => 'تم إنشاء مريض جديد بنجاح']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $patient = Patient::find($id);
        return view('admin.patient.show', compact('patient'))->with(['success' => 'تم عرض الحالة بنجاح']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
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
        return redirect(route('admin.patient.index'))->with(['success' => 'تم تعديل بيانات المريض جديد بنجاح']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
