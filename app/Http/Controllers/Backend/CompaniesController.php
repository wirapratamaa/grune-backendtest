<?php

namespace App\Http\Controllers\Backend;

use App\Models\Company;
use App\Models\Postcode;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private function getRoute() {
        return 'company';
    }
     
    public function index()
    {
        return view('backend.companies.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $company = new Company();
        $company->form_action = $this->getRoute() . '.store';
        $company->page_title = 'Company Add Page';
        $company->page_type = 'store';
        // $prefectures = Postcode::pluck('prefecture', 'id');
        // $city = Postcode::pluck('city', 'id');
        // $local = Postcode::pluck('local', 'id');

        return view('backend.companies.form', [
            'company' => $company
        ]);
    }

    // public function search(Request $request){
    //     $request->get('search');
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        Company::create($request->all());
        return redirect('/admin/company-list');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::find($id);
        $company->form_action = $this->getRoute() . '.update';
        $company->page_title = 'Company Edit Page';
        // Add page type here to indicate that the form.blade.php is in 'edit' mode
        $company->page_type = 'update';
        return view('backend.companies.form', [
            'company' => $company
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        // $company = Company::find($id);
        // $company->update($request->all());
        // return redirect('/admin/company-list');
        return $request;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $company = Company::find($request->get('id'));
        $company->delete();
        return redirect('/admin/company-list');

    }
}
