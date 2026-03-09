<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Services\CompanyService;

class CompanyController extends Controller
{
    protected $companyService;
    public function __construct(CompanyService $companyService) {
        $companies = $this->companyService = $companyService;
        return view('companies.index', compact('companies'));
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->companyService->all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCompanyRequest $request)
    {
        $this->companyService->create($request->validated());
        return redirect()->route('companies.index')->with('success', 'Company Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id, Company $company)
    {
        $company = $this->companyService->find($id);
        return view('companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id, Company $company)
    {
        $company = Company::findOrFail($id);
        return view('companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCompanyRequest $request, Company $company, $id)
    {
        $this->companyService->update($id, $request->validated());
        return redirect()->route('companies.index')->with('success', 'Company Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company, $id)
    {
        return $this->companyService->delete($id);
    }
}
