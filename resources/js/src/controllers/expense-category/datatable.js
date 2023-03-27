import DataTableHelper from "../../helpers/datatable-helper";
import { ExpenseCategoryConfig } from "../../config/datatables";

const ExpenseCategoryDatatable = function(){

    const initalize = (elementId) => {
        new DataTableHelper(ExpenseCategoryConfig);
    }

    return { initalize }
}

export default ExpenseCategoryDatatable;