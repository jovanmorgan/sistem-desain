<?php
session_start();

// Hapus sesi id_user jika ada
if (isset($_SESSION['id_user'])) {
    unset($_SESSION['id_user']);
}

// Redirect pengguna kembali ke halaman login
header("Location: ../../berlangganan/login");
exit;
