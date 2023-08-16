<?php

namespace App\Http\Controllers;

use App\Http\Requests\Receptionist\AddReceptionistRequest;
use App\Http\Requests\Receptionist\EditReceptionistRequest;
use App\Models\Receptionist;
use Illuminate\Http\Request;

class ReceptionistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $receptionists = Receptionist::all();
        return view('admin.receptionist.index', compact('receptionists'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.receptionist.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddReceptionistRequest $request)
    {
        receptionist::create($request->validated());
        return redirect(route('admin.receptionist.index'))->with(['success' => 'تم إنشاء موظف  جديد بنجاح']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $receptionist = Receptionist::find($id);
        return view('admin.receptionist.show', compact('receptionist'))->with(['success' => 'تم عرض الموظف بنجاح']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $receptionist = Receptionist::find($id);
        return view('admin.receptionist.edit', compact('receptionist'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditReceptionistRequest $request,  $id)
    {
        $receptionist = Receptionist::find($id);
        $newreceptionist = $request->validated();
        $receptionist->update($newreceptionist);
        return redirect(route('admin.receptionist.index'))->with(['success' => 'تم تعديل بيانات الموظف بنجاح']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $receptionist = Receptionist::find($id);
        $receptionist->delete();
        return redirect(route('admin.receptionist.index'))->with(['success' => 'تم حذف بيانات الموظف بنجاح']);
    }
}
