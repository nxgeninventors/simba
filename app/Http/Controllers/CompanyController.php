<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Http\Requests\StoreCompanyDetailsRequest;
use App\Models\Client;
use App\Models\CompanyDetails;


class CompanyController extends Controller
{
    public function detailssave(StoreCompanyDetailsRequest $request)
    {
        $details = new CompanyDetails();

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

    public function invoice_login()
    {
        $companies = CompanyDetails::all();
        $clients = Client::all();

        return view('company.index',[
            'companies' => $companies,
            'clients' => $clients
        ]);
    }

    public function company_details(CompanyRequest $request)
    {
        $id1 = $request->company_id;
       $companies = CompanyDetails::find($id1);
       $id2 = $request -> client_id;
       $client = Client::find($id2);

        return view('company.invoice',[
            'company' => $companies,
            'client' => $client
        ]);

    }
}
