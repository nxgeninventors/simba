<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientsController extends Controller
{
    public function show(){
        // $clients=Clients::paginate(5);
        $clients=DB::table('clients')->Paginate(5);
        $country = DB::select('select * from countries');
        return view('client.client',[
            'country'=>$country,
            'client'=>$clients
        ]);

    }

    public function store(Request $request){
        $validatedData= $request->validate([
            'name' => 'required',
            'website' => 'required',
            'industry' => 'required',
            'description' => 'required',
            'country_id' => 'required',
            'email' => 'required|email',
            'mobile' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'street_address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required'
        ]);

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

        return $request;

        return view('client',['request'=>$request]);


        

    }
}
