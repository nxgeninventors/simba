import DataTableHelper from "../../helpers/datatable-helper";
import { MeetingNotesConfig } from "../../config/datatables";

const MeetingNoteDatatable = function(){

    const initalize = (elementId) => {
        new DataTableHelper(MeetingNotesConfig);
    }

    return { initalize }
}

export default MeetingNoteDatatable;