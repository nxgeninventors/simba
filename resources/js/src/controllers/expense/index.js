import ExpenseDatatable from './datatable';
const ExpenseCtrl = function () {

    function updateDescription(description) {
        $("#expense_description").html(description);
    }

    function updateExpenseCategoryDescription () {
        var $this = $(this);
        updateDescription($this.find(":selected").data("description"));
    }

    function registerEvents() {
        $(document).on("change", "#expense_category_id", updateExpenseCategoryDescription);
        updateDescription($("#expense_category_id").find(":selected").data("description"));
    }

    const init = () => {
        ExpenseDatatable().initalize();
        registerEvents();
    }


    return { init };
};

export default ExpenseCtrl;