<?php
// Dapatkan nama halaman dari URL saat ini tanpa ekstensi .php
$current_page_proses = basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), ".php");

// Tentukan judul halaman berdasarkan nama file
switch ($current_page_proses) {
    case 'dashboard':
        $page_title_proses = 'dashboard';
        break;
    case 'desain_editan':
        $page_title_proses = 'desain_editan';
        break;
    case 'riwayat_desain':
        $page_title_proses = 'riwayat_desain';
        break;
    case 'desain':
        $page_title_proses = 'desain';
        break;
    case 'data_sampah':
        $page_title_proses = 'data_sampah';
        break;
    case 'profile':
        $page_title_proses = 'Profile Saya';
        break;
    case 'log_out':
        $page_title_proses = 'Log Out';
        break;
    default:
        $page_title_proses = 'Sistem Powerplan ';
        break;
}
