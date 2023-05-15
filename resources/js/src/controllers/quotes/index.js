const QuotesCtrl = function () {

    const init = () => {
        // tinyMce = tinyMceUtils();
        // tinyMce.initalize("tiny-meeting-notes");

    }
        
    return { init };
};

export default QuotesCtrl;

$(document).ready(function(){

    $("#Quotes_form").click(function (event) {
        event.preventDefault();
        var Quotes_number = $('#Quotes_number').val();
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
            url: "quotes_save",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                Quotes_number: Quotes_number,
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

    $("#quotes_submit").click(function () {
    
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
            Quotes_number: $("#Quotes_number").val()

        };
        rowData.push(inputValues);
        });
        
        // Store the input values for each row in an object or an array
        console.log(rowData);

        $.ajax({
            type: "post",
            url: "quotes_details",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
            data: rowData
            },
            // dataType: "json",
            success: function () {
                document.getElementById('pur_save').innerHTML = "Quotes number  " + $("#Quotes_number").val() + "  details added successfully."
            },
            error: function () {
            
            }
        });

    });

    $("#quotes_del_btn").click(function () {
        
        var Quotes_number = $('#Quotes_number').val();
        $.ajax({
            type: "post",
            url: "quotes_details_del",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                Quotes_number: Quotes_number,
            },
            dataType: "json",
            success: function () {
                $('#removerow').closest('tr').remove();

            },
            error: function () {
                
            }
        });
    });
       
});