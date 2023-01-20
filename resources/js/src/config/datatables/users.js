export const UsersConfig = {
    url: "users",
    table_name: "users_table",
    delete_api: "/users",
    columnDefs: window.defaultColumnDefs,
    orderBy: window.orderByObj,
    edit: {
        modal: false,
        redirect: true,
    },
    columns: [
        { data: "id", title: "ID" },
        { data: "name", title: "Name" },
        { data: "email", title: "Email" },
        // { data: "addr", title: "Address" },
        // { data: "contact", title: "Contact" },
        // { data: "email", title: "Email" },
        // { data: "fax", title: "Fax" },
        // { data: "delivery_zone", title: "Delivery Zone" },
        // { data: "mobile", title: "Mobile" },
        // { data: "phone", title: "Phone" },
        // { data: "terms", title: "Terms" },
        // { data: "notes", title: "Notes" },

        {
            data: null,
            title: "Actions",
            orderable: false,
            className: "action",
            defaultContent: `
                <button type="button"  class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" >
                    <i class="fa-regular fa-pen-to-square text-green-500"></i>
                </button>

                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" >
                    <i class="fa-regular fa-trash-can text-red-500"></i>
                </button>
            `,
        },
    ],
};
