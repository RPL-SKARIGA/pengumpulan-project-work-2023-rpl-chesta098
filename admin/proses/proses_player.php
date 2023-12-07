<?php

include '../../koneksi/koneksi.php';
include 'alert.php';
$nama = $_POST['nama'];
$nomorPunggung = $_POST['nomor_punggung'];
$role = $_POST['role'];
$idTeam = $_POST['team'];

$imagePath = $_FILES['foto']['tmp_name'];
$imageData = file_get_contents($imagePath);

$sql = 'INSERT INTO player VALUES(0, ?, ?, ?, ?, ?)';
$stmt = $conn->prepare($sql);

$stmt->bind_param('issss', $idTeam, $nama, $nomorPunggung, $imageData, $role);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    alertsuccsess("../player.php");
} else {
    echo 'mboh: '.$conn->error;
}

$stmt->close();
$conn->close();