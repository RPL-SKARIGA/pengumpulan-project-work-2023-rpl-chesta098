<?php 
include "../../koneksi/koneksi.php";
$id = $_GET['id'];

$sql = "DELETE from liga WHERE id = $id";
// print_r($sql);
// exit;
$result = mysqli_query($conn, $sql);
// print_r(mysqli_query($conn, $sql));
// exit;

if (!$result) {
    echo mysqli_error($conn);
} else {
    header("Location: ../liga.php");
}
?>