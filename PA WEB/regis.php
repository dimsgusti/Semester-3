<?php
require 'functions.php';
if (isset($_POST['register'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];
    if($password === $cpassword){
        $result = mysqli_query($conn, "SELECT username from data_login WHERE username='$username'");
        if (mysqli_fetch_assoc($result)){
            echo"
            <script>
                alert('Username telah digunakan!');
                document.location.href='index.php';
            </script>
            ";
        }
        else{
        $sql = "INSERT INTO data_login VALUES('', '$username', '$password')";
        $result = mysqli_query($conn,$sql);
            if (mysqli_affected_rows($conn) > 0){
                echo "
                <script>
                    alert('Registrasi Telah Berhasil');
                    document.location.href = 'index.php';
                </script>
                ";
            }else {
                echo "
                <script>
                    alert('Registrasi Gagal');
                    document.location.href = 'index.php';
                </script>
                ";
            }
        }
    }
    else{
        echo "
        <script>
            alert('Konfirmasi Password Anda Tidak Sesuai!');
            document.location.href='index.php';
        </script>
        ";
    }
}

