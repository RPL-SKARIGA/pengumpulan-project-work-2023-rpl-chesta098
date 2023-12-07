<?php

include '../../koneksi/koneksi.php';
include 'alert.php';
if (isset($_GET['delete'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM liga WHERE id= $id";
    mysqli_query($conn, $sql);
    echo "<script>alert('iso!'); window.location.href = '../berita.php' </script>";
} else {
    // code...
    $nama = $_POST['nama'];

    $imagePath = $_FILES['foto']['tmp_name'];
    $imageData = file_get_contents($imagePath);

    $sql = 'INSERT INTO liga VALUES(0, ?, ?)';
    $stmt = $conn->prepare($sql);

    $stmt->bind_param('ss', $nama, $imageData);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        alertsuccsess('../liga.php');
    } else {
        echo 'lmao error: '.$conn->error;
    }
}
$stmt->close();
$conn->close();
