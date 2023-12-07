<?php

include 'koneksi/koneksi.php';
function autologin($username, $password)
{
    header("location: ../index.php?username=$username&password=$password");
}
