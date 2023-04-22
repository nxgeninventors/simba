<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Http\Requests\StoreCompanyDetailsRequest;
use App\Models\Client;
use App\Models\Companies;
use App\Models\InvoiceDescription;
use App\Models\Invoices;
use Illuminate\Http\Request;

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
    public function invoice_save(Request $request)
    {
        $invoice = new Invoices();

        $invoice->invoice_number = $request->invoice_number;
        $invoice->invoice_date = $request->invoice_date;
        $invoice->quotation_number = $request->quotation_number;
        $invoice->reference_number = $request->reference_number;
        $invoice->reverse_charge = $request->reverse_charge;
        $invoice->date_supply = $request->date_supply;
        $invoice->state = $request->state;
        $invoice->place_supply = $request->place_supply;
        $invoice->client_id = $request->client_id;
        $invoice->sub_amount = $request->sub_amount;
        $invoice->sub_gst = $request->sub_gst;
        $invoice->sub_taxable = $request->sub_taxable;
        $invoice->totalamount_before = $request->totalamount_before;
        $invoice->total_igst = $request->total_igst;
        $invoice->total_sgst = $request->total_sgst;
        $invoice->total_cgst = $request->total_cgst;
        $invoice->totalamount_after = $request->totalamount_after;

        $invoice->save();

    }

    public function invoice_description(Request $request)
    {

        foreach ($request->data as $row) {
            $model = new InvoiceDescription();
            $model->s_no = $row['s_no'];
            $model->service_description = $row['service_des'];
            $model->hsn_code = $row['hsn_code'];
            $model->periodicity1 = $row['periodicity1'];
            $model->periodicity2 = $row['periodicity2'];
            $model->rate = $row['rate'];
            $model->amount = $row['amount'];
            $model->gst = $row['gst'];
            $model->taxable_value = $row['taxable_value'];
            $model->invoice_no = $row['invoice_no'];
            $model->save();
        }
    }
}
