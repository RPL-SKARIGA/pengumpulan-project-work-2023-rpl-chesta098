<?php
include '../koneksi/koneksi.php';
$team = $conn->query('SELECT * FROM team')->fetch_all();
function displayImageById($conn, $imageId)
{
    $result = $conn->query("SELECT gambar_team FROM team WHERE id = $imageId");
    $imageData = $result->fetch_assoc()['gambar_team'];
    $v = finfo_buffer(finfo_open(), $imageData, FILEINFO_MIME_TYPE);
    $base64Image = base64_encode($imageData);
    $imageSrc = "data:$v;base64,$base64Image";

    echo $imageSrc;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SOCCER NEWS</title>
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
    <?php
    include "../header/header_club.php";
    ?>
    <?php foreach ($team as [$id, $nama_team, $gambar_team, $id_liga]) {
        // code...
    ?>
        <!-- <div style="width: 100px; height: 100px; background-color: red; margin: 10px;">
</div> -->
        <div style="margin: 8vh 3vw;">
            <div class="card-grid-space">
                <div class="num"></div>
                <a class="card" href="d_player.php" style="background-image: url('<?php displayImageById($conn, $id); ?>');">
                    <div>
                        <h1><?php echo $nama_team?></h1>
                        <div class="tags">
                            <div class="tag">Team</div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        </div>
    <?php } ?>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Heebo:400,700|Open+Sans:400,700');

        :root {
            --color: #000000;
            --transition-time: 0.5s;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: 'Open Sans';
            background: #fff;
        }

        a {
            color: inherit;
        }

        .cards-wrapper {
            display: grid;
            justify-content: center;
            align-items: center;
            grid-template-columns: 1fr 1fr 1fr;
            grid-gap: 4rem;
            padding: 4rem;
            margin: 0 auto;
            width: max-content;
        }

        .card {
            font-family: 'Heebo';
            --bg-filter-opacity: 0.5;
            background-image: linear-gradient(rgba(0, 0, 0, var(--bg-filter-opacity)), rgba(0, 0, 0, var(--bg-filter-opacity))), var(--bg-img);
            height: 17em;
            width: 13em;
            font-size: 1.5em;
            color: rgb(255, 255, 255);
            border-radius: 1em;
            padding: 1em;
            /*margin: 2em;*/
            display: flex;
            align-items: flex-end;
            background-size: cover;
            background-position: center;
            box-shadow: 0 0 5em -1em #000;
            transition: all, var(--transition-time);
            position: relative;
            overflow: hidden;
            border: 10px solid #000;
            text-decoration: none;
        }

        .card:hover {
            transform: rotate(0);
        }

        .card h1 {
            margin: -15;
            font-size: 1.0em;
            line-height: 1.2em;
        }

        .card p {
            font-size: 0.75em;
            font-family: 'Open Sans';
            margin-top: 0.5em;
            line-height: 2em;
        }

        .card .tags {
            display: flex;
        }

        .card .tags .tag {
            font-size: 0.75em;
            background: rgba(0, 0, 0, 0.5);
            border-radius: 0.3rem;
            padding: 0 0.5em;
            margin-right: 0.5em;
            line-height: 1.5em;
            transition: all, var(--transition-time);
        }

        .card:hover .tags .tag {
            background: var(--color);
            color: #fff;
        }

        .card .date {
            position: absolute;
            top: 0;
            right: 0;
            font-size: 0.75em;
            padding: 1em;
            line-height: 1em;
            opacity: .8;
        }

        .card:before,
        .card:after {
            content: '';
            transform: scale(0);
            transform-origin: top left;
            border-radius: 50%;
            position: absolute;
            left: -50%;
            top: -50%;
            z-index: -5;
            transition: all, var(--transition-time);
            transition-timing-function: ease-in-out;
        }

        .card:before {
            background: #fff;
            width: 250%;
            height: 250%;
        }

        .card:after {
            background: #fff;
            width: 200%;
            height: 200%;
        }

        .card:hover {
            color: var(--color);
        }

        .card:hover:before,
        .card:hover:after {
            transform: scale(1);
        }

        .card-grid-space .num {
            font-size: 3em;
            margin-bottom: 1.2rem;
            margin-left: 1rem;
        }

        .info {
            font-size: 1.2em;
            display: flex;
            padding: 1em 3em;
            height: 3em;
        }

        .info img {
            height: 3em;
            margin-right: 0.5em;
        }

        .info h1 {
            font-size: 1em;
            font-weight: normal;
        }

        /* MEDIA QUERIES */
        @media screen and (max-width: 1285px) {
            .cards-wrapper {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media screen and (max-width: 900px) {
            .cards-wrapper {
                grid-template-columns: 1fr;
            }

            .info {
                justify-content: center;
            }

            /* .card-grid-space .num {
    /margin-left: 0;
    /text-align: center;
  } */
        }

        @media screen and (max-width: 500px) {
            .cards-wrapper {
                padding: 4rem 2rem;
            }

            .card {
                max-width: calc(100vw - 4rem);
            }
        }

        @media screen and (max-width: 450px) {
            .info {
                display: block;
                text-align: center;
            }

            .info h1 {
                margin: 0;
            }
        }
    </style>
</body>