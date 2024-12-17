<?php
// Dapatkan nama halaman dari URL saat ini tanpa ekstensi .php
$current_page = basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), ".php");

// Tentukan judul halaman berdasarkan nama file
switch ($current_page) {
    case 'dashboard':
        $page_title = 'Dashboard';
        break;
    case 'desain_editan':
        $page_title = 'Desain Dan Editan';
        break;
    case 'riwayat_desain':
        $page_title = 'Riwayat Desain';
        break;
    case 'desain':
        $page_title = 'Desain Anda';
        break;
    case 'data_sampah':
        $page_title = 'Recycle Bin';
        break;
    case 'profile':
        $page_title = 'Profile Saya';
        break;
    case 'log_out':
        $page_title = 'Log Out';
        break;
    default:
        $page_title = 'Admin Gereja ';
        break;
}
