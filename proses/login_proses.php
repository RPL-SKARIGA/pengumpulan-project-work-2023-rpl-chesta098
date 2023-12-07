<?php

session_start();

include '../koneksi/koneksi.php';

if (isset($_GET['username'])) {
    $username = $_GET['username'];
    $password = $_GET['password'];
} else {
    $username = $_POST['username'];
    $password = $_POST['password'];
}

$username = mysqli_real_escape_string($conn, $username);
$password = mysqli_real_escape_string($conn, $password);

$query2 = "SELECT * FROM user WHERE username='$username'";
$result2 = mysqli_query($conn, $query2);

if (mysqli_num_rows($result2) > 0) {
    $row = mysqli_fetch_assoc($result2);
    $stored_hash = $row['password'];

    if ($stored_hash == $password) {
        $_SESSION['username'] = $row['username'];
        $_SESSION['id'] = $row['id'];
        header('Location:../index.php');
    } else {
        echo "<script>alert('username or password incorect 2')
        window.location.href = '../login.php'
        </script>";
    }
    // if (password_verify($password, $stored_hash)) {
    //     $_SESSION['username'] = $row['username'];
    //     $_SESSION['id'] = $row['id'];
    //     header('Location:../index.php');
    // } else {
    //     echo "<script>alert('username or password incorect 2')
    //     window.location.href = '../login.php'
    //     </script>";
    // }
} else {
    echo "<script>alert('username or password incorect 1')
    window.location.href = '../login.php'
    </script>";
}
