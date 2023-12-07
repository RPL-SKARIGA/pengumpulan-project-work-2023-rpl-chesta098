<?php 
session_start();
if(!isset($_SESSION['admin_nama'])){
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

    <!-- <header>
    <h1>Admin Panel</h1>
  </header> -->

    <nav>
        <a href="dasboard.php">Dashboard</a>
        <a href="user.php">User</a>
        <a href="berita.php">berita</a>
        <a href="transfer.php">Transfer</a>
        <a href="team.php">Team</a>
        <a href="liga.php">Liga</a>
        <a href="player.php">Player</a>
        <a href="statistic.php">Statistic</a>
        <!-- nambah nde kene ajg -->
    </nav>

    <section>
        <div class="box">
            <h3>Box 1</h3>
            <p><a href="#">USER</a></p>
        </div>

        <div class="box">
            <h3>Box 2</h3>
            <p><a href="berita.php">BERITA</a></p>
        </div>

        <div class="box">
            <h3>Box 3</h3>
            <p><a href="./transfer.php">TRANSFER</a></p>
        </div>

        <div class="box">
            <h3>Box 3</h3>
            <p><a href="./team.php">TEAM</a></p>
        </div>

        <div class="box">
            <h3>Box 3</h3>
            <p><a href="./player.php">PLAYER</a></p>
        </div>

        <div class="box">
            <h3>Box 3</h3>
            <p><a href="#">STATISTIC</a></p>
        </div>
    </section>

</body>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
    }

    header {
        background-color: #fff;
        color: #fff;
        padding: 15px;
        text-align: center;
    }

    nav {
        background-color: #fff;
        overflow: hidden;
        box-shadow: 2px 2px 9px rgba(0, 0, 0, 0.5);
    }

    nav a {
        float: left;
        display: block;
        color: #000 ;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
    }

    nav a:hover {
        background-color: #ddd;
        color: black;
    }

    section {
        display: flex;
      flex-wrap: wrap;
      justify-content: center; /* Membuat kotak sejajar ke kanan */
      padding: 20px;
    }

    .box {
        background-color: #fff;
        border: 1px solid #ddd;
        padding: 20px;
        margin: 10px;
        text-align: center;
        display: inline-block;
        width: 280px;
        /* Sesuaikan lebar kotak sesuai kebutuhan Anda */
          box-shadow: 2px 2px 9px rgba(0, 0, 0, 0.2);
    }

    @media screen and (max-width: 600px) {
        nav a {
            float: none;
            width: 100%;
        }

        section {
            flex-direction: column;
            /* Stack kotak di bawah satu sama lain pada layar kecil */
        }

        .box {
            width: 100%;
        }
    }
</style>

</html>