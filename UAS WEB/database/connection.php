<?php
    $server = "localhost";
    $user = "gusdim_pa";
    $password = "123321123321";
    $db_name = "gusdim_pa";

    $conn = mysqli_connect($server, $user, $password, $db_name);

    if( !$conn ){
        die("Gagal terhubung ke database : " . mysqli_connect_error());
    }
?>