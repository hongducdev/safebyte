(function($) {
    "use strict";

    var pxl_widget_chart_handler = function($scope, $) {
        const canvas = $scope.find(".pxl-chart canvas");
        if (!canvas) return;

        const chartEl = $scope.find(".pxl-chart");
        const datasets = [];
        const dataSpans = chartEl.find("span[data-values]");
        const xLabels = chartEl.data("labels")?.split(",") || [
            "June",
            "July",
            "August",
            "September",
            "October",
        ];

        dataSpans.each(function() {
            const values = $(this).data("values").split(",").map(Number);
            datasets.push({
                label: $(this).data("title"),
                data: values,
                borderColor: $(this).data("color"),
                backgroundColor: $(this).data("color"),
                tension: 0.4,
                fill: false,
                borderWidth: 2,
                pointRadius: 4,
                pointHoverRadius: 6,
            });
        });

        new Chart(canvas, {
            type: "line",
            data: {
                labels: xLabels,
                datasets: datasets,
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                interaction: {
                    intersect: false,
                    mode: "index",
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            drawBorder: false,
                            color: "rgba(0, 0, 0, 0.1)",
                        },
                        ticks: {
                            callback: function (value) {
                                return "$" + value.toLocaleString();
                            },
                        },
                    },
                    x: {
                        grid: {
                            display: true,
                            drawBorder: false,
                            color: "rgba(0, 0, 0, 0.1)",
                        },
                    },
                },
                plugins: {
                    legend: {
                        position: "top",
                        labels: {
                            boxWidth: 8,
                            usePointStyle: true,
                            pointStyle: "circle",
                        },
                    },
                    tooltip: {
                        backgroundColor: "rgba(255, 255, 255, 0.9)",
                        titleColor: "#000",
                        bodyColor: "#000",
                        borderColor: "rgba(0, 0, 0, 0.1)",
                        borderWidth: 1,
                        padding: 10,
                        displayColors: false,
                        callbacks: {
                            label: function (context) {
                                return "$ " + context.parsed.y.toLocaleString();
                            },
                        },
                    },
                },
            },
        });
    }

    $(window).on("elementor/frontend/init", function () {
        elementorFrontend.hooks.addAction(
            "frontend/element_ready/pxl_chart.default",
            pxl_widget_chart_handler
        );
    });
})(jQuery);
