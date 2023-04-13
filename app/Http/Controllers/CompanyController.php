<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Http\Requests\StoreCompanyDetailsRequest;
use App\Models\Client;
use App\Models\Companies;



class CompanyController extends Controller
{
    public function detailssave(StoreCompanyDetailsRequest $request)
    {
        $details = new Companies();

        $details->company_name = $request->company_name;
        $details->address = $request->address;
        $details->contact_number = $request->contact_number;
        $details->gst_no = $request->gst_no;
        $details->bank_name = $request->bank_name;
        $details->account_no = $request->account_no;
        $details->ifsc_code = $request->ifsc_code;
        $details->save();

        return redirect('invoice')->with('success');
    }

    public function invoice_index()
    {
        $companies = Companies::all();
        $clients = Client::all();

        return view('company.index',[
            'companies' => $companies,
            'clients' => $clients
        ]);
    }

    public function company_details(CompanyRequest $request)
    {
       $company = Companies::find($request->company_id);
       $client = Client::find($request -> client_id);

        return view('company.invoice',[
            'company' => $company,
            'client' => $client
        ]);

    }
}
