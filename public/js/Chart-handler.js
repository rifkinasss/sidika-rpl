document.addEventListener("DOMContentLoaded", function () {
    var formattedData = JSON.parse(
        document.getElementById("formattedData").textContent
    );

    var months = formattedData.map(function (item) {
        return item.month;
    });

    var totals = formattedData.map(function (item) {
        return item.total;
    });

    var colors = [
        "rgba(255, 99, 132, 0.2)",
        "rgba(54, 162, 235, 0.2)",
        "rgba(255, 206, 86, 0.2)",
        "rgba(75, 192, 192, 0.2)",
        "rgba(153, 102, 255, 0.2)",
        "rgba(255, 159, 64, 0.2)",
        "rgba(199, 199, 199, 0.2)",
        "rgba(83, 102, 255, 0.2)",
        "rgba(255, 159, 132, 0.2)",
        "rgba(54, 102, 132, 0.2)",
        "rgba(75, 159, 132, 0.2)",
        "rgba(153, 159, 255, 0.2)",
    ];

    var borderColors = [
        "rgba(255, 99, 132, 1)",
        "rgba(54, 162, 235, 1)",
        "rgba(255, 206, 86, 1)",
        "rgba(75, 192, 192, 1)",
        "rgba(153, 102, 255, 1)",
        "rgba(255, 159, 64, 1)",
        "rgba(199, 199, 199, 1)",
        "rgba(83, 102, 255, 1)",
        "rgba(255, 159, 132, 1)",
        "rgba(54, 102, 132, 1)",
        "rgba(75, 159, 132, 1)",
        "rgba(153, 159, 255, 1)",
    ];

    var ctx = document.getElementById("barCharts").getContext("2d");
    var myChart = new Chart(ctx, {
        type: "bar",
        data: {
            labels: months,
            datasets: [
                {
                    label: "Total",
                    data: totals,
                    backgroundColor: colors.slice(0, months.length),
                    borderColor: borderColors.slice(0, months.length),
                    borderWidth: 0,
                },
            ],
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                },
            },
            responsive: true,
            plugins: {
                legend: {
                    position: "top",
                },
            },
        },
    });
});
