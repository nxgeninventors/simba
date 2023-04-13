<x-base-layout>
<div id="print">
   <table table width=90% height=30% border=2 style="border-collapse: collapse;margin: 50px  auto 0;">
      <tr >
         <td  class="header">
            <div>
               <p><b>Contact details:</b></p>
               <p><b>{{$company -> contact_number}}</b></p>
            </div>
            <div>
               <h1>M/s {{$company -> company_name}}</h1>
               <p>{{$company -> address}}</p>
               <h3>GSTIN: {{$company -> gst_no}}</h3>
            </div>
         </td>
      </tr>
   </table>
   <table width=90% height=30% border=2 style="border-collapse: collapse;margin: 0 auto;">
      <tr>
         <th style="text-align: center; height: 50px;" colspan="2">TAX INVOICE</th>
      </tr>
      <tr>
         <td width="50%" style="height: 30px;">
            <label for="invoice_no" >Invoice No:</label>
            <span><input type="text" id="invoice_number" value="" class="p-2.5 w-full rounded-lg text-gray-900 text-sm"></span>
         </td>
         <td width="50%" >
            <label for="Quotation_no" >Quotation No:</label>
            <span><input type="text" id="quotation_number" value="" class="p-2.5 w-full rounded-lg text-gray-900 text-sm"></span>
         </td>
      </tr>
      <tr>
         <td width="50%" style="height: 30px;">
            <label for="invoice_date" >Invoice Date:</label>
            <span><input type="date" id="date"  class="p-2.5 w-full rounded-lg text-gray-900 text-sm"></span>
         </td>
         <td width="50%">
            <label for="Reference_no" >Reference No:</label>
            <span><input type="text" id="ref_no" value="" class="p-2.5 w-full rounded-lg text-gray-900 text-sm"></span>
         </td>
      </tr>
      <tr>
         <td width="50%" style="height: 30px;">
            <label for="Reverse_charge" >Reverse Charge:</label>
            <span><input type="text" id="reverse_charge" value="" class="p-2.5 w-full rounded-lg text-gray-900 text-sm"></span>
         </td>
         <td width="50%">
            <label for="date_of_supply" >Date Of Supply:</label>
            <input type="date" id="date1"  class="p-2.5 w-full rounded-lg text-gray-900 text-sm">
         </td>
      </tr>
      <tr>
         <td width="50%" style="height: 30px;">
            <label for="state" >State:</label>
            <span><select id="indian-state-select" class="p-2.5 w-full rounded-lg text-gray-900 text-sm"></select></span>
         </td>
         <td width="50%">
            <label for="place_of_supply" >Place of supply:</label>
            <span><input type="text" id="place_supply" value="" class="p-2.5 w-full rounded-lg text-gray-900 text-sm"></span>
         </td>
      </tr>
      <tr>
         <th style="background-color: white;" colspan="2"><b>&nbsp;</b></th>
      </tr>
      <tr>
         <td width="50%" style="text-align: center;height: 40px;"><b class="float-left">Same as: </b> <input id="checkbox" type="checkbox"  name="bordered-checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600 float-left"><b>Bill to Party</b></td>
         <td width="50%"style="text-align: center;height: 40px;"><b>Consignee</b></td>
      </tr>
      <tr>
         <td width="50%" style="height: 30px;">
            <label for="company_name" >Company name:</label>
            <span><input type="text" id="company_name1" class="p-2.5 w-full rounded-lg text-gray-900 text-sm"  value="{{$client -> name}}" readonly></span>
         </td>
         <td width="50%">
            <label for="company_name" >Company name:</label>
            <span><input type="text" id="company_name2" class="p-2.5 w-full rounded-lg text-gray-900 text-sm"  ></span>
         </td>
      </tr>
      <tr>
         <td width="50%" style="height: 30px;">
            <label for="address" >Address:</label>
            <span><textarea type="text" id="address1" class="p-2.5 w-full rounded-lg text-gray-900 text-sm"   readonly>{{{$client -> street_address}}},{{{$client -> city}}}.</textarea></span>
         </td>
         <td width="50%">
            <label for="address" >Address:</label>
            <span><textarea type="text" id="address2" class="p-2.5 w-full rounded-lg text-gray-900 text-sm"   ></textarea></span>
         </td>
      </tr>
      <tr>
         <td width="50%" style="height: 30px;">
            <label for="gst_no" >GSTIN No:</label>
            <span><input type="text" id="gst_number1" class="p-2.5 w-full rounded-lg text-gray-900 text-sm"  value="{{$client -> gst_no}}" ></span>
         </td>
         <td width="50%">
            <label for="gst_number" >GSTIN No:</label>
            <span><input type="text" id="gst_number2" class="p-2.5 w-full rounded-lg text-gray-900 text-sm"  value="" ></span>
         </td>
      </tr>
      <tr>
         <td width="50%" style="height: 30px;">
            <label for="state" >State:</label>
            <span><input type="text" id="state1" class="p-2.5 w-full rounded-lg text-gray-900 text-sm"  value="{{$client -> state}}" readonly></span>
         </td>
         <td width="50%">
            <label for="state" >State:</label>
            <span><input type="text" id="state2" class="p-2.5 w-full rounded-lg text-gray-900 text-sm" ></span>
         </td>
      </tr>
      <tr>
         <th  colspan="2" style="background-color: white;"><b>&nbsp;</b></th>
      </tr>
   </table>
   <table id="detailstable" width="90%" border="2" style="border-collapse: collapse;margin: 0 auto">
      <thead>
         <tr align="center" >
            <th style="width: 5%;" rowspan="2"><button type="button" id="addrow" class="bg-teal-500 text-white active:bg-teal-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" >+</button></th>
            <th style=" width: 5%;height: 50px;" rowspan="2">S No</th>
            <th style="width: 20%;" rowspan="2">Service Description</th>
            <th style="width: 5%" rowspan="2">SAC/HSN Code</th>
            <th style="width: 20%" colspan="2">Periodicity</th>
            <th style="width: 10%" rowspan="2">Rate</th>
            <th style="width: 10%" rowspan="2">AMOUNT</th>
            <th style="width: 10%" rowspan="2">GST</th>
            <th style="width: 10%" rowspan="2">Taxable Value</th>
         </tr>
         <tr>
            <th>1</th>
            <th>2</th>
         </tr>
      </thead>
      <tbody id="input_field">
         <tr >
            <td style="height: 30px;" ><input type="button" id="removerow" class="bg-rose-500 text-white active:bg-rose-600 font-bold uppercase text-xs px-4 py-2 rounded-full shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" value="X" ></td>
            <td><input type="text" id="s_no" class="number bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required></td>
            <td><input type="text" id="service_des" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-56 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required></td>
            <td><input type="text" id="hsn_code" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-16 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required></td>
            <td><input type="text" id="periodicity" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-16 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required></td>
            <td><input type="text" id="1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-16 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required></td>
            <td><input type="text" id="rate" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-20 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required></td>
            <td><input type="text" id="amount" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-20 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required></td>
            <td><input type="text" id="gst" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-20 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  readonly>
               <input type="hidden" id="igst_in" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-20 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required>
               <input type="hidden" id="sgst_in" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-20 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required>
               <input type="hidden" id="cgst_in" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-20 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required>
            </td>
            <td><input type="text" id="taxable_value" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-36 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  readonly></td>
         </tr>
      </tbody>
   </table>
   <table  width="90%" border="1" style="border-collapse: collapse;margin: 0 auto">
      <tr>
         <td width="65%" height="30px"style="text-align: right;"><b >Total</b></td>
         <td width="10%"><span id="all_amount"></span></td>
         <td width="10%"><span id="all_gst"></span></td>
         <td width="15%"><span id="all_taxable"></span></td>
      </tr>
   </table>
   <table width="90%" border="1" style="border-collapse: collapse;margin: 0 auto">
      <tr>
         <td width="60%" height="30px" rowspan="1"><b>Total Invoice Amount in Words:</b>&nbsp;<span id="in_words"></span></td>
         <td width="25%">Total Amount before Tax:</td>
         <td width="15%"><span id="before_tax"></span></td>
      </tr>
      <tr>
         <td width="60%" height="30px" rowspan="5" class="text-center">
            <b> Bank Account Details:</b><br>
            A/C No: <b>{{$company -> account_no}}</b>,<br>
            Bank Name: <b>{{$company -> bank_name}}</b>,<br>
            IFSC Code: <b>{{$company -> ifsc_code}}</b>.
         </td>
         <td width="25%">
            <span>Add: IGST %:</span>
            <input type="number" id="igst"  name="igst" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-20 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required>
         </td>
         <td width="15%"><span id="igst_val"></span></td>
      </tr>
      <tr>
         <td width="25%">
            <span>Add: CGST %:</span>
            <input type="number" id="cgst" name="cgst" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-20 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required>
         </td>
         <td width="15%"><span id="cgst_val"></span></td>
      </tr>
      <tr>
         <td width="25%">
            <span>Add: SGST %:</span>
            <input type="number" id="sgst" name="sgst" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-20 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required>
         </td>
         <td width="15%"><span id="sgst_val"></span></td>
      </tr>
      <tr>
         <td width="25%">Total Amount after Tax:</td>
         <td width="15%"><span id="total_tax"></span></td>
      </tr>
      <tr>
         <td width="25%">GST on Reverse Charge </td>
         <td width="15%"><b>&nbsp;</b></td>
      </tr>
   </table>
   <table width="90%" border="1" style="border-collapse: collapse;margin: 0 auto">
      <tr>
         <td width="60%" height="70px" ><b>&nbsp;</b></td>
         <td width="40%" rowspan="2" style="text-align: center;">
            <p>Ceritified that the particulars given above are true and correct</>
            <h4><b>FOR NX GEN INVENTORS LLP</b></h4>
         </td>
      </tr>
      <tr>
         <td width="60%"height="70px">
           <b> Terms & Conditions </b><br>
            1. Subject to Krishnagiri Jurisdiction
         </td>
      </tr>
   </table>
</div>
<style>
   th{
   border: 1px solid black;
   }
   td{
   padding: 10px;
   border: 1px solid black;
   }
   .header {
   display: flex;
   gap: 5em;
   height: 10em;
   align-items: center;
   justify-content: space-evenly;
   }
</style>
</x-base-layout>

