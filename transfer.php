<?php
include './koneksi/koneksi.php';
$tf = $conn->query('SELECT * FROM transfer')->fetch_all();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel Transfer</title>
</head>
<?php
include 'header/header.php';
?>
<body>

    <h2>Rumour Transfer Pemain</h2>

    <table>
        <!-- tablhead -->
        <tr>
            <th>pemain</th>
            <th>umur</th>
            <th>dari</th>
            <th>bergabung</th>
            <th>Status</th>
        </tr>
        <!-- /tablehead -->
        <?php foreach ($tf as [$pemain, $age, $dari, $bergabung, $pinjaman]) {?>
        <tr>
            <td><?php echo $pemain; ?></td>
            <td><?php echo $age; ?></td>
            <td><?php echo $dari; ?></td>
            <td><?php echo $bergabung; ?></td>
            <td><?php echo $pinjaman; ?></td>
        </tr>
        <?php } ?>
    </table>

</body>
<style>
        body {
            font-family: Arial, sans-serif;
        }
        h2 {
            margin-top: 40px;
            text-align: center;
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

        /* Style untuk membuat tabel responsif */
        @media only screen and (max-width: 600px) {
            table {
                border: 1px solid #ccc;
            }

            th, td {
                width: 100%;
                display: block;
            }

            th, td {
                text-align: center;
            }
        }
    </style>
</html>
