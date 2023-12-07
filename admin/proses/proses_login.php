<?php
include "../../koneksi/koneksi.php";
session_start(); // Memulai sesi

$username = $_POST['username'];
$password = $_POST['password'];

$query_sql = "SELECT * FROM admin WHERE admin_nama = '$username' AND password = '$password'";

$result = mysqli_query($conn, $query_sql);

if (mysqli_num_rows($result) > 0) {
    // Login berhasil, simpan nama pengguna ke dalam sesi
    $_SESSION['admin_nama'] = $username;
    header("Location: ../dasboard.php"); // Redirect ke halaman index.php setelah login berhasil
} else {
    // Login gagal, tampilkan pesan kesalahan
    echo "<center><h1>Password anda salah. Silahkan coba kembali</h1>
            <button><strong><a href='../login.php'>Login</a></strong></button></center>";
}


?>