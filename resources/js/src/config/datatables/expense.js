import { formatDate, format_number } from '../../helpers';

export const ExpensesConfig = {
    url: "expense",
    table_name: "expense_table",
    delete_api: "/expense",
    columnDefs: window.defaultColumnDefs,
    orderBy: window.orderByObj,
    edit: {
        modal: false,
        redirect: true,
    },
    columns: [
        { data: "id", title: "ID" },
        { 
            data: "date_of_expense", 
            title: "Date", 
            render(h) {
                if (h == null) {
                    return '-';
                }
                if (h != '' || h != null) {
                    return formatDate(h);
                }
                
            }, 
        },
        { data: "project.project_name", title: "Project Name"},
        { data: "expense_category.name", title: "Expense Category" },
        { data: "expense_status.name", title: "Expense Status" },
        { 
            data: "amount",
            title: "Amount",
            className: "text-right",
            render(h) {
                return format_number(h);
            }, 
        },
        {
            data: null,
            title: "Actions",
            orderable: false,
            className: "action",
            defaultContent: `
                <button type="button"  class="datatable-edit-btn text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" >
                    <i class="fa-regular fa-pen-to-square text-green-500"></i>
                </button>

                <button type="button" class="datatable-delete-btn text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" >
                    <i class="fa-regular fa-trash-can text-red-500"></i>
                </button>
            `,
        },
    ],
};