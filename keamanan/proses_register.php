<?php
include 'koneksi.php';

// Cek apakah ada data yang dikirim dari form sign-up-form
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nama_lengkap']) && isset($_POST['username']) && isset($_POST['password'])) {
    // Tangkap data dari form
    $nama_lengkap = $_POST['nama_lengkap'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $check_query_admin = "SELECT * FROM admin WHERE username = '$username'";
    $result_admin = mysqli_query($koneksi, $check_query_admin);
    if (mysqli_num_rows($result_admin) > 0) {
        echo "error_username_exists"; // Kirim respon "error_email_exists" jika email sudah terdaftar
        exit();
    }
    $check_query_user = "SELECT * FROM user WHERE username = '$username'";
    $result_user = mysqli_query($koneksi, $check_query_user);
    if (mysqli_num_rows($result_user) > 0) {
        echo "error_username_exists"; // Kirim respon "error_email_exists" jika email sudah terdaftar
        exit();
    }
    if (strlen($password) < 8) {
        echo "error_password_length"; // Kirim respon "error_password_length" jika panjang password kurang dari 8 karakter
        exit();
    }

    // Tambahkan logika untuk memeriksa password
    if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/", $password)) {
        echo "error_password_strength"; // Kirim respon "error_password_strength" jika password tidak memenuhi syarat
        exit();
    }

    // Lakukan penambahan data ke dalam database
    $query = "INSERT INTO user (nama_lengkap, username, password) VALUES ( '$nama_lengkap', '$username','$password')";
    if (mysqli_query($koneksi, $query)) {
        // Kirim respon "success" jika data berhasil ditambahkan
        echo "success";
    } else {
        // Kirim respon "error" jika terjadi kesalahan
        echo "error";
    }
}
