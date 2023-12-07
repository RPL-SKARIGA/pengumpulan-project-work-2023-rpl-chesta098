<?php

include '../CRUD.php';
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$sql = "INSERT INTO user VALUES(0, '$nama', '$username', '$password')";
$result = mysqli_query($conn, $sql);
if ($result) {
    autologin($username, $password);
} else {
    echo 'Error: '.mysqli_error($conn);
    exit;
}
