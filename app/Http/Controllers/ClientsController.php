<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientsRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Models\Clients;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;


class ClientsController extends Controller
{
    public function index(){
        $clients=Clients::get();
        return view('client.index',[
            'client'=>$clients
        ]);

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMeetingNoteRequest  $request
     * @return \Illuminate\Http\Response
     */

     public function create(){

        $country = DB::table('countries')->get();
        return view('client.create',[
            'country'=>$country,
        ]);
     } 

     public function store(StoreClientsRequest $request){
        $clients= new Clients();

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

        return redirect('/clients')->with('status','Client added successfully.');
     }


    public function update(UpdateClientRequest $request, $id){

    // public function update(Request $request, Clients $client){
    // public function update(Request $request, $id){

    
        // print_r($id);exit;
       
       $update=Clients::find($id);
        $update->name = $request->input('name');
        $update->email = $request->input('email');
        $update->website = $request->input('website');
        $update->industry = $request->input('industry');
        $update->mobile = $request->input('mobile');
        $update->state = $request->input('state');
        $update->city = $request->input('city');
        $update->zip = $request->input('zip');
        $update->update();

        return redirect('clients')->with('status', 'update successfully.');
        
     }

     public function edit($id){
        // print_r($id);exit;
        $clients=Clients::find($id);
        return view('client.edit', compact('clients'));
     }
     public function destroy($id)
     {
        //
     }
}
