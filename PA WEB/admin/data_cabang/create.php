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
if (!empty($_POST)) {
    $kode = htmlspecialchars(isset($_POST['kode']) && !empty($_POST['kode']) && $_POST['kode'] != 'auto' ? $_POST['kode'] : NULL);
    $kota = htmlspecialchars(isset($_POST['kota']) ? $_POST['kota'] : '');
    $alamat = htmlspecialchars(isset($_POST['alamat']) ? $_POST['alamat'] : '');
    $notelp = htmlspecialchars(isset($_POST['notelp']) ? $_POST['notelp'] : '');

    $stmt = $pdo->prepare('INSERT INTO cabang VALUES (?, ?, ?, ?)');
    $stmt->execute([$kode, $kota, $alamat, $notelp]);
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
	<h2>Create Data Cabang</h2>
    <form action="create.php" method="post">
        <label for="kode">Kode</label>
        <label for="kota">Kota</label>
        <input type="text" name="kode" id="kode">
        <input type="text" name="kota" id="kota">
        <label for="alamat">Alamat</label>
        <label for="notelp">No. Telp</label>
        <input type="text" name="alamat" id="alamat">
        <input type="text" name="notelp" id="notelp">
        <input type="submit" value="Create">
        <a class="close" href="data_cabang.php"><p>Close</p></a>
    </form>
    <?php if ($msg): header('Location: data_cabang.php'); ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>