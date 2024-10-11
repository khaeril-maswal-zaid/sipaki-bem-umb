import "./bootstrap";

// Tailwind UI
import "flowbite";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

//------------------------Highcharts------------------------------------------------
// Impor Highcharts
import Highcharts from "highcharts";

// Impor modul tambahan (jika diperlukan)
import Exporting from "highcharts/modules/exporting";
Exporting(Highcharts);

// Fungsi untuk membuat chart Highcharts dengan parameter containerId dan dataSeries
function createPieChart(containerId, dataSeries) {
    Highcharts.chart(containerId, {
        chart: {
            type: "pie",
        },
        title: {
            text: "&nbsp",
        },
        tooltip: {
            valueSuffix: "%",
        },
        subtitle: {
            // text: "Universitas Muhammadiyah Bulukumba tahun 2024",
        },
        plotOptions: {
            series: {
                allowPointSelect: true,
                cursor: "pointer",
                dataLabels: [
                    {
                        enabled: true,
                        distance: 20,
                    },
                    {
                        enabled: true,
                        distance: -40,
                        format: "{point.percentage:.1f}%",
                        style: {
                            fontSize: "1.2em",
                            textOutline: "none",
                            opacity: 0.7,
                        },
                        filter: {
                            operator: ">",
                            property: "percentage",
                            value: 10,
                        },
                    },
                ],
            },
        },
        series: [
            {
                name: "Percentage",
                colorByPoint: true,
                data: dataSeries,
            },
        ],
    });
}

// Panggil fungsi untuk setiap chart dengan parameter berbeda
createPieChart("container0", window.dataSeries0);
createPieChart("container1", window.dataSeries1);
createPieChart("container2", window.dataSeries2);
