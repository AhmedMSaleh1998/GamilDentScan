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
        //
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
    public function destroy(string $id)
    {
        //
    }
}
