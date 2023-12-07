<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
include './koneksi/koneksi.php';
include "./header/header.php";
if(isset($_GET['player_id'])){
    $statistic = $conn->prepare('SELECT * FROM statistic WHERE player_id = '.$_GET['player_id']);
    
}else{
    $statistic = $conn->prepare('SELECT * FROM statistic');
    $team = $conn->prepare('SELECT * FROM player');
}

$statistic->execute();

$result3 = $statistic->get_result();

function displayImageById($conn, $image)
{
    $result = $conn->query("SELECT image FROM statistic WHERE id = $image");
    $imageData = $result->fetch_assoc()['image'];
    $v = finfo_buffer(finfo_open(), $imageData, FILEINFO_MIME_TYPE);
    $base64Image = base64_encode($imageData);
    $videoSrc = "data:$v;base64,$base64Image";

    echo $videoSrc;
}
function playerImageById($conn, $image)
{
    $result = $conn->query("SELECT gambar FROM player WHERE id = $image");
    $imageData = $result->fetch_assoc()['gambar'];
    $v = finfo_buffer(finfo_open(), $imageData, FILEINFO_MIME_TYPE);
    $base64Image = base64_encode($imageData);
    $videoSrc = "data:$v;base64,$base64Image";

    echo $videoSrc;
}
?>
<body>
  <?php foreach ($result3 as $p) {
?>
    <article>
        <?php 
        $team = $conn->prepare('SELECT * FROM player WHERE id = '.$p['player_id']);
        $team->execute();
        $result2 = $team->get_result();
        foreach ($result2 as $t) { 
            if($t['id'] == $p['player_id']){
        ?>
        <img src="<?php playerImageById($conn, $t['id']); ?>" alt="Deskripsi Gambar">
        <p><?php echo $t['nama']?></p>
        <?php 
            }
        } 
        ?>
        <h1><?php echo $p['deskripsi']; ?></</h1>
    </article>

    <div class="ag-format-container">
        <div class="ag-courses_box">
            <div class="ag-courses_item">
                <a class="ag-courses-item_link">
                    <div class="ag-courses-item_bg"></div>
                    <div class="ag-courses-item_title">
                        Role
                    </div>
                    <div class="ag-courses-item_date-box">
                        <span class="ag-courses-item_date">
                        <?php echo $p['role']; ?>
                        </span>
                    </div>
                </a>
            </div>
            <div class="ag-courses_item">
                <a class="ag-courses-item_link">
                    <div class="ag-courses-item_bg"></div>

                    <div class="ag-courses-item_title">
                        Negara
                    </div>

                    <div class="ag-courses-item_date-box">
                        <span class="ag-courses-item_date">
                        <?php echo $p['negara']; ?>
                        </span>
                    </div>
                </a>
            </div>

            <div class="ag-courses_item">
                <a class="ag-courses-item_link">
                    <div class="ag-courses-item_bg"></div>

                    <div class="ag-courses-item_title">
                        Lahir
                    </div>

                    <div class="ag-courses-item_date-box">
                        <span class="ag-courses-item_date">
                        <?php echo $p['lahir']; ?>
                        </span>
                    </div>
                </a>
            </div>

            <div class="ag-courses_item">
                <a class="ag-courses-item_link">
                    <div class="ag-courses-item_bg"></div>

                    <div class="ag-courses-item_title">
                        Save
                    </div>

                    <div class="ag-courses-item_date-box">
                        <span class="ag-courses-item_date">
                        <?php echo $p['save']; ?>
                        </span>
                    </div>
                </a>
            </div>

            <div class="ag-courses_item">
                <a class="ag-courses-item_link">
                    <div class="ag-courses-item_bg"></div>

                    <div class="ag-courses-item_title">
                        Clean
                    </div>

                    <div class="ag-courses-item_date-box">
                        <span class="ag-courses-item_date">
                        <?php echo $p['clean']; ?>
                        </span>
                    </div>
                </a>
            </div>

            <div class="ag-courses_item">
                <a class="ag-courses-item_link">
                    <div class="ag-courses-item_bg"></div>

                    <div class="ag-courses-item_title">
                        Conceded
                    </div>

                    <div class="ag-courses-item_date-box">
                        <span class="ag-courses-item_date">
                        <?php echo $p['conceded']; ?>
                        </span>
                    </div>
                </a>
            </div>

            <div class="ag-courses_item">
                <a class="ag-courses-item_link">
                    <div class="ag-courses-item_bg"></div>

                    <div class="ag-courses-item_title">
                        Cathes
                    </div>

                    <div class="ag-courses-item_date-box">
                        <span class="ag-courses-item_date">
                        <?php echo $p['cathes']; ?>
                        </span>
                    </div>
                </a>
            </div>

            <div class="ag-courses_item">
                <a class="ag-courses-item_link">
                    <div class="ag-courses-item_bg"></div>

                    <div class="ag-courses-item_title">
                        Punches
                    </div>

                    <div class="ag-courses-item_date-box">
                        <span class="ag-courses-item_date">
                        <?php echo $p['punches']; ?>
                        </span>
                    </div>
                </a>
            </div>

            <div class="ag-courses_item">
                <a class="ag-courses-item_link">
                    <div class="ag-courses-item_bg"></div>

                    <div class="ag-courses-item_title">
                        Distribution
                    </div>

                    <div class="ag-courses-item_date-box">
                        <span class="ag-courses-item_date">
                        <?php echo $p['distribution']; ?>
                        </span>
                    </div>
                </a>
            </div>

            <div class="ag-courses_item">
                <a class="ag-courses-item_link">
                    <div class="ag-courses-item_bg"></div>

                    <div class="ag-courses-item_title">
                        Goal
                    </div>

                    <div class="ag-courses-item_date-box">
                        <span class="ag-courses-item_date">
                        <?php echo $p['goal']; ?>
                        </span>
                    </div>
                </a>
            </div>

            <div class="ag-courses_item">
                <a class="ag-courses-item_link">
                    <div class="ag-courses-item_bg"></div>

                    <div class="ag-courses-item_title">
                        Yellow card
                    </div>

                    <div class="ag-courses-item_date-box">
                        <span class="ag-courses-item_date">
                        <?php echo $p['yelow']; ?>
                        </span>
                    </div>
                </a>
            </div>

            <div class="ag-courses_item">
                <a class="ag-courses-item_link">
                    <div class="ag-courses-item_bg"></div>

                    <div class="ag-courses-item_title">
                        Red card
                    </div>

                    <div class="ag-courses-item_date-box">
                        <span class="ag-courses-item_date">
                        <?php echo $p['red']; ?>
                        </span>
                    </div>
                </a>
            </div>

            <div class="ag-courses_item">
                <a class="ag-courses-item_link">
                    <div class="ag-courses-item_bg"></div>

                    <div class="ag-courses-item_title">
                        Asist Goal
                    </div>

                    <div class="ag-courses-item_date-box">
                        <span class="ag-courses-item_date">
                        <?php echo $p['asis']; ?>
                        </span>
                    </div>
                </a>
            </div>
    
        </div>
    </div>
    <?php
  }
    ?>
