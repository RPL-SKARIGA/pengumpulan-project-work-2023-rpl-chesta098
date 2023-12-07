<?php
include '../koneksi/koneksi.php';
$data = $conn->query('SELECT * FROM player')->fetch_all();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contoh Formulir</title>
</head>

<body>

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

    <form action="./proses/proses_player.php" method="post" enctype="multipart/form-data">
    <!-- Input Text -->
    <label for="nama">Nama Player</label>
    <input type="text" id="nama" name="nama" required>
    <br>

    <label for="nama">No Punggung</label>
    <input type="number" id="nama" name="nomor_punggung" required min="1" max="99">
    <br>

    <label >Role</label>
    <select name="role" required>
        <option value="GOALSKEEPERS">GOALSKEEPERS</option>
        <option value="DEFENDERS">DEFENDERS</option>
        <option value="MIDFIELDERS">MIDFIELDERS</option>
        <option value="FORWARDS">FORWARDS</option>
    </select>
    <br>

    <label >Team</label>
    <select name="team" required>
        <?php
        include '../koneksi/koneksi.php';
$liga = $conn->prepare('SELECT * FROM team');

$liga->execute();
$result = $liga->get_result();

foreach ($result as $row) {
    ?>
        <option value="<?php echo $row['id']; ?>"><?php echo $row['nama_team']; ?></option>
        <?php
}
?>
    </select>
    <br>

    <!-- Unggah Foto -->
    <label for="foto">Unggah Foto:</label>
    <input type="file" id="foto" name="foto" accept="image/*">
    <br>

    <!-- Tombol Submit -->
    <input type="submit" value="Kirim">
    <table id="dataTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ID Team</th>
                    <th>Name Player</th>
                    <th>No Punggung</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <?php foreach ($data as [$id, $nama, $nomer_punggung, $role, $gambar]) { ?>
            <tbody>
                <tr>
                    <td><?php echo $id; ?></td>
                    <td><?php echo $nama; ?></td>
                    <td><?php echo $nomer_punggung; ?></td>
                    <td><?php echo $role; ?></td>
                    <td><?php echo "<img src='data:image/jpeg;base64,".base64_encode($gambar)."' style='max-width: 50px; max-height: 50px;'>"; ?></td>
                    <td>
                        <button class="edit-btn">Edit</button>
                        <a href="./proses/proses_delete.php?id=<?php echo $id; ?>&delete=player">
                        <button class="delete-btn" type="button">Delete</button>
                        </a>
                    </td>
                </tr>
            </tbody>
            <?php }?>
        </table>
</body>
<style>
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
        margin-bottom: 30px;
    }

    nav a {
        float: left;
        display: block;
        color: #000;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
    }

    nav a:hover {
        background-color: #ddd;
        color: black;
    }

    @media screen and (max-width: 600px) {
        nav a {
            float: none;
            width: 100%;
        }
    }
</style>
    <style>
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }   

        select {
            font-size: 15px; /* Sesuaikan ukuran sesuai kebutuhan */
        }

        input[type="file"] {
            margin-top: 6px;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    th, td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: left;
    }

    th {
      background-color: #f2f2f2;
    }

    .edit-btn, .delete-btn {
      cursor: pointer;
      background-color: #4CAF50;
      color: white;
      border: none;
      padding: 5px 10px;
      margin: 2px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 12px;
    }

    .delete-btn {
      background-color: #f44336;
    }
    </style>
</html>