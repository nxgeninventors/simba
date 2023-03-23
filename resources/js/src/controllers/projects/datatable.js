import DataTableHelper from "../../helpers/datatable-helper";
import { ProjectsConfig } from "../../config/datatables";

const MeetingNoteDatatable = function(){

    const initalize = (elementId) => {
        new DataTableHelper(ProjectsConfig);
    }

    return { initalize }
}

export default MeetingNoteDatatable;