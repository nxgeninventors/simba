import tinyMceUtils from './tiny-mce';
const MeetingNotesCtrl = function () {
    let tinyMce;


    const init = () => {
        tinyMce = tinyMceUtils();
        tinyMce.initalize("tiny-meeting-notes");
    }


    return { init };
};

export default MeetingNotesCtrl;