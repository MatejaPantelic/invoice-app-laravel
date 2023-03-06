<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Http\Requests\CompanyUpdateRequest;
use App\Models\Company;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = DB::table('companies')
            ->select('companies.*')
            ->where('companies.deleted_at', '=', null)
            ->paginate(10);
        return view('companies.index')->with([
            'companies' => $companies,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {
        Company::create($request->all());
        return redirect()
            ->route('companies.index')
            ->withSuccess('The company ' . $request->name . ' was created.');

    }

    /**
     * Display the specified resource.
     *
     * @param Company $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Company $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('companies.edit')
            ->with([
                'company' => $company,
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Company $company
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyUpdateRequest $request, Company $company)
    {

        $company->update([
            'tin' => $request->tin,
            'name' => $request->name,
            'address' => $request->address,
            'city' => $request->city,
            'phone_number' => $request->phone_number,
            'bank_account' => $request->bank_account,
            'email' => $request->email
        ]);
        return redirect()
            ->route('companies.index')
            ->withSuccess('The company with id ' . $company->id . ' was edited.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Company $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company): RedirectResponse
    {
        $company->delete();
        return redirect()->back()
            ->withSuccess('The company with id ' . $company->id . ' has been deleted.');
    }
}
