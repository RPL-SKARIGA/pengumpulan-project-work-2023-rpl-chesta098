<?php

include '../../koneksi/koneksi.php';
include 'alert.php';

if (isset($_GET['delete'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM berita WHERE berita_id= $id";
    mysqli_query($conn, $sql);
    echo "<script>alert('iso!'); window.location.href = '../berita.php' </script>";
} else {
    $nama = $_POST['nama'];
    $pesan = $_POST['pesan'];
    $kategori = $_POST['kategori'];
    $tanggal = $_POST['tanggal'];

    $imagePath = $_FILES['foto']['tmp_name'];
    $imageData = file_get_contents($imagePath);

    $sql = "INSERT INTO berita VALUES(0, ?, ?, ?, ?, ?,'', 1)";
    $stmt = $conn->prepare($sql);

    $stmt->bind_param('ssiss', $nama, $pesan, $kategori, $imageData, $tanggal);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        alertsuccsess('../berita.php');
    } else {
        echo 'lmao error: '.$conn->error;
    }

    $stmt->close();
    $conn->close();
}
