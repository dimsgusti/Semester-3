<?php
    session_start();
    if ($_SESSION['akses']!="login"){
        echo "
        <script>
            alert('Mohon Login terlebih dahulu..');
            window.location.href='../index.php';
        </script>
        ";
    };
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com"> 
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/content.css">
    <title>Marble Hair Salon</title>
    <style>
    .navbar {
        display: flex;
        overflow: auto;
        height: 80px;
        justify-content: space-between;
        margin: 10px;
        margin-bottom: 0px;
    }

    .navbar_left img {
        width: 120%;
        height: 93%;
    }

    .navbar li {
        list-style: none;
        float: left;
        padding: 10px;
        margin: 10px;
    }

    .navbar_left {
        display: flex;
    }

    .navbar_right {
        display: flex;
        padding: 10px;
    }

    .navbar_right a{
        padding: 19px;
        size: 14px;
        text-decoration: none;
        color: black;
    }
    .navbar_right a:hover{
        color: white;
        background-color:darksalmon;
    }
    .navbar_right a.active{
        padding: 19px;
        color: white;
        background-color:darksalmon;
    }

    .navbar_right a.active-logout{
        padding: 19px;
        color: white;
        background-color:#C36849;
    }
    .navbar_right a.active-logout:hover{
        background-color:#492418;
    }
    .content {
        text-align: center;
        height: 450px;
        padding-top:50px;
        background: grey;
        background-image: url(image/background.jpeg);
    }
    .content a {
        background-color:darksalmon;
        border: none;
        color: white;
        padding: 15px 25px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        border-radius: 10px;
    }
    .content a:hover {
        background-color:#C36849;
        color:white;
    }
    .daftar-layanan{
        font-family:'Courier New', Courier, monospace;
        position: absolute;
        margin-left: 40%;
        color: darksalmon;
        font-size: 35px;
    }
    .footer {
        background-color:darksalmon;
        width: 100%;
        padding-bottom :5px;
    }
    .flex {
        display: flex;
    }

    .kategori-footer{
        font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        padding-top: 40px;
        padding-left: 80px;
        padding-bottom: 5px;
    }

    .kategori-footer h1{
        float : left;
        color: aliceblue;
        font-size:35px;
    }

    .kategori-footer a{
        float : left;
        text-decoration: none;
        color: aliceblue;
        size: 10px;
    }
    .cabang{
        font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        padding-top: 40px;
        padding-left: 250px;
        padding-bottom: 5px;
    }

    .cabang h1{
        float : right;
        color: aliceblue;
        font-size:35px;
    }

    .cabang a{
        float : left;
        text-decoration: none;
        color: aliceblue;
        size: 10px;
    }
    </style>
</head>
<body>
        <div class="navbar">
            <div class="navbar_left">
                <img src="image/logo1.png" alt="Logo Toko" width="45px">
            </div>
            <div class="navbar_right">
                <a class="active">Home</a>
                <a href="about.php">About</a>
                <a class="active-logout" href="../logout.php">Logout >|</a>
                <input type="checkbox" class="checkbox" id="checkbox">
                <label for="checkbox" class="checkbox-label">
                    <i class="fas fa-moon"></i>
                    <i class="fas fa-sun"></i>
                    <span class="ball"></span>
                </label>
            </div>
        </div>
        <div class="content">
            <h1>Marble Hair Salon</h1>
            <a class="button" id="dom1" href="booknow.php" style="color: white;">BOOK NOW</a>
        </div><br><br><br><br>
        <section class="container">
            <span class="daftar-layanan">Layanan Kami</span><br>
            <h3 class="deskripsi"></h3>
            <div class="content-layanan">
                <div class="content-1">
                    <img src="image/Untitled-1.png">
                </div>
            </div>
        </section><br><br><br><br><br><br><br><br><br><br><br><br>
        <div class="footer">
            <div class ="flex">
                <div class="kategori-footer" style="line-height: 2em;">
                    <h1>Layanan</h1><br><br><br>
                    <a href="">Haircut</a><br>
                    <a href="">Hair Coloring</a><br>
                    <a href="">Treatment</a><br>
                    <a href="">Smoothing</a><br>
                    <a href="">Curly</a><br>
                    <a href="">Creambath</a><br><br>
                </div>
                <div class="cabang" style="line-height: 2em;">
                    <h1>Cabang Salon</h1><br><br><br>
                    <a href="">Balikpapan</a><br>
                    <a href="">Samarinda</a><br>
                    <a href="">Banjarmasin</a><br>
                    <a href="">Bandung</a><br>
                    <a href="">Surabaya</a><br>
                    <a href="">Bali</a><br><br>
                </div>
                <div class="product" style="float:right; color: white;">
                    <div class="product2">
                        <h1 id="title">Opening Hours</h1>
                        <h2></h2>
                        <div class="openinghours">
                            <div class="monfri">
                                <p>Mon - Fri</p>
                                <p>10:00 AM - 09:00 PM</p>
                            </div>
                            <div class="sat">
                                <p>Sat</p>
                                <p>12:00 AM - 10:00 PM</p>
                            </div>
                            <h1 id="title"> Address</h1>
                            <p>Jl. Terbang no.1</p>
                        </div>
                    </div>
                </div>
            </div><hr />
            <p style="color:white; margin-bottom: 10px;">@Copyright 2022 - Kelompok 5 </p>
        </div>
        <script src="index.js"></script>
</body>
</html>