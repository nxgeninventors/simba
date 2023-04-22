import Chart from "chart.js/auto";

const AccountsCtrl = function () {
    const init = () => {
        // tinyMce = tinyMceUtils();
        // tinyMce.initalize("tiny-meeting-notes");
    };

    return { init };
};

export default AccountsCtrl;
$(document).ready(function () {
    var income = $("#p1").text();
    var expense = $("#p2").text();
    var profit = $("#p3").text();

    if (profit != 0) {
        var ctx = document.getElementById("myChart").getContext("2d");
        var myChart = new Chart(ctx, {
            type: "doughnut", // or 'pie'
            data: {
                labels: ["Income", "Expense", "Profit"],
                datasets: [
                    {
                        label: "Amount ",
                        data: [income, expense, profit],
                        backgroundColor: [
                            "rgb(54, 162, 235)",
                            "rgb(255, 99, 132)",
                            "#65a765",
                        ],
                        hoverOffset: 4,
                    },
                ],
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: "top",
                    },
                    title: {
                        display: true,
                        text: "Finance report",
                    },
                },
            },
        });
    }
});
