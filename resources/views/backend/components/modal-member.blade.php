<div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewModalLabel">View Chart</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <select id="dataType" class="form-select mb-3">
                    <option value="daily">Harian</option>
                    <option value="weekly">Mingguan</option>
                    <option value="monthly">Bulanan</option>
                </select>
                <div id="chart" style="width:100%; height:400px;"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    var chart;

    // Fungsi untuk merender chart
    function renderChart(dataType, data) {
        var options = {
            series: [{
                name: "Total Postingan",
                data: data.posts
            }],
            chart: {
                type: 'area',
                height: 350,
                zoom: {
                    enabled: false
                }
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth'
            },
            title: {
                text: 'Analisis Postingan',
                align: 'left'
            },
            subtitle: {
                text: 'Jumlah Postingan',
                align: 'left'
            },
            labels: data.dates,
            xaxis: {
                type: 'datetime',
            },
            yaxis: {
                opposite: true
            },
            legend: {
                horizontalAlign: 'left'
            }
        };

        if (chart) {
            chart.destroy();
        }

        chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
    }

    function fetchData(dataType, userId) {
        axios.get('/chart-data', {
            params: {
                user_id: userId,
                data_type: dataType
            }
        })
        .then(function (response) {
            var seriesData = response.data[dataType];
            var data = {
                posts: seriesData.map(item => item.total),
                dates: seriesData.map(item => item.date || item.week || item.month)
            };
            renderChart(dataType, data);
        })
        .catch(function (error) {
            console.error("Error fetching chart data:", error);
        });
    }

    document.getElementById('viewModal').addEventListener('show.bs.modal', function(event) {
        var button = event.relatedTarget;
        var userId = button.getAttribute('data-id');
        var dataType = document.getElementById('dataType').value;
        fetchData(dataType, userId);
    });

    // Event listener untuk mengubah grafik saat pilihan di dropdown diubah
    document.getElementById('dataType').addEventListener('change', function() {
        var dataType = this.value; // Ambil tipe data yang dipilih
        var userId = document.querySelector('[data-bs-target="#viewModal"]').getAttribute('data-id'); // Ambil user_id
        fetchData(dataType, userId); // Ambil data dari server dan tampilkan grafik
    });

    // Memuat chart default (harian) saat halaman dimuat
    document.addEventListener('DOMContentLoaded', function () {
        var userId = 1; // Default user_id, sesuaikan dengan user yang sesuai
        fetchData('daily', userId); // Memuat chart harian pertama kali
    });
</script>

