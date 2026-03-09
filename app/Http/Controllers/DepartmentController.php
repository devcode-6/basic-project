<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDepartmentRequest;
use App\Http\Requests\UpdateDepartmentRequest;
use App\Services\DepartmentService;

class DepartmentController extends Controller
{
    protected $departmentService;
    
    public function __construct(DepartmentService $departmentService) {
        $this->departmentService = $departmentService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = $this->departmentService->all();
        return view('departments.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('departments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDepartmentRequest $request)
    {
        $this->departmentService->create($request->validated());
        return redirect()->route('departments.index')->with('success', 'Department Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $department = $this->departmentService->find($id);
        return view('departments.show', compact('department'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $department = $this->departmentService->find($id);
        return view('departments.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDepartmentRequest $request, $id)
    {
        $this->departmentService->update($id, $request->validated());
        return redirect()->route('departments.index')->with('success', 'Department Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->departmentService->delete($id);
        return redirect()->route('departments.index')->with('success', 'Department Deleted Successfully');
    }
}
