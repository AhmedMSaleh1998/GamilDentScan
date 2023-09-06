<?php

namespace App\Http\Controllers;

use App\Http\Requests\ScanType\AddScanTypeRequest;
use App\Http\Requests\ScanType\EditScanTypeRequest;
use App\models\Organization;
use App\Models\ScanType;
use Illuminate\Http\Request;

class ScanTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $scanTypes = ScanType::all();
        return view('admin.scanType.index', compact('scanTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $organizations = Organization::all();
        return view('admin.scanType.create', compact('organizations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddscanTypeRequest $request)
    {
        ScanType::create($request->validated());
        return redirect(route('admin.scanType.index'))->with(['success' => 'تم إنشاء نوع فحص جديد بنجاح']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $scanType = ScanType::find($id);
        return view('admin.scanType.show', compact('scanType'))->with(['success' => 'تم عرض تفاصيل نوع الفحص بنجاح']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $scanType = ScanType::find($id);
        return view('admin.scanType.edit', compact('scanType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditscanTypeRequest $request,  $id)
    {
        $scanType = ScanType::find($id);
        $newscanType = $request->validated();
        $scanType->update($newscanType);
        return redirect(route('admin.scanType.index'))->with(['success' => 'تم تعديل بيانات نوع الفحص بنجاح']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $scanType = ScanType::find($id);
        $scanType->delete();
        return redirect(route('admin.scanType.index'))->with(['success' => 'تم حذف بيانات نوع الفحص بنجاح']);
    }
}
