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
    $id = htmlspecialchars(isset($_POST['id']) && !empty($_POST['id']) && $_POST['id'] != 'auto' ? $_POST['id'] : NULL);
    $nama = htmlspecialchars(isset($_POST['nama']) ? $_POST['nama'] : '');
    $notelp = htmlspecialchars(isset($_POST['notelp']) ? $_POST['notelp'] : '');
    $tanggal = htmlspecialchars(isset($_POST['tanggal']) ? $_POST['tanggal'] : '');
    $jenis = htmlspecialchars(isset($_POST['jenis']) ? $_POST['jenis'] : '');

    $stmt = $pdo->prepare('INSERT INTO reservasi VALUES (?, ?, ?, ?, ?)');
    $stmt->execute([$id, $nama, $notelp, $tanggal, $jenis]);
    $msg = 'Created Successfully!';
}
?>

<link href="style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
<style>
    .update form select {
        padding: 10px;
        width: 400px;
        margin-right: 25px;
        margin-bottom: 15px;
        border: 1px solid #cccccc;
    }
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
	<h2>Create Reservasi</h2>
    <form action="create.php" method="post">
        <label for="id">ID</label>
        <label for="nama">Nama</label>
        <input type="text" name="id" id="id">
        <input type="text" name="nama" id="nama">
        <label for="notelp">No. Telp</label>
        <label for="tanggal">Tanggal Reservasi</label>
        <input type="text" name="notelp" id="notelp">
        <input type="date" name="tanggal" id="tanggal">
        <label for="jenis">Jenis Layanan</label>
        <label></label>
            <select name="jenis">
                <option value='Haircut' name="jenis" id="jenis">Haircut : Rp. 150.000.00</option>
                <option value='Hair Coloring' name="jenis" id="jenis">Hair coloring : Rp. 100.000.00</option>
                <option value='Treatment' name="jenis" id="jenis">Treatment : Rp. 125.000.00</option>
                <option value='Smoothing' name="jenis" id="jenis">Smoothing : Rp. 120.000.00</option>
                <option value='Curly' name="jenis" id="jenis">Curly : Rp. 100.000.00</option>
                <option value='Smoothing' name="jenis" id="jenis">Creambath : Rp. 75.000.00</option>
            </select>
        <input type="submit" value="Create">
        <a class="close" href="data_reservasi.php"><p>Close</p></a>
    </form>
    <?php if ($msg): header('Location: data_reservasi.php'); ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>