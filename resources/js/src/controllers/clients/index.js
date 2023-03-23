
import ClientsDatatable from './datatable';

const ClientsCtrl = function () {

    const init = () => {
        console.log("ClientsCtrl--------");
        ClientsDatatable().initalize();
        
    }


    return { init };
};

export default ClientsCtrl;