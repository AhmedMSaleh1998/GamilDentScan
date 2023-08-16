<?php

namespace App\Http\Controllers;

use App\Http\Requests\District\AddDistrictRequest;
use App\Http\Requests\District\EditDistrictRequest;
use App\Models\District;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $districts = District::all();
        return view('admin.district.index', compact('districts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.district.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddDistrictRequest $request)
    {
        District::create($request->validated());
        return redirect(route('admin.district.index'))->with(['success' => 'تم إنشاء منطقة  جديد بنجاح']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $district = District::find($id);
        return view('admin.district.show', compact('district'))->with(['success' => 'تم عرض تفاصيل المنطقة بنجاح']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $district = District::find($id);
        return view('admin.district.edit', compact('district'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditDistrictRequest $request,  $id)
    {
        $district = District::find($id);
        $newdistrict = $request->validated();
        $district->update($newdistrict);
        return redirect(route('admin.district.index'))->with(['success' => 'تم تعديل بيانات المنطقة بنجاح']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $district = District::find($id);
        $district->delete();
        return redirect(route('admin.district.index'))->with(['success' => 'تم حذف بيانات المنطقة بنجاح']);
    }
}
