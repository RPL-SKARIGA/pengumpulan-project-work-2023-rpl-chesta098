<?php
include './koneksi/koneksi.php';
$berita = $conn->query('SELECT * FROM berita')->fetch_all();
function displayImageById($conn, $imageId)
{
  $result = $conn->query("SELECT gambar FROM berita WHERE berita_id = $imageId");
  $imageData = $result->fetch_assoc()['gambar'];
  $v = finfo_buffer(finfo_open(), $imageData, FILEINFO_MIME_TYPE);
  $base64Image = base64_encode($imageData);
  $videoSrc = "data:$v;base64,$base64Image";

  echo $videoSrc;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SOCCER NEWS</title>
  <link rel="stylesheet" href="#">
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body>
  <?php include 'header/header_news.php'; ?>
  <div class="container fade-in-element">
  <?php foreach ($berita as [$id, $judul, $isi, $kategori, $gambar, $tglBuat, $tglPerbarui, $slideId]) {
    // code...
  ?>
      <div class="blog-post">
        <a href="news.php?berita_id=<?php echo $id; ?>">
          <img src="<?php displayImageById($conn, $id); ?>" type="image/jpeg">
        </a>
        <!-- $gambar are blob -->
        <div class="post-content">
          <h2><?php echo $judul; ?></h2>
          <?php if(strlen($isi) > 500) { ?>
            <p><?php echo substr($isi, 0, 500) . "..."; ?></p>
          <?php }else{?>
              <p><?php echo $isi; ?></p>
          <?php }?>
        </div>
      </div>
      <?php } ?>
    </div>

    <!-- <div class="blog-post">
      <img src="image/neymarAcl.jpeg" alt="Gambar Artikel 2">
      <div class="post-content">
        <h2>Judul Artikel 2</h2>
        <p>Isi artikel 2...</p>
      </div>
    </div>

    <div class="blog-post">
      <img src="image/masmasTopSccore.jpg" alt="Gambar Artikel 2">
      <div class="post-content">
        <h2>Judul Artikel 3</h2>
        <p>Isi artikel 3...</p>
      </div>
    </div>
  </div> -->

</body>
<style>
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #fff;
  }

  .container {
    max-width: 2000px;
    margin: 0 auto;
    padding: 20px;
    overflow: hidden;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
  }

  .post-content {
    margin: 15px;
  }

  .post-content h2 {
    margin-bottom: 15px;
  }

  .blog-post {
    background-color: #fff;
    margin-bottom: 20px;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
  }

  .blog-post {
    width: calc(48% - 10px);
    margin-right: 20px;
  }

  .blog-post:nth-child(2n) {
    margin-right: 0;
  }

  .blog-post img{
    width: 100%;
    height: 50%;
    object-fit: cover;
    border-radius: 8px 8px 0 0;
  }

  .blog-post-big {
    width: 100%;
  }

  .fade-in-element {
    opacity: 0;
    transition: opacity 1s ease-in-out;
  }
  

  @media screen and (max-width: 600px) {

    .blog-post,
    .blog-post-big {
      width: 100%;
      margin-right: 0;
    }
  }
</style>
<script>
  $(document).ready(function() {
    $(".fade-in-element").css("opacity", "1");
  });
</script>

</html>