<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientsRequest;
use App\Http\Requests\StoreCustomerContactRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Http\Requests\UpdateCustomerContactRequest;
use App\Models\Client;
use App\Models\Clientcontact;
use App\Models\Country;

class ClientsController extends Controller
{
    public function index()
    {
        return view('client.index');
    }

     /**
      * Store a newly created resource in storage.
      *
      * @param  \App\Http\Requests\StoreMeetingNoteRequest  $request
      * @return \Illuminate\Http\Response
      */
     public function create()
     {
         $countries = Country::getCountries();

         return view('client.create', [
             'countries' => $countries,
         ]);
     }

     public function show($id)
     {
         $customer = Client::with('projects', 'clientcontacts', 'projects.category', 'projects.status')->find($id);

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
         $clients->gst_no = $request->gst_no;
         $clients->is_customer = $request->input('is_customer', false);
         $clients->is_supplier = $request->input('is_supplier', false);

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
        $update->description = $request->input('description');
        $update->country_id = $request->input('country_id');
        $update->street_address = $request->input('street_address');
        $update->gst_no = $request->input('gst_no');
        $update->is_customer = $request->input('is_customer', false);
        $update->is_supplier = $request->input('is_supplier', false);
        $update->update();

        return redirect('customers')->with('status', 'Customer updated successfully.');
    }

     public function edit($id)
     {
         $customer = Client::find($id);
         $countries = Country::getCountries();

         return view('client.edit', compact('customer', 'countries'));
     }

     public function contactsave(StoreCustomerContactRequest $request)
     {
         $customer_contact = new Clientcontact();

         $customer_contact->first_name = $request->first_name;
         $customer_contact->last_name = $request->last_name;
         $customer_contact->title = $request->title;
         $customer_contact->email = $request->email;
         $customer_contact->client_id = $request->client_id;
         $customer_contact->mobile = $request->mobile;
         $customer_contact->gender = $request->gender;
         $customer_contact->is_customer = $request->input('is_customer', false);
         $customer_contact->is_supplier = $request->input('is_supplier', false);
         $customer_contact->save();
     }

     public function contactedit(UpdateCustomerContactRequest $request)
     {
         $id = $request->id;
         $customer_contact = Clientcontact::find($id);

         $customer_contact->first_name = $request->first_name;
         $customer_contact->last_name = $request->last_name;
         $customer_contact->title = $request->title;
         $customer_contact->email = $request->email;
         $customer_contact->client_id = $request->client_id;
         $customer_contact->mobile = $request->mobile;
         $customer_contact->is_customer = $request->input('is_customer', false);
         $customer_contact->is_supplier = $request->input('is_supplier', false);
         $customer_contact->update();

         return $request;
     }
}
