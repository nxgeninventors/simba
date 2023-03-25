
import ClientsDatatable from './datatable';

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

export default ClientsCtrl;