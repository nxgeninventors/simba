<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Company;
use App\Models\Quotes;
use App\Models\QuotesDetails;
use Illuminate\Http\Request;

class QuotesController extends Controller
{
    public function quotes_index()
    {
        $companies = Company::getCompanies();
        $clients = Client::getClients();

        return view('quotes.index', [
            'companies' => $companies,
            'clients' => $clients,
        ]);
    }

    public function company_details(Request $request)
    {
        $company = Company::find($request->company_id);
        $client = Client::find($request->client_id);

        return view('quotes.quotes', [
            'company' => $company,
            'client' => $client,
        ]);
    }

    public function quotes_save(Request $request)
    {
        $quotes = new Quotes();
        $quotes->invoice_number = $request->Quotes_number;
        $quotes->invoice_date = $request->invoice_date;
        $quotes->quotation_number = $request->quotation_number;
        $quotes->reference_number = $request->reference_number;
        $quotes->reverse_charge = $request->reverse_charge;
        $quotes->date_supply = $request->date_supply;
        $quotes->state = $request->state;
        $quotes->place_supply = $request->place_supply;
        $quotes->client_id = $request->client_id;
        $quotes->sub_amount = $request->sub_amount;
        $quotes->sub_gst = $request->sub_gst;
        $quotes->sub_taxable = $request->sub_taxable;
        $quotes->totalamount_before = $request->totalamount_before;
        $quotes->total_igst = $request->total_igst;
        $quotes->total_sgst = $request->total_sgst;
        $quotes->total_cgst = $request->total_cgst;
        $quotes->totalamount_after = $request->totalamount_after;

        $quotes->save();
    }

    public function quotes_details(Request $request)
    {
        foreach ($request->data as $row) {
            $model = new QuotesDetails();
            $model->s_no = $row['s_no'];
            $model->service_description = $row['service_des'];
            $model->hsn_code = $row['hsn_code'];
            $model->periodicity1 = $row['periodicity1'];
            $model->periodicity2 = $row['periodicity2'];
            $model->rate = $row['rate'];
            $model->amount = $row['amount'];
            $model->gst = $row['gst'];
            $model->taxable_value = $row['taxable_value'];
            $model->quotes_no = $row['Quotes_number'];
            $model->save();
        }
    }

    public function details_del(Request $request)
    {
        QuotesDetails::where('quotes_no', $request->Quotes_number)->delete();
    }
}
