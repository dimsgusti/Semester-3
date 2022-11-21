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
    $stmt = $pdo->prepare('SELECT * FROM data_login WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $contact = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$contact) {
        exit('Data doesn\'t exist with that ID!');
    }
    if (isset($_GET['confirm'])) {
        if ($_GET['confirm'] == 'yes') {
            $stmt = $pdo->prepare('DELETE FROM data_login WHERE id = ?');
            $stmt->execute([$_GET['id']]);
            $msg = 'You have deleted the data!';
            header('Location: admin.php');
        } else {
            header('Location: admin.php');
            exit;
        }
    }
} else {
    exit('No ID specified!');
}
?>

<link href="style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
<div class="content delete">
	<h2>Delete Data #<?=$contact['id']?></h2>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php else: ?>
	<p>Apakah anda yakin ingin menghapus #<?=$contact['id']?>?</p>
    <div class="yesno">
        <a href="delete.php?id=<?=$contact['id']?>&confirm=yes">Yes</a>
        <a href="delete.php?id=<?=$contact['id']?>&confirm=no">No</a>
    </div>
    <?php endif; ?>
</div>
