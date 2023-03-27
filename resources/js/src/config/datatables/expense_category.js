import { formatDateTime } from '../../helpers';

export const ExpenseCategoryConfig = {
    url: "expense_categories",
    table_name: "expense_categories_table",
    delete_api: "/expense_categories",
    columnDefs: window.defaultColumnDefs,
    orderBy: window.orderByObj,
    edit: {
        modal: false,
        redirect: true,
    },
    columns: [
        { data: "id", title: "ID" },
        { data: "name", title: "Category Name" },
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