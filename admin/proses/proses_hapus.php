<?php

// include '../../koneksi/koneksi.php';
// print_r($_GET);
// exit;
$del = $_GET['delete'];
if ($del == 'liga') {
    anca('liga', 'liga');
}
if ($del == 'user') {
    anca('user', 'user');
} elseif ($del == 'transfer') {
    anca('transfer', 'transfer');
} elseif ($del == 'team') {
    $id = $_GET['id'];
    if (isset($_GET['confirm'])) {
        anca('team', 'team');
    }
    ?>

    <b><h1>jika kamu menghapus team ini maka semua player yang di dalam nya akan ikut terhapus!</b></h1>
    <a href="proses_delete.php?delete=team&id=<?php echo $id; ?>&confirm=yes"><button type="button">YES</button></a>
    <a href="../team.php"><button type="button">NO</button></a>
    
    <?php
} elseif ($del == 'player') {
    anca('player', 'player');
} elseif ($del = 'statistic') {
    anca('statistic', 'statistic');
}

function anca($db, $file)
{
    $id = $_GET['id'];
    include '../../koneksi/koneksi.php';
    $sql = "DELETE from $db WHERE id = $id";

    $result = mysqli_query($conn, $sql);
    if (!$result) {
        echo mysqli_error($conn);
    } else {
        header("Location: ../$file.php");
    }
}