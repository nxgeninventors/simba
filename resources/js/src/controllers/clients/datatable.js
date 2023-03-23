import DataTableHelper from "../../helpers/datatable-helper";
import { ClientsConfig } from "../../config/datatables";

const ClientsDatatable = function(){

    const initalize = (elementId) => {
        new DataTableHelper(ClientsConfig);
    }

    return { initalize }
}

export default ClientsDatatable;