<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientsRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Models\Client;
use Illuminate\Support\Facades\DB;

class ClientsController extends Controller
{
    public function index()
    {
        // $clients = Clients::select('id', 'name')->get();

        return view('client.index', [
            // 'client' => $clients,
        ]);
    }

     /**
      * Store a newly created resource in storage.
      *
      * @param  \App\Http\Requests\StoreMeetingNoteRequest  $request
      * @return \Illuminate\Http\Response
      */
     public function create()
     {
         $countries = DB::table('countries')->select('id', 'name')->get();

         return view('client.create', [
             'countries' => $countries,
         ]);
     }

     public function show($id){
        $customer = Client::with('projects', 'projects.category', 'projects.status')->find($id);
        return view('client.show', compact('customer'));
     }

     public function store(StoreClientsRequest $request)
     {
         $clients = new Client();

         $clients->name = $request->name;
         $clients->website = $request->website;
         $clients->industry = $request->industry;
         $clients->description = $request->description;
         $clients->country_id = $request->country_id;
         $clients->email = $request->email;
         $clients->mobile = $request->mobile;
         $clients->street_address = $request->street_address;
         $clients->city = $request->city;
         $clients->state = $request->state;
         $clients->zip = $request->zip;

         $clients->save();

         return redirect('/customers')->with('status', 'Customer added successfully.');
     }

    public function update(UpdateClientRequest $request, $id)
    {
        $update = Client::find($id);
        $update->name = $request->input('name');
        $update->email = $request->input('email');
        $update->website = $request->input('website');
        $update->industry = $request->input('industry');
        $update->mobile = $request->input('mobile');
        $update->state = $request->input('state');
        $update->city = $request->input('city');
        $update->zip = $request->input('zip');
        $update->description =$request->input('description');
        $update->country_id =$request->input('country_id');
        $update->street_address =$request->input('street_address');
        $update->update();

        return redirect('customers')->with('status', 'Customer updated successfully.');
    }

     public function edit($id)
     {
         $customer = Client::find($id);
         $countries = DB::table('countries')->select('id', 'name')->get();

         return view('client.edit', compact('customer', 'countries'));
     }
}
