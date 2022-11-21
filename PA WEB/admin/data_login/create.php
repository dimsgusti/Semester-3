<?php
    session_start();
    if (empty($_SESSION['akses'])){
        echo "
        <script>
            alert('Mohon Login terlebih dahulu..');
            window.location.href='index.php';
        </script>
        ";
    };
?>
<?php
include '../functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
if (!empty($_POST)) {
    $id = htmlspecialchars(isset($_POST['id']) && !empty($_POST['id']) && $_POST['id'] != 'auto' ? $_POST['id'] : NULL);
    $username = htmlspecialchars(isset($_POST['username']) ? $_POST['username'] : '');
    $password = htmlspecialchars(isset($_POST['password']) ? $_POST['password'] : '');

    $stmt = $pdo->prepare('INSERT INTO data_login VALUES (?, ?, ?)');
    $stmt->execute([$id, $username, $password]);
    $msg = 'Created Successfully!';
}
?>

<link href="style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
<style>
    .close p {
        color: #FFFFFF;
        margin :10px;
        margin-left : 53px;
    }
    .close {
        text-decoration: none;
        display: block;
        border: 0;
        font-weight: bold;
        font-size: 14px;
        color: #FFFFFF;
        cursor: pointer;
        width: 150px;
        height: 40px;
        margin-top: 15px;
        background-color: darksalmon;
    }
    .close:hover {
        background-color: salmon;
    }
</style>
<div class="content update">
	<h2>Create Contact</h2>
    <form action="create.php" method="post">
        <label for="id">ID</label>
        <label for="nama">Username</label>
        <input type="text" name="id" id="id">
        <input type="text" name="username" id="username">
        <label for="password">Password</label>
        <label></label>
        <input type="password" name="password" id="password">
        <input type="submit" value="Create">
        <a class="close" href="admin.php"><p>Close</p></a>
    </form>
    <?php if ($msg): header('Location: admin.php'); ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>