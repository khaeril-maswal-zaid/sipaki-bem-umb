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

document.addEventListener("DOMContentLoaded", function () {
    // Fungsi untuk mengambil data dari route lain dan memperbarui chart
    function fetchDataAndUpdateChart(chart, dataKey) {
        fetch("/live-count-api") // Gantilah ini dengan route yang tepat
            .then((response) => response.json())
            .then((data) => {
                let datas = [
                    {
                        name: data[dataKey].namapaslon[0].pasangan_calon,
                        y: data[dataKey].count[0],
                    },
                    {
                        name: data[dataKey].namapaslon[1].pasangan_calon,
                        y: data[dataKey].count[1],
                    },
                ];
                chart.series[0].setData(datas);
            })
            .catch((error) => console.error("Error fetching data:", error));
    }

    // Fungsi untuk inisialisasi chart
    function createChart(containerId, titleText) {
        return Highcharts.chart(containerId, {
            chart: {
                type: "pie",
            },
            title: {
                text: titleText,
            },
            tooltip: {
                valueSuffix: " Suara",
            },
            subtitle: {
                text: "Universitas Muhammdiyah Bulukumba",
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
                    name: "Prolehan",
                    colorByPoint: true,
                    data: [], // Data awal kosong, akan diisi dari server
                },
            ],
        });
    }

    // Buat chart untuk setiap kategori
    const chart1 = createChart(
        "container",
        "Hasil Pemilihan Presiden dan Wakil Presiden Mahasiswa"
    );
    const chart2 = createChart(
        "container2",
        "Hasil Pemilihan Ketua HIMAPRODI Peternakan"
    );
    const chart3 = createChart(
        "container3",
        "Hasil Pemilihan Ketua HIMAPRODI Aktuaria"
    );

    // Panggil fetch data dan update chart secara berkala
    fetchDataAndUpdateChart(chart1, "bem");
    fetchDataAndUpdateChart(chart2, "peter");
    fetchDataAndUpdateChart(chart3, "akt");

    setInterval(() => fetchDataAndUpdateChart(chart1, "bem"), 7 * 60000); // Ambil data tiap 2 detik
    setInterval(() => fetchDataAndUpdateChart(chart2, "peter"), 7 * 60000); // Ambil data tiap 2 detik
    setInterval(() => fetchDataAndUpdateChart(chart3, "akt"), 7 * 60000); // Ambil data tiap 2 detik
});
