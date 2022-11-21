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
if (isset($_GET['id'])) {
    if (!empty($_POST)) {
        $id = isset($_POST['id']) ? $_POST['id'] : NULL;
        $username = isset($_POST['username']) ? $_POST['username'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';
        
        $stmt = $pdo->prepare('UPDATE data_login SET id = ?, username = ?, password = ? WHERE id = ?');
        $stmt->execute([$id, $username, $password, $_GET['id']]);
        $msg = 'Updated Successfully!';
    }
    $stmt = $pdo->prepare('SELECT * FROM data_login WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $contact = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$contact) {
        exit('Data doesn\'t exist with that ID!');
    }
}   else {
        exit('No ID specified!');
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
	<h2>Update Data #<?=$contact['id']?></h2>
    <form action="update.php?id=<?=$contact['id']?>" method="post">
        <label for="id" align="right">ID</label>
        <label for="username">Username</label>
        <input type="text" name="id" readonly value="<?=$contact['id']?>" id="id">
        <input type="text" name="username" value="<?=$contact['username']?>" id="username">
        <label for="password">Password</label>
        <label></label>
        <input type="password" name="password" value="<?=$contact['password']?>" id="password">
        <input type="submit" value="Update">
        <a class="close" href="admin.php"><p>Close</p></a>
    </form>
    <?php if ($msg):  header('Location: admin.php'); ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>
