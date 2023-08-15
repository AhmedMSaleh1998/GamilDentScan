<?php

namespace App\Http\Controllers;

use App\Http\Requests\Dentist\AddDentistRequest;
use App\Http\Requests\Dentist\EditDentistRequest;
use Illuminate\Http\Request;
use App\Models\Dentist;
class DentistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dentists = Dentist::all();
        return view('admin.dentist.index', compact('dentists'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.dentist.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddDentistRequest $request)
    {
        dentist::create($request->validated());
        return redirect(route('admin.dentist.index'))->with(['success' => 'تم إنشاء مريض جديد بنجاح']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $dentist = Dentist::find($id);
        return view('admin.dentist.show', compact('dentist'))->with(['success' => 'تم عرض تفاصيل الطبيب بنجاح']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $dentist = Dentist::find($id);
        return view('admin.dentist.edit', compact('dentist'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditDentistRequest $request,$id)
    {
        $dentist = Dentist::find($id);
        $newdentist = $request->validated();
        $dentist->update($newdentist);
        return redirect(route('admin.dentist.index'))->with(['success' => 'تم تعديل بيانات الطبيب بنجاح']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dentist = Dentist::find($id);
        $dentist->delete();
        return redirect(route('admin.dentist.index'))->with(['success' => 'تم حذف بيانات الطبيب بنجاح']);
    }
}
