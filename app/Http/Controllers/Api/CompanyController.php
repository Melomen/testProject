<?php

namespace App\Http\Controllers\Api;

use App\Company;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function getCompanies()
    {
        $companies = Company::paginate(15);

        return response()->json($companies);
    }

    public function getClients($company_id)
    {
        $clients = Company::find($company_id)->clients()->paginate(15);

        return response()->json($clients);
    }
}
