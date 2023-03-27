import ExpenseCategoryDatatable from './datatable';
const ExpenseCategoryCtrl = function () {

    const init = () => {
        ExpenseCategoryDatatable().initalize();
    }


    return { init };
};

export default ExpenseCategoryCtrl;