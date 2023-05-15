<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Company;
use App\Models\Purchase;
use App\Models\PurchaseDetails;
use Illuminate\Http\Request;

class PurchaseOrderController extends Controller
{
    public function purchase_index()
    {
        $companies = Company::getCompanies();
        $clients = Client::getClients();

        return view('purchase_order.index', [
            'companies' => $companies,
            'clients' => $clients,
        ]);
    }

    public function company_details(Request $request)
    {
        $company = Company::find($request->company_id);
        $client = Client::find($request->client_id);

        return view('purchase_order.purchase', [
            'company' => $company,
            'client' => $client,
        ]);
    }

    public function purchase_save(Request $request)
    {
        $purchases = new Purchase();

        $purchases->purchase_number = $request->purchase_number;
        $purchases->invoice_date = $request->invoice_date;
        $purchases->quotation_number = $request->quotation_number;
        $purchases->reference_number = $request->reference_number;
        $purchases->reverse_charge = $request->reverse_charge;
        $purchases->date_supply = $request->date_supply;
        $purchases->state = $request->state;
        $purchases->place_supply = $request->place_supply;
        $purchases->client_id = $request->client_id;
        $purchases->sub_amount = $request->sub_amount;
        $purchases->sub_gst = $request->sub_gst;
        $purchases->sub_taxable = $request->sub_taxable;
        $purchases->totalamount_before = $request->totalamount_before;
        $purchases->total_igst = $request->total_igst;
        $purchases->total_sgst = $request->total_sgst;
        $purchases->total_cgst = $request->total_cgst;
        $purchases->totalamount_after = $request->totalamount_after;

        $purchases->save();
    }

    public function purchase_details(Request $request)
    {
        foreach ($request->data as $row) {
            $model = new PurchaseDetails();
            $model->s_no = $row['s_no'];
            $model->service_description = $row['service_des'];
            $model->hsn_code = $row['hsn_code'];
            $model->periodicity1 = $row['periodicity1'];
            $model->periodicity2 = $row['periodicity2'];
            $model->rate = $row['rate'];
            $model->amount = $row['amount'];
            $model->gst = $row['gst'];
            $model->taxable_value = $row['taxable_value'];
            $model->purchase_no = $row['purchase_number'];
            $model->save();
        }
    }

    public function details_del(Request $request)
    {
        PurchaseDetails::where('purchase_no', $request->purchase_number)->delete();
    }
}