</body>
<style>
    .ag-format-container {
        width: 1142px;
        margin: 0 auto;
    }


    body {
        background-color: #fff;
    }

    .ag-courses_box {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: start;
        -ms-flex-align: start;
        align-items: flex-start;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        padding: 50px 0;
    }

    .ag-courses_item {
        -ms-flex-preferred-size: calc(33.33333% - 30px);
        flex-basis: calc(33.33333% - 30px);

        margin: 0 15px 30px;

        overflow: hidden;

        border-radius: 28px;
    }

    .ag-courses-item_link {
        display: block;
        padding: 30px 20px;
        background-color: #121212;

        overflow: hidden;

        position: relative;
    }

    .ag-courses-item_link:hover,
    .ag-courses-item_link:hover .ag-courses-item_date {
        text-decoration: none;
        color: #FFF;
    }

    .ag-courses-item_link:hover .ag-courses-item_bg {
        -webkit-transform: scale(10);
        -ms-transform: scale(10);
        transform: scale(10);
    }

    .ag-courses-item_title {
        min-height: 87px;
        margin: 0 0 25px;

        overflow: hidden;

        font-weight: bold;
        font-size: 30px;
        color: #FFF;

        z-index: 2;
        position: relative;
    }

    .ag-courses-item_date-box {
        font-size: 18px;
        color: #FFF;

        z-index: 2;
        position: relative;
    }

    .ag-courses-item_date {
        font-weight: bold;
        color: #f9b234;

        -webkit-transition: color .5s ease;
        -o-transition: color .5s ease;
        transition: color .5s ease
    }

    .ag-courses-item_bg {
        height: 128px;
        width: 128px;
        background-color: #14FFEC;

        z-index: 1;
        position: absolute;
        top: -75px;
        right: -75px;

        border-radius: 50%;

        -webkit-transition: all .5s ease;
        -o-transition: all .5s ease;
        transition: all .5s ease;
    }

    .ag-courses_item:nth-child(2n) .ag-courses-item_bg {
        background-color: #14FFEC;
    }

    .ag-courses_item:nth-child(3n) .ag-courses-item_bg {
        background-color: #14FFEC;
    }

    .ag-courses_item:nth-child(4n) .ag-courses-item_bg {
        background-color: #14FFEC;
    }

    .ag-courses_item:nth-child(5n) .ag-courses-item_bg {
        background-color: #14FFEC;
    }

    .ag-courses_item:nth-child(6n) .ag-courses-item_bg {
        background-color: #14FFEC;
    }



    @media only screen and (max-width: 979px) {
        .ag-courses_item {
            -ms-flex-preferred-size: calc(50% - 30px);
            flex-basis: calc(50% - 30px);
        }

        .ag-courses-item_title {
            font-size: 24px;
        }
    }

    @media only screen and (max-width: 767px) {
        .ag-format-container {
            width: 96%;
        }

    }

    @media only screen and (max-width: 639px) {
        .ag-courses_item {
            -ms-flex-preferred-size: 100%;
            flex-basis: 100%;
        }

        .ag-courses-item_title {
            min-height: 72px;
            line-height: 1;

            font-size: 24px;
        }

        .ag-courses-item_link {
            padding: 22px 40px;
        }

        .ag-courses-item_date-box {
            font-size: 16px;
        }
    }
</style>
<style>
    body {
        font-family: 'Arial', sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
    }

    article {
        max-width: 800px;
        margin: 20px auto;
        background-color: #121212;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
        border-radius: 8px;
    }

    h1 {
        color: #fff;
    }

    img {
        max-width: 100%;
        height: auto;
        border-radius: 8px;
        margin-top: 10px;
    }

    p {
        color: #fff;
        line-height: 1.6;
    }

    @media (max-width: 600px) {
        article {
            margin: 10px;
            padding: 15px;
        }
    }
</style>

</html>