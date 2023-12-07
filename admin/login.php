<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>Document</title>
</head>

<body>

    <!-- <?php
    include 'header/header_login.php';
    ?> -->

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <div class="login-reg-panel">
        <div class="register-info-box">
            <h2>Admin Login</h2>
            <p>Soccer News</p>
        </div>

        <div class="white-panel">
            <div class="login-show">
                <form action="./proses/proses_login.php" method="POST">
                    <h2>LOGIN</h2>
                    <input type="text" placeholder="Username" id="username" name="username" required>
                    <input type="password" placeholder="Password" id="password" name="password" required>
                    <input type="submit" value="Login">
            </div>
            </form>

            <div class="register-show">
                <h2>REGISTER</h2>
                <form action="./proses/register_proses.php" method="post">
                    <!-- <input type="text" placeholder="ID" id="user_id" name="user_id"> -->
                    <input type="text" placeholder="Name" id="nama_user" name="nama">
                    <input type="text" placeholder="Username" name="username" id="username">
                    <input type="password" placeholder="Password" id="password" name="password">
                    <input type="submit" value="Register">
            </div>
            </form>
        </div>
    </div>
</body>
<style>
    @import url('https://fonts.googleapis.com/css?family=Mukta');

    body {
        /* background-color: #323232; */
        font-family: 'Mukta', sans-serif;
        height: 100vh;
        min-height: 550px;
        /* background-image: url(http://www.planwallpaper.com/static/images/Free-Wallpaper-Nature-Scenes.jpg); */
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        position: relative;
        overflow-y: hidden;
    }

    html {
        background-color: #fff;
    }

    a {
        text-decoration: none;
        color: #000;
    }

    .login-reg-panel {
        position: relative;
        top: 50%;
        transform: translateY(-50%);
        text-align: center;
        width: 70%;
        right: 0;
        left: 0;
        margin: auto;
        height: 400px;
        background-color: #0D7377;
    }

    .white-panel {
        background-color: #14FFEC;
        height: 500px;
        position: absolute;
        top: -50px;
        width: 50%;
        right: calc(50% - 50px);
        transition: .3s ease-in-out;
        z-index: 0;
        box-shadow: 0 0 15px 9px #00000096;
    }

    .login-reg-panel input[type="radio"] {
        position: relative;
        display: none;
    }

    .login-reg-panel {
        color: #000000;
    }

    .login-reg-panel #label-login,
    .login-reg-panel #label-register {
        border: 1px solid #000000;
        padding: 5px 5px;
        width: 150px;
        display: block;
        text-align: center;
        border-radius: 10px;
        cursor: pointer;
        font-weight: 600;
        font-size: 18px;
    }

    .login-info-box {
        width: 30%;
        padding: 0 50px;
        top: 20%;
        left: 0;
        position: absolute;
        text-align: left;
    }

    .register-info-box {
        width: 30%;
        padding: 0 50px;
        top: 20%;
        right: 0;
        position: absolute;
        text-align: left;

    }

    .right-log {
        right: 50px !important;
    }

    .login-show,
    .register-show {
        z-index: 1;
        display: none;
        opacity: 0;
        transition: 0.3s ease-in-out;
        color: #000000;
        text-align: left;
        padding: 50px;
    }

    .show-log-panel {
        display: block;
        opacity: 0.9;
    }

    .login-show input[type="text"],
    .login-show input[type="password"] {
        width: 100%;
        display: block;
        margin: 20px 0;
        padding: 15px;
        border: 1px solid #000000;
        outline: none;
    }

    .login-show input[type="submit"] {
        max-width: 150px;
        width: 100%;
        background: #000000;
        color: #ffffff;
        border: none;
        padding: 10px;
        text-transform: uppercase;
        border-radius: 2px;
        float: right;
        cursor: pointer;
    }

    .login-show a {
        display: inline-block;
        padding: 10px 0;
    }

    .register-show input[type="text"],
    .register-show input[type="password"] {
        width: 100%;
        display: block;
        margin: 20px 0;
        padding: 15px;
        border: 1px solid #000000;
        outline: none;
    }

    .register-show input[type="submit"] {
        max-width: 150px;
        width: 100%;
        background: #000000;
        color: #ffffff;
        border: none;
        padding: 10px;
        text-transform: uppercase;
        border-radius: 2px;
        float: right;
        cursor: pointer;
    }

    .credit {
        position: absolute;
        bottom: 10px;
        left: 10px;
        color: #000000;
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        text-transform: uppercase;
        font-size: 12px;
        font-weight: bold;
        letter-spacing: 1px;
        z-index: 99;
    }

    a {
        text-decoration: none;
        color: #000000;
    }
</style>
<script>
    $(document).ready(function() {
        $('.login-info-box').fadeOut();
        $('.login-show').addClass('show-log-panel');
    });


    $('.login-reg-panel input[type="radio"]').on('change', function() {
        if ($('#log-login-show').is(':checked')) {
            $('.register-info-box').fadeOut();
            $('.login-info-box').fadeIn();

            $('.white-panel').addClass('right-log');
            $('.register-show').addClass('show-log-panel');
            $('.login-show').removeClass('show-log-panel');

        } else if ($('#log-reg-show').is(':checked')) {
            $('.register-info-box').fadeIn();
            $('.login-info-box').fadeOut();

            $('.white-panel').removeClass('right-log');

            $('.login-show').addClass('show-log-panel');
            $('.register-show').removeClass('show-log-panel');
        }
    });
</script>

</html>