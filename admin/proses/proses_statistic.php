<?php

include '../../koneksi/koneksi.php';
include 'alert.php';
$player_id = $_POST['player_id'];
$role = $_POST['role'];
$deskripsi = $_POST['deskripsi'];
$negara = $_POST['negara'];
$lahir = $_POST['lahir'];
$save = $_POST['save'];
$clean = $_POST['clean'];
$conceded = $_POST['conceded'];
$cathes = $_POST['cathes'];
$punches = $_POST['punches'];
$distribution = $_POST['distribution'];
$goal = $_POST['goal'];
$yelow = $_POST['yelow'];
$red = $_POST['red'];
$asis = $_POST['asis'];

$imagePath = $_FILES['foto']['tmp_name'];
$imageData = file_get_contents($imagePath);

$sql = 'INSERT INTO statistic VALUES(0, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
$stmt = $conn->prepare($sql);

$stmt->bind_param('isssiiiiiiiiiiss', $player_id, $role, $negara, $lahir, $save, $clean, $conceded, $cathes, $punches, $distribution, $goal, $yelow, $red, $asis, $deskripsi, $imageData);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    alertsuccsess("../statistic.php");
} else {
    echo 'mboh: '.$conn->error;
}

$stmt->close();
$conn->close();