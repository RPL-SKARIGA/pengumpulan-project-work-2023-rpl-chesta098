<?php

include '../../koneksi/koneksi.php';
include 'alert.php';

$nama = $_POST['nama'];
$team = $_POST['team'];

$imagePath = $_FILES['foto']['tmp_name'];
$imageData = file_get_contents($imagePath);

$sql = 'INSERT INTO team VALUES(0, ?, ?, ?)';
$stmt = $conn->prepare($sql);

$stmt->bind_param('ssi', $nama, $imageData, $team);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    alertsuccsess('../team.php');
} else {
    echo 'lmao error: '.$conn->error;
}

$stmt->close();
$conn->close();
