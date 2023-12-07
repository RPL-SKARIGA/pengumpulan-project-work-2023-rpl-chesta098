<?php
include '../koneksi/koneksi.php';
include "../header/header_club.php";
if(isset($_GET['team_id'])){
    $team = $conn->prepare('SELECT * FROM player WHERE id_team = '.$_GET['team_id']);
}else{
    $team = $conn->prepare('SELECT * FROM player');
}

$team->execute();
$result3 = $team->get_result();
function displayImageById($conn, $imageId)
{
    $result = $conn->query("SELECT gambar FROM player WHERE id = $imageId");
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
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
    <h3>FORWARDS</h3>
    <div class="hr"></div>
    <div style="margin: 4vh 3vw; display: flex; flex-wrap: wrap; justify-content: center;">
        <!-- <div class="card-grid-space"> -->
            <!-- <div class="num"></div> -->
            <?php 
            foreach($result3 as $row){
                if($row['role'] == 'FORWARDS'){
            ?>
            <a href="../statis.php?player_id=<?=$row['id']?>" class="card">
                <img src="<?php displayImageById($conn, $row['id']); ?>" alt="">
                <div class="content">
                    <h1><?=$row['nama']?></h1>
                    <div class="tags">
                        <p class="tag"><?=$row['nomer_punggung']?></p>
                    </div>
                </div>
            </a>
            <?php 
                }
            } ?>
        <!-- </div> -->
    </div>
    <h3>MIDFIELDERS</h3>
    <div class="hr"></div>
    <div style="margin: 4vh 3vw; display: flex; flex-wrap: wrap; justify-content: center;">
        <!-- <div class="card-grid-space"> -->
            <!-- <div class="num"></div> -->
            <?php 
            foreach($result3 as $row){
                if($row['role'] == 'MIDFIELDERS'){
            ?>
            <a href="../statis.php?player_id=<?=$row['id']?>" class="card">
                <img src="<?php displayImageById($conn, $row['id']); ?>" alt="">
                <div class="content">
                    <h1><?=$row['nama']?></h1>
                    <div class="tags">
                        <p class="tag"><?=$row['nomer_punggung']?></p>
                    </div>
                </div>
            </a>
            <?php 
                }
            } ?>
        <!-- </div> -->
    </div>
    <h3>DEFENDERS</h3>
    <div class="hr"></div>
    <div style="margin: 4vh 3vw; display: flex; flex-wrap: wrap; justify-content: center;">
        <!-- <div class="card-grid-space"> -->
            <!-- <div class="num"></div> -->
            <?php 
            foreach($result3 as $row){
                if($row['role'] == 'DEFENDERS'){
            ?>
            <a href="../statis.php?player_id=<?=$row['id']?>" class="card">
                <img src="<?php displayImageById($conn, $row['id']); ?>" alt="">
                <div class="content">
                    <h1><?=$row['nama']?></h1>
                    <div class="tags">
                        <p class="tag"><?=$row['nomer_punggung']?></p>
                    </div>
                </div>
            </a>
            <?php 
                }
            } ?>
        <!-- </div> -->
    </div>
    <h3>GOALSKEEPERS</h3>
    <div class="hr"></div>
    <div style="margin: 4vh 3vw; display: flex; flex-wrap: wrap; justify-content: center;">
        <!-- <div class="card-grid-space"> -->
            <!-- <div class="num"></div> -->
            <?php 
            foreach($result3 as $row){
                if($row['role'] == 'GOALSKEEPERS'){
            ?>
            <a href="../statis.php?player_id=<?=$row['id']?>" class="card">
                <img src="<?php displayImageById($conn, $row['id']); ?>" alt="">
                <div class="content">
                    <h1><?=$row['nama']?></h1>
                    <div class="tags">
                        <p class="tag"><?=$row['nomer_punggung']?></p>
                    </div>
                </div>
            </a>
            <?php 
                }
            } ?>
        <!-- </div> -->
    </div>
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
            text-align: center;
            font-family: 'Heebo';
            --bg-filter-opacity: 0.5;
            background-image: linear-gradient(rgba(0, 0, 0, var(--bg-filter-opacity)), rgba(0, 0, 0, var(--bg-filter-opacity))), var(--bg-img);
            height: 17em;
            width: 13em;
            font-size: 1.5em;
            color: rgb(255, 255, 255);
            border-radius: 1em;
            /* padding: 1em; */
            margin: 2em;
            display: flex;
            align-items: flex-end;
            background-size: cover;
            background-position: center;
            box-shadow: 0 0 5em -1em #000;
            transition: all, var(--transition-time);
            position: relative;
            overflow: hidden;
            border: 5px solid #000;
            text-decoration: none;
        }

        /* .card:hover {
            transform: rotate(0);
        } */

        .card img {
            position: absolute;
            object-fit: cover;
            width: 100%;
            height: 100%;
            z-index: -1;
        }

        .card .content {
            padding: 1em;
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
            text-align: center;
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
            height: 17.5em;
            width: 13.5em;
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
    <style>
        h3 {
            margin-top: 30px;
            margin-left: 30px;
            text-align: center;
            letter-spacing: 10px;
            color: #000;
            font-size: 30px;
        }

        .hr {
            border: 0;
            border-top: 5px solid #000;
            margin: 10px 85px;
            border-radius: 1em;
        }

        /* Responsive Styles */
        @media only screen and (max-width: 600px) {
            h3 {
                font-size: 18px;
            }
        }
    </style>
</body>