import tinyMceUtils from './tiny-mce';
import MeetingNoteDatatable from './datatable';
const MeetingNotesCtrl = function () {
    let tinyMce;

    const init = () => {
        tinyMce = tinyMceUtils();
        tinyMce.initalize("tiny-meeting-notes");

        MeetingNoteDatatable().initalize();
    }


    return { init };
};

export default MeetingNotesCtrl;