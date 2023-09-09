<?php

namespace App\Http\Controllers;
use App\Http\Requests\ScanFile\AddScanFileRequest;
use App\Http\Requests\ScanFile\EditScanFileRequest;
use App\Models\ScanFile;
use Illuminate\Http\Request;

class ScanFileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $scanFiles = ScanFile::where('scan_id', $id)->get();
        return view('admin.patientScans.files.index', compact('scanFiles', 'id'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        return view('admin.patientScans.files.create',compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddScanFileRequest $request , $id)
    {
        $scanFiles = $request->validated();
        $name  = time() . '.' . $scanFiles['file_name']->extension();
        $scanFiles['file_name']->move(public_path('admin_assets/files/scans'), $name);
        $scanFiles['file_name'] = $name;
        //$image = ScanFile::create($scanFiles);
        ScanFile::create($scanFiles);
        return redirect(route('admin.patient.scans.files.index' , $id))->with(['success' => 'تم تخزين الملف بنجاح']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditScanFileRequest $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $scanFile = ScanFile::find($id);
        unlink(public_path('admin_assets/files/scans/' . $scanFile->file_name));
        $scanFile->delete();
        return redirect()->back()->with(['success' => 'تم حذف الملف بنجاح']);
    }
}
