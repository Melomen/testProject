<?php

namespace App\Http\Controllers\Api;

use App\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function getClientCompanies($client_id)
    {
        $companies = Client::find($client_id)->companies()->paginate(15);

        return response()->json($companies, $status=200, $headers=[], $options=JSON_PRETTY_PRINT);
    }
}
