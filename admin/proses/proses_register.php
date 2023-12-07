<?php
require "koneksi.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

// $user_id = $_POST['user_id'];
$nama_user = $_POST['nama_user'];
$username = $_POST['username'];
$password = $_POST['password'];

$query_sql = "INSERT INTO user (nama_user, username, password) VALUES ('$nama_user','$username','$password')";

if (mysqli_query($conn, $query_sql)) {
    // Pendaftaran berhasil, set session untuk username
    session_start();
    $_SESSION['username'] = $username;
    header("Location: ../index.php");
    exit;
} else {
    echo "Pendaftaran Gagal: " . mysqli_error($conn);
}
?>
