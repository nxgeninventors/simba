import DataTableHelper from "../../helpers/datatable-helper";
import { IncomesConfig } from "../../config/datatables";

const IncomeDatatable = function(){

    const initalize = (elementId) => {
        new DataTableHelper(IncomesConfig);
    }

    return { initalize }
}

export default IncomeDatatable;