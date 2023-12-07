<?php

include '../../koneksi/koneksi.php';
$nama = $_POST['user_id'];
$nama_user = $_POST['nama_user'];
$username = $_POST['username'];
$password = $_POST['password'];

$result = mysqli_query($conn, "INSERT INTO user VALUES(0,'$nama', '$nama_user', '$username', '$password')");

if (!$result) {
    echo 'Rungkat';
}
echo 'alhamdulillah';
