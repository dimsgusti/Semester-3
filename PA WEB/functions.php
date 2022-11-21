<?php
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'root';
    $DATABASE_PASS = '';
    $DATABASE_NAME = 'marble_hair';
    
    $conn = mysqli_connect($DATABASE_HOST,$DATABASE_USER,$DATABASE_PASS,$DATABASE_NAME);

    if (!$conn){
        die("Gagal Terhubung ke Database". mysqli_connect_error());
    }
?>