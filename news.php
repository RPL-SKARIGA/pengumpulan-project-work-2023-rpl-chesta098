<?php 
session_start();
// print_r($_SESSION);
// exit;
if(isset($_SESSION['username'])){
    $usern = $_SESSION['username'];
}else {
    $usern = "kosong";
}
echo "<input type='hidden' id='username' value='".$usern."'/>"
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail</title>
</head>
<?php
include './koneksi/koneksi.php';
if(isset($_GET['berita_id'])){
    $berita = $conn->query('SELECT * FROM berita WHERE berita_id='.$_GET['berita_id'])->fetch_all();
}else{
    header('Location: index.php');
}
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
<body>
<?php 
include "header/header_news.php";
?>
<?php foreach ($berita as [$id, $judul, $isi, $kategori, $gambar, $tglBuat, $tglPerbarui, $slideId]) {
      // code...
      ?>

    <a href="#?berita_id=<?php echo $id; ?>">
    <img src="<?php displayImageById($conn, $id); ?>" type="image/jpeg" alt="Gambar Artikel <?php echo $id; ?>">
    </a>
    <h1><?php echo $judul; ?></h1>

    <p class="isi"><?php echo $isi?></p>

    <div class="tanggal">
        <p><?php echo "Tanggal Publikasi:  $tglBuat"?></p>
    </div>

    <div class="komentar">
        <h3>Kolom Komentar:</h3>

        <div class="user-profile">
            <!-- <label for="username">Username:</label>
            <input type="text" id="username" placeholder="Masukkan username Anda"> -->
        </div>
        <textarea placeholder="Tulis komentar Anda di sini..." rows="4"></textarea><br>
        <button onclick="submitComment()">Kirim Komentar</button>
    </div>

    <div class="comments-list" id="comments">
        <!-- Tempat untuk menampilkan komentar -->
    </div>
    <?php } ?>

    <script>
        function submitComment() {
            var username = document.getElementById('username').value;
            if(username == "kosong"){
                alert("Mohon login terlebih dahulu")
                exit;
            }
            var commentText = document.querySelector('textarea').value;

            // Menambahkan komentar pengguna dan formulir balasan admin ke daftar komentar
            var commentsDiv = document.getElementById('comments');
            var commentGroup = document.createElement('div');
            commentGroup.classList.add('comment-group');

            var commentElement = document.createElement('div');
            commentElement.classList.add('comment');
            commentElement.innerHTML = `
                <div class="user-profile">
                    <img src="link_profile_image" alt="Profil Pengguna">
                    <span class="username">${username}</span>
                </div>
                <p>${commentText}</p>
            `;
            commentGroup.appendChild(commentElement);

            var adminReplyForm = document.createElement('div');
            adminReplyForm.classList.add('admin-reply-form');
            adminReplyForm.innerHTML = `
                <textarea id="adminReply${commentsDiv.childElementCount}" placeholder="Balas komentar ini..."></textarea>
                <button onclick="submitAdminReply(${commentsDiv.childElementCount})">Balas</button>
            `;
            commentGroup.appendChild(adminReplyForm);

            commentsDiv.appendChild(commentGroup);

            // Mengosongkan input dan textarea setelah komentar dikirim
            document.getElementById('username').value = '';
            document.querySelector('textarea').value = '';
        }

        function submitAdminReply(commentIndex) {
            var adminReplyText = document.getElementById(`adminReply${commentIndex}`).value;
            var commentsDiv = document.getElementById('comments');

            // Menambahkan balasan admin ke daftar komentar
            var adminReplyElement = document.createElement('div');
            adminReplyElement.classList.add('admin-reply');
            adminReplyElement.innerHTML = `
                <div class="user-profile">
                    <img src="link_admin_image" alt="Profil Admin">
                    <span class="username">Admin</span>
                </div>
                <p>${adminReplyText}</p>
            `;
            commentsDiv.insertBefore(adminReplyElement, commentsDiv.childNodes[commentIndex * 2 + 2]); // Menyisipkan setelah komentar pengguna

            // Mengosongkan textarea balasan admin setelah dikirim
            document.getElementById(`adminReply${commentIndex}`).value = '';
        }
    </script>
</body>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: justify;
        }

        h1{
            margin-top: 40px;
            margin-bottom: 25px;
            text-align: center;
            font-size: 3em;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); 
        }

        p {
            margin: 0 50px;
        }

        img {
            width: 100%;
            max-height: 600px;
            object-fit: cover;
        }

        .tanggal {
            font-style: italic;
            margin-top: 10px;
        }

        .komentar {
            margin-top: 20px;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 5px;
        }

        .komentar h3 {
            border-bottom: 2px solid #ddd;
            padding-bottom: 10px;
            margin-bottom: 15px;
        }

        textarea,
        input {
            width: calc(100% - 20px);
            margin-top: 10px;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: vertical;
        }

        button {
            margin-top: 10px;
            padding: 10px 15px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        .comments-list {
            margin-top: 20px;
        }

        .comment-group {
            display: flex;
            flex-direction: column;
            margin-bottom: 10px;
        }

        .comment {
            padding: 10px;
            border-radius: 5px;
        }

        .comment .user-profile {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .comment .user-profile img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .comment .user-profile .username {
            font-weight: bold;
        }

        .admin-reply {
            background-color: #d3f5e9;
            padding: 10px;
            border-radius: 5px;
            margin-top: 10px;
        }

        .admin-reply-form {
            margin-top: 10px;
        }

        /* Responsif: Tambahkan aturan media query untuk lebar layar tertentu */
        @media screen and (max-width: 600px) {
            img {
                max-height: 300px;
            }

            textarea,
            input {
                width: 100%;
            }
        }
    </style>
</html>