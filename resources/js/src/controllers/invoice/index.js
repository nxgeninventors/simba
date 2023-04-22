
const InvoiceCtrl = function () {

    const init = () => {
        // tinyMce = tinyMceUtils();
        // tinyMce.initalize("tiny-meeting-notes");
  
    }

    return { init };
};

export default InvoiceCtrl;

$(document).ready(function(){
    
    $('input[class*=number]').val(1);

    $("#addrow").on("click", function() {
       
        var newRow = `<tr>
        <td style="height: 30px;"><input id="removerow" type="button" class="bg-rose-500 text-white active:bg-rose-600 font-bold uppercase text-xs px-4 py-2 rounded-full shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"  name="addrow" value="X" ></td>
        <td><input type="text" id="s_no" name="s_no" class="number bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required></td>
        <td><input type="text" id="service_des" name="service_des" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-56 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required></td>
        <td><input type="text" id="hsn_code" name="hsn_code" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-16 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required></td>
        <td><input type="text" id="periodicity1" name="periodicity1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-16 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required></td>
        <td><input type="text" id="periodicity2" name="periodicity2" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-16 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required></td>
        <td><input type="text" id="rate" name="rate" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-20 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required></td>
        <td><input type="text" id="amount" name="amount" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-20 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required></td>
        <td><input type="text" id="gst" name="gst" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-20 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  ><input type="hidden" id="igst_in" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-20 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required><input type="hidden" id="sgst_in" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-20 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required><input type="hidden" id="cgst_in" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-20 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required></td>
         <td><input type="text" id="taxable_value"name="taxable_value" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-36 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" ></td>
        </tr>`;
        
        $("#detailstable").append(newRow);

        $('input[class*=number]').each(function(index) {
            $(this).val(index + 1);

        });

    });

    $('table').on('click', '#removerow', function() {
        $(this).closest('tr').each(function() {

            $(this).remove();
            update_row();
        });
    });

    $('body').on('keyup','input[id*="amount"],input[id*="igst"],input[id*="cgst"],input[id*="sgst"]',function(){
         
        $('#detailstable tbody tr').each(function() {
            var $row = $(this);
            var igst_value = $('#igst').val() ;
            var cgst_value = $('#cgst').val() ;
            var sgst_value = $('#sgst').val() ;
            var amount = parseInt($row.find('input[id*="amount"]').val());
            
            // calculate GST for each row
            var igst_tax = Math.round(amount * igst_value/ 100);
            var cgst_tax = Math.round(amount * cgst_value/ 100);
            var sgst_tax = Math.round(amount * sgst_value/ 100);

            //igst+cgst+sgst input text
            var all_tax = igst_tax + cgst_tax + sgst_tax;
            $row.find('input[id*="gst"]').val(all_tax);

            $row.find('input[id*="igst_in"]').val(all_tax - cgst_tax - sgst_tax)
            $row.find('input[id*="sgst_in"]').val(all_tax - igst_tax - cgst_tax)
            $row.find('input[id*="cgst_in"]').val(all_tax - igst_tax - sgst_tax)


            //row all tax+amount input text
            var taxable = all_tax + amount;
            $row.find('input[id*="taxable_value"]').val(taxable);

        });
        update_row()
        

   
    });

    
    function update_row (){
        // get all row total amount and total tax value
        var total_amount = 0;
        var total_tax = 0;
        var total_taxable = 0;

        var igst_total = 0;
        var sgst_total = 0;
        var cgst_total = 0;

        $('table tr').each(function(){
            var total_amt_val = parseInt($(this).find('input[id*="amount"]').val());
            var total_tax_val = parseInt($(this).find('input[id*="gst"]').val());
            var total_taxable_val = parseInt($(this).find('input[id*="taxable_value"]').val());
            var total_igst_val = parseInt($(this).find('input[id*="igst_in"]').val());
            var total_sgst_val = parseInt($(this).find('input[id*="sgst_in"]').val());
            var total_cgst_val = parseInt($(this).find('input[id*="cgst_in"]').val());

            if(!isNaN(total_amt_val,total_tax_val,total_taxable_val,total_igst_val,total_sgst_val,total_cgst_val) ){
                total_amount += total_amt_val;
                total_tax += total_tax_val;
                total_taxable += total_taxable_val;
                igst_total += total_igst_val;
                sgst_total += total_sgst_val;
                cgst_total += total_cgst_val;
            }

        });

        document.getElementById('before_tax').innerHTML = total_amount;
       

        document.getElementById('igst_val').innerHTML = igst_total;
        document.getElementById('sgst_val').innerHTML = sgst_total;
        document.getElementById('cgst_val').innerHTML = cgst_total;


        // Total row value input
        document.getElementById('all_amount').innerHTML = total_amount;
        document.getElementById('all_gst').innerHTML = total_tax;
        document.getElementById('all_taxable').innerHTML = total_taxable;


        //total amount+total tax value
        var total_tax_amount = total_tax + total_amount;
        document.getElementById('total_tax').innerHTML = total_tax_amount;

        // numbers to words 
        var a = ['','one ','two ','three ','four ', 'five ','six ','seven ','eight ','nine ','ten ','eleven ','twelve ','thirteen ','fourteen ','fifteen ','sixteen ','seventeen ','eighteen ','nineteen '];
        var b = ['', '', 'twenty','thirty','forty','fifty', 'sixty','seventy','eighty','ninety'];
        
        function inWords (num) {
            if ((num = num.toString()).length > 9) return 'overflow';
           var n = ('000000000' + num).substr(-9).match(/^(\d{2})(\d{2})(\d{2})(\d{1})(\d{2})$/);
            if (!n) return; var str = '';
            str += (n[1] != 0) ? (a[Number(n[1])] || b[n[1][0]] + ' ' + a[n[1][1]]) + 'crore ' : '';
            str += (n[2] != 0) ? (a[Number(n[2])] || b[n[2][0]] + ' ' + a[n[2][1]]) + 'lakh ' : '';
            str += (n[3] != 0) ? (a[Number(n[3])] || b[n[3][0]] + ' ' + a[n[3][1]]) + 'thousand ' : '';
            str += (n[4] != 0) ? (a[Number(n[4])] || b[n[4][0]] + ' ' + a[n[4][1]]) + 'hundred ' : '';
            str += (n[5] != 0) ? ((str != '') ? 'and ' : '') + (a[Number(n[5])] || b[n[5][0]] + ' ' + a[n[5][1]])  : '';
            return str;
        }
           
        var amountInWords = inWords(total_tax_amount);
        $('#in_words').text('Rupees ' +amountInWords+ ' only');
      
    }

    const checkbox = $('#checkbox');
    const company_name1 = $('#company_name1');
    const company_name2 = $('#company_name2');
    const address1 = $('#address1');
    const address2 = $('#address2');
    const gst_number1 = $('#gst_number1');
    const gst_number2 = $('#gst_number2');
    const state1 = $('#state1');
    const state2 = $('#state2');
    
    checkbox.on('change', function() {
      if (this.checked) {
        company_name2.val(company_name1.val());
        address2.val(address1.val());
        gst_number2.val(gst_number1.val());
        state2.val(state1.val());
      } else {
        company_name2.val('');
        address2.val('');
        gst_number2.val('');
        state2.val('');
      }
    });
    

    // Indian States array
    const indianStates = ['Andhra Pradesh','Arunachal Pradesh','Assam','Bihar','Chhattisgarh','Goa','Gujarat','Haryana','Himachal Pradesh','Jharkhand','Karnataka','Kerala','Madhya Pradesh','Maharashtra','Manipur','Meghalaya','Mizoram','Nagaland','Odisha','Punjab','Rajasthan','Sikkim','Tamil Nadu','Telangana','Tripura','Uttar Pradesh','Uttarakhand','West Bengal'];
  
    var $indianStateSelect = $('#indian-state-select');
  
    // Populate the select options
    $.each(indianStates, function(Index,state) {
      $indianStateSelect.append($('<option>', {
        value: state,
        text: state
      }));
    });
  
    // Select the first option by default
    $indianStateSelect.val(indianStates[22]);

    //Set today date in input field
    $('#date').val(new Date().toISOString().substr(0, 10));
    $('#date1').val(new Date().toISOString().substr(0, 10));


    $("#full_form").click(function (event) {
        event.preventDefault();
        var invoice_number = $('#invoice_number').val();
        var invoice_date = $('#date').val();
        var quotation_number = $('#quotation_number').val();
        var ref_no = $('#ref_no').val();
        var date_supply = $('#date1').val();
        var reverse_charge = $('#reverse_charge').val();
        var state = $('#indian-state-select').val();
        var place_supply = $('#place_supply').val();
        var client_id = $('#client_id').val();
        var all_amount = $('#all_amount').text();
        var all_gst = $('#all_gst').text();
        var all_taxable = $('#all_taxable').text();
        var totalamount_before = $('#before_tax').text();
        var total_igst = $('#igst_val').text();
        var total_sgst = $('#sgst_val').text();
        var total_cgst = $('#cgst_val').text();
        var totalamount_after = $('#total_tax').text();


        $.ajax({
            type: "post",
            url: "invoice_save",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                invoice_number: invoice_number,
                invoice_date: invoice_date,
                quotation_number: quotation_number,
                reverse_charge: reverse_charge,
                reference_number: ref_no,
                date_supply: date_supply,
                state: state,
                place_supply: place_supply,
                client_id: client_id,
                sub_amount: all_amount,
                sub_gst: all_gst,
                sub_taxable: all_taxable,
                totalamount_before: totalamount_before,
                total_igst: total_igst,
                total_sgst: total_sgst,
                total_cgst: total_cgst,
                totalamount_after: totalamount_after,
            },
            dataType: "json",
            success: function (data1) {
              
 
            },
            error: function (data) {
               
            }
        });
    });

        $("#des_submit").click(function () {
        
            // Get all the rows
            const rows = document.querySelectorAll('#input_field tr');

            // Loop through the rows and get the input values
            const rowData = [];
            rows.forEach(row => {
            const inputValues = {
                s_no: row.querySelector('#s_no').value,
                service_des: row.querySelector('#service_des').value,
                hsn_code: row.querySelector('#hsn_code').value,
                periodicity1: row.querySelector('#periodicity1').value,
                periodicity2: row.querySelector('#periodicity2').value,
                rate: row.querySelector('#rate').value,
                amount: row.querySelector('#amount').value,
                gst: row.querySelector('#gst').value,
                taxable_value: row.querySelector('#taxable_value').value,
                invoice_no: $("#invoice_number").val()

            };
            rowData.push(inputValues);
            });
            
            // Store the input values for each row in an object or an array
            console.log(rowData);

            $.ajax({
                type: "post",
                url: "invoice_description",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                data: rowData
                },
                dataType: "json",
                success: function (data1) {
                   $('#service_des').val()
    
                },
                error: function (data) {
                
                }
            });

        });

        $("#del_btn").click(function (event) {
            event.preventDefault();
          
            var invoice_number = $('#invoice_number').val();
            $.ajax({
                type: "post",
                url: "details_del",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    invoice_number: invoice_number,
                },
                dataType: "json",
                success: function (data1) {
                  
     
                },
                error: function (data) {
                   
                }
            });
        });

    
});

