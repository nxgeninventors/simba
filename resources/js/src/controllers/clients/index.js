
import ClientsDatatable from './datatable';
import HttpService from "../../services/http-service";

const ClientsCtrl = function () {

    const init = () => {
        console.log("ClientsCtrl--------");
        ClientsDatatable().initalize();

        $(document).on("click", '.view_customer', function(){
            var $this = $(this);
            var rowData = self.dtInstance.row($this.closest("tr")).data();
            window.location.href = window.base_path+'/customers/'+rowData.id;
        })

          
    }

    return { init };
};
$( document ).ready(function() {
    $("#contact-submit").click(function (event) {
        event.preventDefault();
        var data = $("#customercontact").serializeObject();
        
        
        $.ajax({
            type: "post",
            url: "contactsave",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: data,
            dataType: "json",
            success: function (data1) {
 
            },
            error: function (data) {
                console.log(data);
            }
        });
    });

    $(document).on("click", '#contact-edit', function(){
        event.preventDefault();
        var row= $(this);
        var Id=$(this).attr('id');
        $("#id").val(Id);
        var firstname= row.closest("tr").find("td:eq(1)").text();
        var first_name = $.trim(firstname);
        $("#first_name1").val(first_name);
        var last_name= row.closest("tr").find("td:eq(2)").text();
        var lastname = $.trim(last_name);
        $("#last_name1").val(lastname);
        var title= row.closest("tr").find("td:eq(6)").text();
        var title1 = $.trim(title);
        $("#title1").val(title1);
        var email= row.closest("tr").find("td:eq(3)").text();
        var email1 = $.trim(email);
        $("#email1").val(email1);
        var mobile= row.closest("tr").find("td:eq(4)").text();
        var mobile1 = $.trim(mobile);
        $("#mobile1").val(mobile1);
        var gender= row.closest("tr").find("td:eq(5)").text();
        $('#gender1').val(`${gender}`);
        // $("#gender1 option[value = '"+gender+"']").prop('selected');
        var id= row.closest("tr").find("td:eq(0)").text();
        var id1 = $.trim(id);
        $("#id").val(id1);

        

    });

    $("#contact-update").click(function (event) {
        event.preventDefault();
        var data = $("#contactupdate").serializeObject();
        $.ajax({
            type: "PUT",
            url: "contact/edit",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: data,
            dataType: "json",
            success: function (data1) {

            $('#tr_'+data1['id']).find('td:eq(1)').text(data1['first_name']);
            $('#tr_'+data1['id']).find('td:eq(2)').text(data1['last_name']);
            $('#tr_'+data1['id']).find('td:eq(3)').text(data1['email']);
            $('#tr_'+data1['id']).find('td:eq(4)').text(data1['mobile']);
            $('#tr_'+data1['id']).find('td:eq(5)').text(data1['gender']);
            $('#tr_'+data1['id']).find('td:eq(6)').text(data1['title']);

            $("#close-modal").click();
           
            },
            error: function (data) {
                console.log(data);
            }
        });
    });
});

export default ClientsCtrl;