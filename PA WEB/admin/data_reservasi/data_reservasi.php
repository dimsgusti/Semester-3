<?php
    session_start();
    if (empty($_SESSION['akses'])){
        echo "
        <script>
            alert('Mohon Login terlebih dahulu..');
            window.location.href='../../index.php';
        </script>
        ";
    };
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin</title>
    <link rel="stylesheet" href="css/admin.css">
    <style>
    .table-data a.active{
      color: #141414;
    }

    .table-data a:hover{
      color:#2f4f4f;
    }
    .logout {
      text-decoration: none;
      color: white;
      float:right;
      margin: 10px;
      background-color: darksalmon;
      padding: 15px;
    }
    .logout:hover{
        background-color:#492418;
    }
    .navbar-logo img{
      width: 8%;
      margin-left: 15px;
      margin-top: 5px;
    }
    .search {
      width: 100%;
      position: relative;
      display: flex;
    }

    .searchTerm {
      width: 50%;
      border: 3px solid #00B4CC;
      border-right: none;
      padding: 5px;
      height: 37px;
      border-radius: 5px 0 0 5px;
      outline: none;
      color: #9DBFAF;
    }

    .searchTerm:focus{
      color: black;
    }

    .searchButton {
      width: 40px;
      height: 36px;
      border: 1px solid #00B4CC;
      background: #00B4CC;
      text-align: center;
      color: #fff;
      border-radius: 0 5px 5px 0;
      cursor: pointer;
      font-size: 20px;
    }

    .wrap{
      width: 30%;
      position: absolute;
      top: 38%;
      left: 83%;
      transform: translate(-50%, -50%);
    }
    .table-data{
        margin-left: 25px;
        margin-right: 25px;
        margin-top: 14px;
        padding: 10px;
        background-color:#de6238;
        position: sticky;
    }
    .table-data a{
        color:white;
        text-decoration: none;
        padding-top: 5px;
        margin-left: 15px;
        font-size: 120%;
        position: relative;
    } 
    </style>
  <body>
    <div class="header">
      <nav class="navbar">
          <a class="navbar-logo"><img src="./image/logo1.png" alt="logo"></a>
          <a class="logout" href="../logout.php">Logout >|</a>
      </nav>
    </div>
    <div class="content">
      <div class="database">
        <div class="table-data" align="center">
          <a href="../data_login/admin.php" >DATA LOGIN</a>
          <a class="active">DATA RESERVASI</a>
          <a href="../data_ulasan/data_ulasan.php" >DATA ULASAN</a>
          <a href="../data_cabang/data_cabang.php" >DATA CABANG SALON</a>
        </div>
      </div>
      <?php include 'read.php'; ?>
    </div>
</body>
</html>