<?php
// Dapatkan nama halaman dari URL saat ini tanpa ekstensi .php
$current_page = basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), ".php");

// Fungsi untuk mendapatkan ikon yang sesuai dengan halaman
function getIconForPage($page)
{
    switch ($page) {
        case 'dashboard':
            return 'fas fa-chart-line';
        case 'transaksi':
            return 'fas fa-money-bill-wave';
        case 'laporan_keuangan':
            return 'fas fa-file-alt';
        case 'pengeluaran':
            return 'fas fa-wallet';
        case 'pendapatan':
            return 'fas fa-coins';
        case 'pembayaran':
            return 'fas fa-credit-card';
        case 'akun_pengguna':
            return 'fas fa-users';
        case 'peringatan_keuangan':
            return 'fas fa-exclamation-triangle'; // Ikon untuk peringatan keuangan
        case 'tujuan_keuangan':
            return 'fas fa-bullseye'; // Ikon untuk tujuan keuangan
        case 'prediksi_keuangan':
            return 'fas fa-chart-pie'; // Ikon untuk prediksi keuangan
        case 'profile':
            return 'fas fa-user';
        case 'log_out':
            return 'fas fa-sign-out-alt';
        default:
            return 'fas fa-folder'; // Ikon default jika halaman tidak dikenal
    }
}
?>

<!-- Sidebar -->
<div class="sidebar" data-background-color="dark2">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark2">
            <a href="dashboard" class="logo">
                <img src="../../assets/img/desain/logo2.png" alt="navbar brand" class="navbar-brand gbr"
                    height="60px" />
                <h5 class="text-black judul">Uangku
                </h5>
            </a>
            <!-- style untuk judul -->
            <style>
                .gbr {
                    position: relative;
                    right: 25px;
                }

                .judul {
                    font-size: 27px;
                    position: relative;
                    right: 25px;
                    margin-top: 10px;
                    font-weight: 500;
                    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                }

                /* media untuk hp */

                @media only screen and (max-width: 600px) {
                    .gbr {
                        position: relative;
                        right: 5px;
                    }

                    .judul {
                        font-size: 25px;
                        position: relative;
                        right: 5px;
                    }
                }
            </style>
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                    <i class="gg-menu-left"></i>
                </button>
            </div>
            <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
            </button>
        </div>
        <!-- End Logo Header -->
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner" data-background-color="dark2">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">
                <!-- Bagian Utama -->
                <li class="nav-item <?php echo ($current_page == 'dashboard') ? 'active' : ''; ?>">
                    <a href="dashboard">
                        <i class="<?php echo getIconForPage('dashboard'); ?>"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fas fa-book"></i>
                    </span>
                    <h4 class="text-section">Manajemen Utama</h4>
                </li>

                <li class="nav-item <?php echo ($current_page == 'transaksi') ? 'active' : ''; ?>">
                    <a href="transaksi">
                        <i class="<?php echo getIconForPage('transaksi'); ?>"></i>
                        <p>Transaksi</p>
                    </a>
                </li>

                <li class="nav-item <?php echo ($current_page == 'pendapatan') ? 'active' : ''; ?>">
                    <a href="pendapatan">
                        <i class="<?php echo getIconForPage('pendapatan'); ?>"></i>
                        <p>Pendapatan</p>
                    </a>
                </li>

                <li class="nav-item <?php echo ($current_page == 'pengeluaran') ? 'active' : ''; ?>">
                    <a href="pengeluaran">
                        <i class="<?php echo getIconForPage('pengeluaran'); ?>"></i>
                        <p>Pengeluaran</p>
                    </a>
                </li>

                <li class="nav-item <?php echo ($current_page == 'laporan_keuangan') ? 'active' : ''; ?>">
                    <a href="laporan_keuangan">
                        <i class="<?php echo getIconForPage('laporan_keuangan'); ?>"></i>
                        <p>Laporan Keuangan</p>
                    </a>
                </li>

                <!-- Bagian Peringatan dan Tujuan -->
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fas fa-exclamation-circle"></i>
                    </span>
                    <h4 class="text-section">Pengelolaan Keuangan</h4>
                </li>

                <li class="nav-item <?php echo ($current_page == 'tujuan_keuangan') ? 'active' : ''; ?>">
                    <a href="tujuan_keuangan">
                        <i class="<?php echo getIconForPage('tujuan_keuangan'); ?>"></i>
                        <p>Target Keuangan</p>
                    </a>
                </li>

                <li class="nav-item <?php echo ($current_page == 'peringatan_keuangan') ? 'active' : ''; ?>">
                    <a href="peringatan_keuangan">
                        <i class="<?php echo getIconForPage('peringatan_keuangan'); ?>"></i>
                        <p>Peringatan Keuangan</p>
                    </a>
                </li>

                <li class="nav-item <?php echo ($current_page == 'prediksi_keuangan') ? 'active' : ''; ?>">
                    <a href="prediksi_keuangan">
                        <i class="<?php echo getIconForPage('prediksi_keuangan'); ?>"></i>
                        <p>Prediksi Keuangan</p>
                    </a>
                </li>

                <!-- Bagian Akun dan Pengaturan -->
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fas fa-id-card"></i>
                    </span>
                    <h4 class="text-section">Akun dan Pengaturan</h4>
                </li>

                <li class="nav-item <?php echo ($current_page == 'profile') ? 'active' : ''; ?>">
                    <a href="profile">
                        <i class="<?php echo getIconForPage('profile'); ?>"></i>
                        <p>Profile Saya</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="log_out">
                        <i class="<?php echo getIconForPage('log_out'); ?>"></i>
                        <p>Log Out</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->