<?php
include '../../functions.php';
if (isset($_GET['search']) ) {
    $keyword = $_GET['keyword'];
    $result = mysqli_query($conn, "SELECT * FROM data_login WHERE username LIKE '%$keyword%' OR id LIKE '%$keyword%'");
}else {
    $result = mysqli_query($conn, "SELECT * FROM data_login");
}

$data_login = [];
while ($row = mysqli_fetch_assoc($result)){
    $data_login[] = $row;
}
?>
<style>
    .search {
      width: 100%;
      position: relative;
      display: flex;
    }

    .searchTerm {
      width: 80%;
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
      top: 20%;
      left: 83%;
      transform: translate(-50%, -50%);
    }
    .close p {
        color: #FFFFFF;
        margin :9px;
        margin-left : 25px;
        margin-right : 25px;
    }
    .close {
        display: inline-block;
        text-decoration: none;
        font-weight: bold;
        font-size: 14px;
        color: #FFFFFF;
        margin-right:10px;
        background-color: darksalmon;
    }
    .close:hover {
        background-color: salmon;
    }
</style>
<link href="style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
<div class="content read">
	<h2>DATA ACCOUNT USER</h2>
	<a href="create.php" class="create-contact">Create Data</a>
    <a class="close" href="admin.php"><p>Close</p></a>
        <div class="wrap">
            <div class="search">
                <form action="" method="GET">
                    <input type="text" class="searchTerm" name="keyword" id="keyword" placeholder="Search..">
                    <button type="submit" class="searchButton" name="search">
                        <i class="fa fa-search"></i>
                    </button>
            </div>
        </div>
	<table>
        <thead>
            <tr>
                <td>ID</td>
                <td>Username</td>
                <td>Password</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data_login as $login): ?>
            <tr>
                <td><?=$login['id']?></td>
                <td><?=$login['username']?></td>
                <td><?=$login['password']?></td>
                <td class="actions">
                    <a href="update.php?id=<?=$login['id']?>" class="edit"><i class="fas fa-pen fa-xs"></i></a>
                    <a href="delete.php?id=<?=$login['id']?>" class="trash"><i class="fas fa-trash fa-xs"></i></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>