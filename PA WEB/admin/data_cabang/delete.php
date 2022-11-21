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
<?php
include '../functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
if (isset($_GET['kode'])) {
    $stmt = $pdo->prepare('SELECT * FROM cabang WHERE kode = ?');
    $stmt->execute([$_GET['kode']]);
    $contact = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$contact) {
        exit('Data doesn\'t exist with that KODE!');
    }
    if (isset($_GET['confirm'])) {
        if ($_GET['confirm'] == 'yes') {
            $stmt = $pdo->prepare('DELETE FROM cabang WHERE kode = ?');
            $stmt->execute([$_GET['kode']]);
            $msg = 'You have deleted the data!';
            header('Location: data_cabang.php');
        } else {
            header('Location: data_cabang.php');
            exit;
        }
    }
} else {
    exit('No KODE specified!');
}
?>

<link href="style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
<div class="content delete">
	<h2>Delete Data #<?=$contact['kode']?></h2>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php else: ?>
	<p>Apakah anda yakin ingin menghapus #<?=$contact['kode']?>?</p>
    <div class="yesno">
        <a href="delete.php?kode=<?=$contact['kode']?>&confirm=yes">Yes</a>
        <a href="delete.php?kode=<?=$contact['kode']?>&confirm=no">No</a>
    </div>
    <?php endif; ?>
</div>
