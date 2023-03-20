import ExpenseDatatable from './datatable';
const ExpenseCtrl = function () {

    const init = () => {
        // tinyMce = tinyMceUtils();
        // tinyMce.initalize("tiny-meeting-notes");

        ExpenseDatatable().initalize();
    }


    return { init };
};

export default ExpenseCtrl;