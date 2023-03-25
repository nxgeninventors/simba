import $ from "jquery";
import "datatables.net";
import "datatables.net-dt";
import "datatables.net-responsive";
import Swal from "sweetalert2";
import HttpService from "../services/http-service";
window.$ = window.jquery = $;
import { EmptyTableResponse } from "../config/datatables";

$.extend(true, $.fn.dataTable.defaults, {
    responsive: true,
    searching: false,
    //lengthChange: false,
    serverSide: true,
    processing: true,
    //ordering: false,
    paging: true,
    // responsive: true,
    pageLength: window.RECORD_LIMIT,
    lengthMenu: [5, 10, 15, 20, 25, 50],
    asStripeClasses: ["odd-row", "even-row"],
});

var DataTableHelper = function (config) {
    this.config = config;
    this.tableId = config["table_name"];
    this.dtTable = $("#" + this.tableId);
    this.dtInstance = null;
    this.url = "/api/" + config["url"];
    this.baseurl = "/api/" + config["url"];
    this.page_number = 1;
    this.length = window.RECORD_LIMIT;
    this.searchObj = {};
    this.orderBy = config["orderBy"];

    if (!this.dtTable.length) return;

    this.initalizeTable();
    this.handleEvents();
};

Object.defineProperties(DataTableHelper.prototype, {
    initalizeTable: {
        value: function () {
            var self = this;

            var columnDefs =
                typeof self.config["columnDefs"] != "undefined"
                    ? self.config["columnDefs"]
                    : [];
            var order =
                typeof self.config["orderBy"] != "undefined"
                    ? [[this.orderBy.index, this.orderBy.direction]]
                    : [];

            this.dtInstance = this.dtTable
                .DataTable({
                    columns: self.config["columns"],
                    columnDefs: columnDefs,
                    order: order,
                    ajax: function (data, callback, settings) {
                        $.ajax({
                            url: self.updateUrl(),
                            type: "GET",
                            contentType: "application/json",
                            beforeSend: function () {
                                self.toggleLoader(true);
                            },
                            success: function (data) {
                                var dtData = self.prepareData(data);
                                self.toggleLoader(false);
                                callback(dtData);
                                $(".dataTables_empty").addClass(
                                    "bg-red-300 text-white"
                                );
                            },
                            error: function () {
                                self.toggleLoader(false);
                                callback(EmptyTableResponse);
                                $(".dataTables_empty")
                                    .addClass("bg-red-300 text-white")
                                    .text("Something went wrong..");
                            },
                        });
                    },
                })
                .columns.adjust()
                .responsive.recalc();

            window.dtInstance = this.dtInstance
        },
    },
    showInfo: {
        value: function () {
            var id = this.tableId + "_wrapper";
            $("#" + id + " .dataTables_info").hide();
            $("#" + id + " .dataTables_paginate").hide();
            $("#" + id + " .dataTables_length").hide();
        },
    },
    hideInfo: {
        value: function () {
            var id = this.tableId + "_wrapper";
            $("#" + id + " .dataTables_info").show();
            $("#" + id + " .dataTables_paginate").show();
            $("#" + id + " .dataTables_length").show();
        },
    },
    handleError: {
        value: function () {
            msg = msg == "" ? "No data found in the server" : msg;
            $("." + this.tableId + "-grid-error").html("");
            $("#" + this.tableId).append(
                '<tbody class="' +
                    this.tableId +
                    '-grid-error"><tr><th class="text-center error-dt-th" colspan="15">' +
                    msg +
                    "</th></tr></tbody>"
            );
            $("#" + this.tableId + "_processing").css("display", "none");
        },
    },
    toggleLoader: {
        value: function (flag) {
            var $t;

            if (flag) {
                this.dtTable.addClass("hide");
                $t = $("<div>").addClass("processing-embedded");
                this.dtTable
                    .find("tbody")
                    .css({
                        opacity: 0.3,
                    })
                    .append($t);
            } else {
                this.dtTable.removeClass("hide");
                if (typeof $t != "undefined") {
                    $t.remove();
                }
                $(".dataTables_processing").hide();
                this.dtTable.find("tbody").css({
                    opacity: 1,
                });
            }
        },
    },
    deleteRecord: {
        value: function (data) {
            var self = this;

            if (typeof self.config["delete_api"] == "undefined") {
                return;
            }

            var obj = {
                _method: "DELETE",
                id: data.id,
            };

            //console.log(api_base_path, data);
            const promise = HttpService.makeApiCall(
                {
                    url:
                        api_base_path +
                        self.config["delete_api"] +
                        "/" +
                        data.id,
                    method: "POST",
                },
                obj
            );

            promise.then(
                (response) => {
                    //console.log(response);
                    Swal.fire(
                        "Deleted!",
                        "Your file has been deleted.",
                        "success"
                    );
                    self.reload();
                },
                (error) => {
                    //console.log(error);

                    Swal.fire(
                        "Failed",
                        "Something went wrong, Please try again :)",
                        "error"
                    );
                }
            );
        },
    },
    reload: {
        value: function (data) {
            var self = this;
            self.dtInstance.ajax.reload(null, false);
        },
    },
    prepareData: {
        value: function (data) {
            var response = EmptyTableResponse;
            if (
                typeof data != "undefined" &&
                data != null &&
                typeof data.data != "undefined" &&
                data.data.length
            ) {
                response = {
                    recordsTotal: data.total,
                    recordsFiltered: data.total,
                    data: data.data,
                    currentPage: data.current_page ? data.current_page : 1,
                    length: data.per_page ? data.per_page : 10,
                };
            }
            return response;
        },
    },
    handleEvents: {
        value: function (data) {
            var self = this;

            // Pagination
            self.dtTable.on("page.dt", function () {
                var info = self.dtInstance.page.info();
                self.page_number = info.page + 1;
                self.updateUrl();
            });

            // Pagination length change
            self.dtTable.on("length.dt", function (e, settings, len) {
                self.page_number = 1;
                self.length = len;
                self.updateUrl();
            });

            /**
             * Sorting event
             */
            self.dtTable.on("order.dt", function () {
                // This will show: "Ordering on column 1 (asc)", for example
                var order = self.dtInstance.order();
                if (typeof order[0] == "undefined") return;
                self.orderBy = {
                    index: order[0][0],
                    column: self.config["columns"][order[0][0]].data,
                    direction: order[0][1],
                };
                self.updateUrl();
            });

            // Search
            var searchEle = this.tableId + "_search .dt-search-txt";
            $(document).on("change keyup", "." + searchEle, function () {
                self.searchObj = {};
                $("." + searchEle).each(function () {
                    var $this = $(this);
                    var column = $this.attr("data-column");
                    var v = $.trim($this.val());
                    self.searchObj[column] = v;
                });
                self.updateUrl();
                self.reload();
            });

            // Register delete event
            $(document).on("click", ".datatable-delete-btn", function () {
                var $this = $(this);

                var rowData = self.dtInstance.row($this.closest("tr")).data();

                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!",
                }).then((result) => {
                    if (result.isConfirmed) {
                        self.deleteRecord(rowData);
                    }
                });
            });

            //
            $(document).on("click", ".datatable-edit-btn", function (e) {
                console.log("Hello--------");
                e.preventDefault();
                var $this = $(this);
                var rowData = self.dtInstance.row($this.closest("tr")).data();
                self.editHandler(rowData);
            });
        },
    },
    editHandler: {
        value: function (data) {
            var self = this;
            console.log(data);

            if (typeof self.config["edit"] == "undefined") return;

            if (typeof self.config["edit"]["cb"] != "undefined") {
                self.config["edit"]["cb"]();
            }

            if (
                typeof self.config["edit"]["redirect"] != "undefined" &&
                self.config["edit"]["redirect"]
            ) {
                if (self.config["edit"]["rowDataQueryParam"]) {
                    var queryString = $.param(data);
                    window.location.href =
                        "//" +
                        window.location.host +
                        "/" +
                        self.config["url"] +
                        "/" +
                        data[self.config["edit"]["id"]] +
                        "/edit?" +
                        queryString;
                } else if (self.config["edit"]["id"]) {
                    var idArr = self.config["edit"]["id"].split(".");

                    if (Array.isArray(idArr)) {
                        var id;
                        if (idArr.length == 3) {
                            id = data[idArr[0]][idArr[1]][idArr[2]];
                        } else if (idArr.length == 2) {
                            id = data[idArr[0]][idArr[1]];
                        } else if (idArr.length == 1) {
                            id = data[idArr[0]];
                        }
                        window.location.href =
                            "//" +
                            window.location.host +
                            "/" +
                            self.config["url"] +
                            "/" +
                            id +
                            "/edit";
                    } else {
                        window.location.href =
                            "//" +
                            window.location.host +
                            "/" +
                            self.config["url"] +
                            "/" +
                            idArr +
                            "/edit";
                    }

                    //console.log(idArr);
                } else {
                    window.location.href =
                        "//" +
                        window.location.host +
                        "/" +
                        self.config["url"] +
                        "/" +
                        data.id +
                        "/edit";
                }
            }
        },
    },
    updateUrl: {
        value: function () {
            var self = this;
            var obj = {
                page: self.page_number,
                limit: self.length,
                ...self.searchObj,
                ...self.orderBy,
            };

            var queryString = $.param(obj);
            self.url = self.baseurl + "?" + queryString;
            return self.url;
        },
    },
});

export default DataTableHelper;
