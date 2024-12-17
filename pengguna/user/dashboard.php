<?php include 'fitur/penggunah.php'; ?>
<!DOCTYPE html>
<html lang="en">
<?php include 'fitur/head.php'; ?>

<body translate="no">
    <div class="wrapper">
        <?php include 'fitur/sidebar.php'; ?>
        <div class="main-panel">
            <?php include 'fitur/navbar.php'; ?>
            <div class="container">
                <div class="page-inner">
                    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
                        <div>
                            <h3 class="fw-bold mb-3">Dashboard</h3>
                            <h6 class="op-7 mb-2">Halaman Dasboard</h6>
                        </div>
                    </div>



                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                </div>
            </div>

            <?php include 'fitur/footer.php'; ?>
        </div>

    </div>


    <?php include 'fitur/js.php'; ?>
    <!-- Scripts -->
    <script src="../assets/js/core/jquery-3.7.1.min.js"></script>
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/plugin/chart.js/chart.min.js"></script>
    <script src="../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
    <script src="../assets/js/kaiadmin.min.js"></script>
    <script src="../assets/js/setting-demo2.js"></script>

    <script>
        // Variabel PHP ke dalam JavaScript
        var labelOriginal = <?php echo json_encode($labelOriginal); ?>;
        var labels = <?php echo json_encode($labels); ?>;
        var saldos = <?php echo json_encode($saldos); ?>;
        var transactionTypes = <?php echo json_encode($transactionTypes); ?>;
        var results = <?php echo json_encode($results); ?>;
        var jumlahUang = <?php echo json_encode($jumlahUang); ?>; // Tambahkan data jumlah_uang

        var multipleLineChart = document.getElementById("multipleLineChart").getContext("2d");

        var myMultipleLineChart = new Chart(multipleLineChart, {
            type: "line",
            data: {
                labels: labels,
                datasets: [{
                        label: "Saldo Sebelumnya",
                        borderColor: "#FFD700",
                        pointBorderColor: "#FFF",
                        pointBackgroundColor: "#FFD700",
                        pointBorderWidth: 2,
                        pointHoverRadius: 6,
                        pointHoverBorderWidth: 1,
                        pointRadius: 6,
                        backgroundColor: "transparent",
                        fill: true,
                        borderWidth: 2,
                        data: saldos,
                    },
                    {
                        label: "Hasil",
                        borderColor: "#4CAF50",
                        pointBorderColor: "#FFF",
                        pointBackgroundColor: transactionTypes.map(
                            (t) => t.pointBackgroundColor
                        ),
                        pointBorderWidth: 2,
                        pointHoverRadius: 6,
                        pointHoverBorderWidth: 1,
                        pointRadius: 6,
                        backgroundColor: "transparent",
                        fill: true,
                        borderWidth: 2,
                        data: results,
                    },
                    {
                        label: "Jumlah Uang", // Garis ketiga untuk jumlah uang
                        borderColor: "#000", // Warna garis ketiga
                        pointBorderColor: "#FFF",
                        pointBackgroundColor: transactionTypes.map(
                            (t) => t.pointBackgroundColor
                        ),
                        pointBorderWidth: 2,
                        pointHoverRadius: 6,
                        pointHoverBorderWidth: 1,
                        pointRadius: 6,
                        backgroundColor: "transparent",
                        fill: true,
                        borderWidth: 2,
                        data: jumlahUang, // Data jumlah uang untuk garis ketiga
                    },
                ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    position: "top",
                },
                tooltips: {
                    bodySpacing: 4,
                    mode: "nearest",
                    intersect: 0,
                    position: "nearest",
                    xPadding: 10,
                    yPadding: 10,
                    caretPadding: 10,
                    callbacks: {
                        // Menambahkan format dengan pemisah ribuan pada tooltip
                        label: function(tooltipItem, data) {
                            var label = tooltipItem.yLabel;
                            // Format label dengan pemisah ribuan untuk nilai lainnya
                            if (label === 0 || label === 10 || label === 100) {
                                return label; // Tidak mengubah angka-angka kecil
                            }
                            // Format angka dengan pemisah ribuan
                            return label.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                        },
                        // Menampilkan detail lengkap pada tooltip
                        title: function(tooltipItem, data) {
                            var index = tooltipItem[0].index;
                            var tanggalLengkap = labelOriginal[
                                index]; // Menampilkan tanggal dengan format lengkap dalam bahasa Indonesia
                            return tanggalLengkap; // Format tanggal lengkap dalam bahasa Indonesia
                        }

                    },
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true, // Pastikan sumbu Y dimulai dari 0
                            callback: function(value) {
                                return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g,
                                    "."); // Pemisah ribuan
                            },
                        },
                    }],
                },
                layout: {
                    padding: {
                        left: 15,
                        right: 15,
                        top: 15,
                        bottom: 15,
                    },
                },
            },
        });
    </script>



    <script>
        // Bar Chart
        var barChart = document.getElementById("barChart").getContext("2d"),
            pieChart = document.getElementById("pieChart").getContext("2d");

        var myBarChart = new Chart(barChart, {
            type: "bar",
            data: {
                labels: [
                    "Jan",
                    "Feb",
                    "Mar",
                    "Apr",
                    "May",
                    "Jun",
                    "Jul",
                    "Aug",
                    "Sep",
                    "Oct",
                    "Nov",
                    "Dec",
                ],
                datasets: [{
                    label: "Sales",
                    backgroundColor: "rgb(23, 125, 255)",
                    borderColor: "rgb(23, 125, 255)",
                    data: [3, 2, 9, 5, 4, 6, 4, 6, 7, 8, 7, 4],
                }, ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                        },
                    }, ],
                },
            },
        });

        var myPieChart = new Chart(pieChart, {
            type: "pie",
            data: {
                datasets: [{
                    data: [50, 35, 15],
                    backgroundColor: ["#1d7af3", "#f3545d", "#fdaf4b"],
                    borderWidth: 0,
                }, ],
                labels: ["New Visitors", "Subscribers", "Active Users"],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    position: "bottom",
                    labels: {
                        fontColor: "rgb(154, 154, 154)",
                        fontSize: 11,
                        usePointStyle: true,
                        padding: 20,
                    },
                },
                pieceLabel: {
                    render: "percentage",
                    fontColor: "white",
                    fontSize: 14,
                },
                tooltips: false,
                layout: {
                    padding: {
                        left: 20,
                        right: 20,
                        top: 20,
                        bottom: 20,
                    },
                },
            },
        });
    </script>
</body>

</html>