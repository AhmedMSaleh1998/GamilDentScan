<?php

namespace App\Http\Controllers;
use App\Http\Requests\Organization\AddOrganizationRequest;
use App\Http\Requests\Organization\EditOrganizationRequest;
use App\Models\Organization;
use Illuminate\Http\Request;


class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $organizations = Organization::all();
        return view('admin.organization.index', compact('organizations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.organization.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddOrganizationRequest $request)
    {
        Organization::create($request->validated());
        return redirect(route('admin.organization.index'))->with(['success' => 'تم إنشاء منظمة  جديد بنجاح']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $organization = Organization::find($id);
        return view('admin.organization.show', compact('organization'))->with(['success' => 'تم عرض تفاصيل المنظمة بنجاح']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $organization = Organization::find($id);
        return view('admin.organization.edit', compact('organization'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditOrganizationRequest $request,  $id)
    {
        $organization = Organization::find($id);
        $neworganization = $request->validated();
        $organization->update($neworganization);
        return redirect(route('admin.organization.index'))->with(['success' => 'تم تعديل بيانات المنظمة بنجاح']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $organization = Organization::find($id);
        $organization->delete();
        return redirect(route('admin.organization.index'))->with(['success' => 'تم حذف بيانات المنطقة بنجاح']);
    }
}
