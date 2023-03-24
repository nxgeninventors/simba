export const ClientsConfig = {
    url: "customers",
    table_name: "customers_table",
    delete_api: "/customers",
    columnDefs: window.defaultColumnDefs,
    orderBy: window.orderByObj,
    edit: {
        modal: false,
        redirect: true,
    },
    columns: [
        { data: "id", title: "ID" },
        { data: "name", title: "Name" },
        { data: "website", title: "Websit" },
        { data: "industry", title: "industry" },
        { data: "mobile", title: "Contact" },
        { data: "email", title: "Email" },
        { data: "state", title: "State" },
        { data: "city", title: "City" },
        { data: "zip", title: "Zip" },
        // { data: "phone", title: "Phone" },
        // { data: "terms", title: "Terms" },
        // { data: "notes", title: "Notes" },

        {
            data: null,
            title: "Actions",
            orderable: false,
            className: "action",
            defaultContent: `
                <button type="button"  class="datatable-edit-btn text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" >
                    <i class="fa-regular fa-pen-to-square text-green-500"></i>
                </button>

                <button type="button" class="datatable-delete-btn delete text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
                    <i class="fa-regular fa-trash-can text-red-500"></i>
                </button>
            `,
        },
    ],
};
