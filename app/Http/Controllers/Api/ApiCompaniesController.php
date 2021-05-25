<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Company;

class ApiCompaniesController extends Controller
{
    public function getCompaniesTabular() {
        $companies = Company::orderBy('id', 'desc')->get();
        return response()->json($companies);
    }
}
