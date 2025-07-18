// resources/js/dataTable.js

import { DataTable } from "simple-datatables";
document.addEventListener("DOMContentLoaded", function () {
    if (document.getElementById("data-table")) {
        const dataTable = new DataTable("#data-table", {
            searchable: true,
            sortable: true,
            perPage: 10,
            perPageSelect: [5, 10, 20, 50],
            firstLast: true,
        });
    }

    if (
        document.getElementById("filter-table") &&
        typeof simpleDatatables.DataTable !== "undefined"
    ) {
        const dataTable = new simpleDatatables.DataTable("#filter-table", {
            tableRender: (_data, table, type) => {
                if (type === "print") {
                    return table;
                }
                const tHead = table.childNodes[0];
                const filterHeaders = {
                    nodeName: "TR",
                    attributes: {
                        class: "search-filtering-row",
                    },
                    childNodes: tHead.childNodes[0].childNodes.map(
                        (_th, index) => ({
                            nodeName: "TH",
                            childNodes: [
                                {
                                    nodeName: "INPUT",
                                    attributes: {
                                        class: "datatable-input",
                                        type: "search",
                                        "data-columns": "[" + index + "]",
                                    },
                                },
                            ],
                        })
                    ),
                };
                tHead.childNodes.push(filterHeaders);
                return table;
            },
        });
    }
});
