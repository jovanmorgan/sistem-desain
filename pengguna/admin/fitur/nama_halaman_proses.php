<?php
// Dapatkan nama halaman dari URL saat ini tanpa ekstensi .php
$current_page_proses = basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), ".php");

// Tentukan judul halaman berdasarkan nama file
switch ($current_page_proses) {
    case 'dashboard':
        $page_title_proses = 'dashboard';
        break;
    case 'transaksi':
        $page_title_proses = 'transaksi';
        break;
    case 'pendapatan':
        $page_title_proses = 'pendapatan';
        break;
    case 'pengeluaran':
        $page_title_proses = 'pengeluaran';
        break;
    case 'laporan_keuangan':
        $page_title_proses = 'laporan_keuangan';
        break;
    case 'target':
        $page_title_proses = 'target';
        break;
    case 'peringatan':
        $page_title_proses = 'peringatan';
        break;
    case 'prediksi':
        $page_title_proses = 'prediksi';
        break;
    case 'profile':
        $page_title_proses = 'Profile Saya';
        break;
    case 'log_out':
        $page_title_proses = 'Log Out';
        break;
    default:
        $page_title_proses = 'Admin Gereja ';
        break;
}
