<?php

namespace App\Http\Controllers;

use App\Http\Requests\Doctor\AddDoctorRequest;
use App\Http\Requests\Doctor\EditDoctorRequest;
use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctors = Doctor::all();
        return view('admin.doctor.index', compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.doctor.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddDoctorRequest $request)
    {
        Doctor::create($request->validated());
        return redirect(route('admin.doctor.index'))->with(['success' => 'تم إنشاء طبيب  جديد بنجاح']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $doctor = Doctor::find($id);
        return view('admin.doctor.show', compact('doctor'))->with(['success' => 'تم عرض الطبيب بنجاح']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $doctor = Doctor::find($id);
        return view('admin.doctor.edit', compact('doctor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditDoctorRequest $request,  $id)
    {
        $doctor = Doctor::find($id);
        $newdoctor = $request->validated();
        $patient->update($newPatient);
        return redirect(route('admin.patient.index'))->with(['success' => 'تم تعديل بيانات الطبيب بنجاح']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $doctor = Doctor::find($id);
        $doctor->delete();
        return redirect(route('admin.doctor.index'))->with(['success' => 'تم حذف بيانات الطبيب بنجاح']);
    }
}
