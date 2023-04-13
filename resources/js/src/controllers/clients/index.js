
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
        var data =$(this).data('contact');
       
        $("#first_name1").val(data.first_name);
        $("#last_name1").val(data.last_name);
        $("#title1").val(data.title);
        $("#email1").val(data.email);
        $("#mobile1").val(data.mobile);
        $('#gender1').val(data.gender);
        $("#id").val(data.id);

        

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