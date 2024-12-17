<?php
// Dapatkan nama halaman dari URL saat ini tanpa ekstensi .php
$current_page = basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), ".php");

// Tentukan judul halaman berdasarkan nama file
switch ($current_page) {
    case 'dashboard':
        $page_title = 'Dashboard';
        break;
    case 'transaksi':
        $page_title = 'Transaksi';
        break;
    case 'pendapatan':
        $page_title = 'Pendapatan';
        break;
    case 'pengeluaran':
        $page_title = 'Pengeluaran';
        break;
    case 'laporan_keuangan':
        $page_title = 'Laporan Keuangan';
        break;
    case 'target':
        $page_title = 'Target Keuangan';
        break;
    case 'peringatan':
        $page_title = 'Peringatan Keuangan';
        break;
    case 'prediksi':
        $page_title = 'Prediksi Keuangan';
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
