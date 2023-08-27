<?php

namespace App\Http\Controllers;

use App\Http\Requests\Scan\AddScanRequest;
use App\Http\Requests\Scan\EditScanRequest;
use App\Models\Dentist;
use App\Models\Scan;
use App\Models\Technician;
use App\Models\ScanType;
use Illuminate\Http\Request;

class ScanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $scans = Scan::where('patient_id', $id)->get();
        return view('admin.patientScans.index', compact('scans' , 'id'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $scanTypes = ScanType::all();
        $dentists  = Dentist::all();
        $technicians =Technician::all();
        return view('admin.patientScans.create', compact('dentists' , 'scanTypes' , 'technicians' , 'id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddScanRequest $request , $id)
    {
        $newScan = $request->validated();
        $scan = new Scan;
        $scan->patient_id                      = $newScan['patient_id'];
        $scan->scan_type_id                    = $newScan['scan_type_id'];
        $scan->dentist_id                      = $newScan['dentist_id'];
        $scan->reciptionist_id                 = 1;
        $scan->technician_id                   = $newScan['technician_id'];
        $scan->total_price_after_discount      = $newScan['total_price_after_discount'];
        $scan->paid_by_patient                 = $newScan['paid_by_patient'];
        $scan->discount_reason                 = $newScan['discount_reason'];
        $scanType = ScanType::find($newScan['scan_type_id']);
        $scan->current_reciptionist_commission = $scanType->receptionist_commision;
        $scan->current_technician_commission   = $scanType->technicain_commision;
        $scan->current_price                   = $scanType->price;
        $scan->save();

        return redirect(route('admin.patient.scans.index', $id))->with(['success' => 'تم إضافة الفحص بنجاح']);
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
    public function update(EditScanRequest $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $scan = Scan::find($id);
        $scan->delete();
        return redirect()->back()->with(['success' => 'تم حذف الفحص بنجاح']);
    }
}
