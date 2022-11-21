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
    if (!empty($_POST)) {
        $kode = isset($_POST['kode']) ? $_POST['kode'] : NULL;
        $kota = isset($_POST['kota']) ? $_POST['kota'] : '';
        $alamat = isset($_POST['alamat']) ? $_POST['alamat'] : '';
        $notelp = isset($_POST['notelp']) ? $_POST['notelp'] : '';
        
        $stmt = $pdo->prepare('UPDATE cabang SET kode = ?, kota = ?, alamat = ?, notelp = ? WHERE kode = ?');
        $stmt->execute([$kode, $kota, $alamat, $notelp, $_GET['kode']]);
        $msg = 'Updated Successfully!';
    }
    $stmt = $pdo->prepare('SELECT * FROM cabang WHERE kode = ?');
    $stmt->execute([$_GET['kode']]);
    $contact = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$contact) {
        exit('Data doesn\'t exist with that KODE!');
    }
}   else {
        exit('No KODE specified!');
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
	<h2>Update Data #<?=$contact['kode']?></h2>
    <form action="update.php?kode=<?=$contact['kode']?>" method="post">
        <label for="kode">KODE</label>
        <label for="kota">Kota</label>
        <input type="text" name="kode" readonly value="<?=$contact['kode']?>" id="kode">
        <input type="text" name="kota" value="<?=$contact['kota']?>" id="kota">
        <label for="alamat">Alamat</label>
        <label for="notelp">No. Telp</label>
        <input type="text" name="alamat" value="<?=$contact['alamat']?>" id="alamat">
        <input type="text" name="notelp" value="<?=$contact['notelp']?>" id="notelp">
        <input type="submit" value="Update">
        <a class="close" href="data_cabang.php"><p>Close</p></a>
    </form>
    <?php if ($msg):  header('Location: data_cabang.php'); ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>
