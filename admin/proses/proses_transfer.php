<?php

include '../../koneksi/koneksi.php';
include 'alert.php';
$nama = $_POST['nama'];
$umur = $_POST['umur'];
$dari = $_POST['dari'];
$bergabung = $_POST['bergabung'];
$transfer = $_POST['transfer'];

$sql = "INSERT INTO transfer VALUES(0, '$nama', '$umur', '$dari', '$bergabung', '$transfer')";
// print_r($sql);
// exit;
$result = mysqli_query($conn, $sql);

if (!$result) {
    echo mysqli_error($conn);
} else {
    alertsuccsess('../transfer.php');
}
