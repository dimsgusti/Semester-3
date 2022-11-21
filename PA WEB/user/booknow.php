<?php
    session_start();
    if ($_SESSION['akses']!="login"){
        echo "
        <script>
            alert('Mohon Login terlebih dahulu..');
            window.location.href='../index.php';
        </script>
        ";
    };
?>
<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
if (!empty($_POST)) {
    $id = htmlspecialchars(isset($_POST['id']) && !empty($_POST['id']) && $_POST['id'] != 'auto' ? $_POST['id'] : NULL);
    $nama = htmlspecialchars(isset($_POST['nama']) ? $_POST['nama'] : '');
    $notelp = htmlspecialchars(isset($_POST['notelp']) ? $_POST['notelp'] : '');
    $tanggal = htmlspecialchars(isset($_POST['tanggal']) ? $_POST['tanggal'] : '');
    $jenis = htmlspecialchars(isset($_POST['jenis']) ? $_POST['jenis'] : '');
    $gambar = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];
    $gambarbaru = date('dmYHis').$gambar;
    $path = "file/".$gambarbaru;

    if(move_uploaded_file($tmp, $path)){
        $sql = $pdo->prepare('INSERT INTO reservasi (id, nama, notelp, tanggal, jenis, gambar) VALUES (:id,:nama,:notelp,:tanggal,:jenis,:gambar)');
        $sql->bindParam(':id', $id);
        $sql->bindParam(':nama', $nama);
        $sql->bindParam(':notelp', $notelp);
        $sql->bindParam(':tanggal', $tanggal);
        $sql->bindParam(':jenis', $jenis);
        $sql->bindParam(':gambar', $gambarbaru);
        $sql->execute();
        if($sql){ 
            header("location: index.php");
        }else{
            echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
            echo "<br><a href='booknow.php'>Kembali Ke Form</a>";
        }
    }else{
    echo "Maaf, Gambar gagal untuk diupload.";
    echo "<br><a href='booknow.php'>Kembali Ke Form</a>";
    }


    // $stmt = $pdo->prepare('INSERT INTO reservasi (id, nama, notelp, tanggal, jenis, gambar) VALUES (?, ?, ?, ?, ?, '$gambar_baru')');
    // $stmt->execute([$id, $nama, $notelp, $tanggal, $jenis, $gambar_baru]);
    // $msg = 'Created Successfully!';
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
    .update form input[type="submit"] {
        background-color: #38b673;
    }
    .update form input[type="submit"]:hover {
        background-color: #32a367;
    }
    .qris {
        width: 30%;
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
	<h2>Reservasi</h2>
    <form action="booknow.php" method="post" enctype="multipart/form-data">
        <label for="nama">Nama</label>
        <label for="notelp">No. Telp</label>
        <input type="text" name="nama" id="nama">
        <input type="text" name="notelp" id="notelp">
        <label for="tanggal">Tanggal Reservasi</label>
        <label for="jenis">Jenis Layanan</label><br>
        <input type="date" name="tanggal" id="tanggal">
            <select name="jenis">
                <option value='Haircut' name="jenis" id="jenis">Haircut : Rp. 150.000.00</option>
                <option value='Hair Coloring' name="jenis" id="jenis">Hair coloring : Rp. 100.000.00</option>
                <option value='Treatment' name="jenis" id="jenis">Treatment : Rp. 125.000.00</option>
                <option value='Smoothing' name="jenis" id="jenis">Smoothing : Rp. 120.000.00</option>
                <option value='Curly' name="jenis" id="jenis">Curly : Rp. 100.000.00</option>
                <option value='Smoothing' name="jenis" id="jenis">Creambath : Rp. 75.000.00</option>
            </select>
        <label for="qris">Scan Now For Transaction</label><br>
        <label></label>
        <img class="qris" src=image/qris.png>
        <label></label>
        <label for="upload">Upload File</label><br>
        <label></label>
        <input type="file" name="gambar" id="gambar">
        <label></label>
        <input type="submit" value="Create">
        <a class="close" href="index.php"><p>Close</p></a>
    </form>
    <?php if ($msg): header('Location: index.php'); ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>