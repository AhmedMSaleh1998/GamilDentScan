<?php

namespace App\Http\Controllers;
use App\Http\Requests\Technician\AddTechnicianRequest;
use App\Http\Requests\Technician\EditTechnicianRequest;
use App\Models\Technician;
use Illuminate\Http\Request;

class TechnicianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $technicians = Technician::all();
        return view('admin.technician.index', compact('technicians'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.technician.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddTechnicianRequest $request)
    {
        Technician::create($request->validated());
        return redirect(route('admin.technician.index'))->with(['success' => 'تم إنشاء طبيب اسنان جديد بنجاح']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $technician = Technician::find($id);
        return view('admin.technician.show', compact('technician'))->with(['success' => 'تم عرض الطبيب بنجاح']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $technician = Technician::find($id);
        return view('admin.technician.edit', compact('technician'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditTechnicianRequest $request,  $id)
    {
        $technician = Technician::find($id);
        $newtechnician = $request->validated();
        $technician->update($newtechnician);
        return redirect(route('admin.technician.index'))->with(['success' => 'تم تعديل بيانات الطبيب بنجاح']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $technician = Technician::find($id);
        $technician->delete();
        return redirect(route('admin.technician.index'))->with(['success' => 'تم حذف بيانات الطبيب بنجاح']);
    }
}
