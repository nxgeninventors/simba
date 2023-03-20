import DataTableHelper from "../../helpers/datatable-helper";
import { ExpensesConfig } from "../../config/datatables";

const ExpenseDatatable = function(){

    const initalize = (elementId) => {
        new DataTableHelper(ExpensesConfig);
    }

    return { initalize }
}

export default ExpenseDatatable;