// import moment from 'moment';

window.defaultColumnDefs = [
    { responsivePriority: 1, targets: 0 },
    { responsivePriority: 2, targets: -1, className: "text-center" },
];

window.orderByObj = {
    column: "id",
    index: 0,
    direction: "desc",
};

export const EmptyTableResponse = {
    recordsTotal: 0,
    recordsFiltered: 0,
    data: [],
    currentPage: 0,
};

export { ClientsConfig } from "./clients";
export { UsersConfig } from "./users";
export { MeetingNotesConfig } from "./config/meeting_notes";
export { ProjectsConfig } from "./projects";
export { ExpensesConfig } from "./expense";
export { IncomesConfig } from "./income";
