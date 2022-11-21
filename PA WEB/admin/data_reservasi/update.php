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
if (isset($_GET['id'])) {
    if (!empty($_POST)) {
        $id = isset($_POST['id']) ? $_POST['id'] : NULL;
        $nama = isset($_POST['nama']) ? $_POST['nama'] : '';
        $notelp = isset($_POST['notelp']) ? $_POST['notelp'] : '';
        $tanggal = isset($_POST['tanggal']) ? $_POST['tanggal'] : '';
        $jenis = isset($_POST['jenis']) ? $_POST['jenis'] : '';
        
        $stmt = $pdo->prepare('UPDATE reservasi SET id = ?, nama = ?, notelp = ?, tanggal = ?, jenis = ? WHERE id = ?');
        $stmt->execute([$id, $nama, $notelp, $tanggal, $jenis, $_GET['id']]);
        $msg = 'Updated Successfully!';
    }
    $stmt = $pdo->prepare('SELECT * FROM reservasi WHERE id = ?');
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
	<h2>Update Reservasi #<?=$contact['id']?></h2>
    <form action="update.php?id=<?=$contact['id']?>" method="post">
        <label for="id" align="right">ID</label>
        <label for="nama">Nama</label>
        <input type="text" name="id" readonly value="<?=$contact['id']?>" id="id">
        <input type="text" name="nama" value="<?=$contact['nama']?>" id="nama">
        <label for="notelp">No. Telp</label>
        <label for="tanggal">Tanggal</label>
        <input type="text" name="notelp" value="<?=$contact['notelp']?>" id="notelp">
        <input type="date" name="tanggal" value="<?=$contact['tanggal']?>" id="tanggal">
        <label for="jenis">Jenis Layanan</label>
        <label></label>
        <input type="text" name="jenis" value="<?=$contact['jenis']?>" id="jenis">
        <input type="submit" value="Update">
        <a class="close" href="data_reservasi.php"><p>Close</p></a>
    </form>
    <?php if ($msg):  header('Location: data_reservasi.php'); ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>
