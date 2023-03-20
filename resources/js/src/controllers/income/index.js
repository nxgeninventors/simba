import IncomeDatatable from './datatable';
const IncomeCtrl = function () {

    const init = () => {
        // tinyMce = tinyMceUtils();
        // tinyMce.initalize("tiny-meeting-notes");

        IncomeDatatable().initalize();
    }


    return { init };
};

export default IncomeCtrl;