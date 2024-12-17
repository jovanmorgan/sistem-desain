<?php
// Dapatkan nama halaman dari URL saat ini tanpa ekstensi .php
$current_page = basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), ".php");

// Fungsi untuk mendapatkan ikon yang sesuai dengan halaman
function getIconForPage($page)
{
    switch ($page) {
        case 'dashboard':
            return 'fas fa-chart-line';
        case 'tata_cara_penggunaan':
            return 'fas fa-question-circle';
        case 'desain_editan':
            return 'fas fa-palette';
        case 'riwayat_desain':
            return 'fas fa-history';
        case 'template_desain':
            return 'fas fa-palette';
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
<div class="sidebar" data-background-color="white">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="white">
            <a href="dashboard" class="logo" style="overflow: hidden">
                <img src="../../assets/img/desain/logo2.png" alt="navbar brand" class="navbar-brand gbr" />
            </a>
            <!-- style untuk judul -->
            <style>
                .gbr {
                    margin-left: 10px;
                    width: 150px;
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
                        width: 150px;
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
    <div class="sidebar-wrapper scrollbar scrollbar-inner" data-background-color="white">
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
                    <h4 class="text-section"> Manajemen Desain</h4>
                </li>

                <li class="nav-item <?php echo ($current_page == 'tata_cara_penggunaan') ? 'active' : ''; ?>">
                    <a href="tata_cara_penggunaan">
                        <i class="<?php echo getIconForPage('tata_cara_penggunaan'); ?>"></i>
                        <p>Tata Cara Penggunaan</p>
                    </a>
                </li>
                <li class="nav-item <?php echo ($current_page == 'desain_editan') ? 'active' : ''; ?>">
                    <a href="desain_editan">
                        <i class="<?php echo getIconForPage('desain_editan'); ?>"></i>
                        <p>Desain & Editan</p>
                    </a>
                </li>
                <li class="nav-item <?php echo ($current_page == 'riwayat_desain') ? 'active' : ''; ?>">
                    <a href="riwayat_desain">
                        <i class="<?php echo getIconForPage('riwayat_desain'); ?>"></i>
                        <p>Riwayat Desain</p>
                    </a>
                </li>
                <li class="nav-item <?php echo ($current_page == 'template_desain') ? 'active' : ''; ?>">
                    <a href="template_desain">
                        <i class="<?php echo getIconForPage('template_desain'); ?>"></i>
                        <p>Template Desain</p>
                    </a>
                </li>
                <!-- Bagian Akun dan Pengaturan -->
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fas fa-id-card"></i>
                    </span>
                    <h4 class="text-section">Akun dan Keamanan</h4>
                </li>

                <li class="nav-item <?php echo ($current_page == 'profile') ? 'active' : ''; ?>">
                    <a href="profile">
                        <i class="<?php echo getIconForPage('profile'); ?>"></i>
                        <p>Profile Saya</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" id="saveBtn">
                        <i class="<?php echo getIconForPage('log_out'); ?>"></i>
                        <p>Log Out</p>
                    </a>
                </li>
                <!-- <li class="nav-item">
                    <a href="log_out">
                        <i class="<?php echo getIconForPage('log_out'); ?>"></i>
                        <p>Log Out</p>
                    </a>
                </li> -->
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->