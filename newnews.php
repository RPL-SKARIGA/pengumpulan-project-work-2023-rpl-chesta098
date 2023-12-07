<!-- <?php
include './koneksi/koneksi.php';
$berita = $conn->query('SELECT * FROM berita')->fetch_all();
function displayImageById($conn, $imageId)
{
    $result = $conn->query("SELECT gambar FROM berita WHERE berita_id = $imageId");
    $imageData = $result->fetch_assoc()['gambar'];

    header('Content-type: image/*');

    echo $imageData;
}

?> -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SOCCER NEWS</title>
  <link rel="stylesheet" href="#">
</head>

<body>
  <?php include 'header/header_news.php'; ?>
</body>

</html>
