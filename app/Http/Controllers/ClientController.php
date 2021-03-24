<?php

namespace App\Http\Controllers;

use App\Company;
use App\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::paginate(15);
        return view('clients_page', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //limiting the number of companies (just for example)
        $companies = Company::all()->take(20);
        return view('client_add', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email'
        ]);

        $client = new Client;
        $client->fill($request->except('_token', 'company'));
        $client->save();

        $companies = $request['companies'];
        if(isset($companies)){
            foreach($companies as $company){
                $client->companies()->attach($company);
            }
        }

        return redirect('clients');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Client $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        //limiting the number of companies (just for example)
        $companies = Company::all()->take(20);

        return view('client_edit_page', compact('client', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Client $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email'
        ]);

        $companies = $request['companies'];

        $client->update($request->except('_token', 'companies'));

        if(isset($companies)){
            foreach($companies as $company){
                if (! $client->companies->contains($company)) {

                    $client->companies()->attach($company);
                }
            }
        }

        return redirect('clients');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Client $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->companies()->detach();
        $client->delete();

        return redirect('clients');
    }
}
