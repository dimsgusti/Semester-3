<?php 
    session_start();
    include 'functions.php';
    $username = $_POST['username'];
    $password = $_POST['password'];

    $data = mysqli_query($conn, "SELECT * FROM data_login WHERE username='$username' and password='$password'");
    $cek = mysqli_num_rows($data);
    if($cek > 0){
        $_SESSION['username'] = $username;
        $_SESSION['akses'] = "login";
        header("location:user/index.php");
    }
    else if($username == 'admin' AND $password == '123'){
        $_SESSION['akses']=$username;
        header("location:admin/data_login/admin.php");
    }
    else{
        echo "<script>
            alert('Username / Password Salah');
            window.location.href='index.php';
        </script>
        ";
    }
?>

