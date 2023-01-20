export const Customer = {
    element: "customer_name",
    api_path: api_base_path + "/customers/list",
    label: "name",
    value: "name",
    method: "GET",
    minLength: 1,
};

export const Order = {
    element: "order_table_autocomplete",
    api_path: api_base_path + "/plants/list",
    label: "description",
    value: "description",
    method: "GET",
    classBased: true,
    minLength: 1,
};

export const Location = {
    element: "location_name",
    api_path: api_base_path + "/locations/list",
    label: "loc_desc",
    value: "loc_desc",
    method: "GET",
    minLength: 1,
};

export const Plant = {
    element: "plant_name",
    api_path: api_base_path + "/plants/names_list",
    label: "botanical_name",
    value: "botanical_name",
    method: "GET",
    minLength: 1,
};

export const Container = {
    element: "container_name",
    api_path: api_base_path + "/containers/list",
    label: "con_desc_long",
    value: "con_desc_long",
    method: "GET",
    minLength: 1,
};

export const InventoryCrop = {
    element: "crop_name",
    api_path: api_base_path + "/crops/list",
    label: ["description", "total_units"],
    value: "description",
    method: "GET",
    minLength: 1,
    dependentElements: ["location_id"],
};
