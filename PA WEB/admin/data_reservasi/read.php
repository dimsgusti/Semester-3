<?php
include '../functions.php';
$pdo = pdo_connect_mysql();
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
$records_per_page = 1000;



$stmt = $pdo->prepare('SELECT * FROM reservasi ORDER BY id LIMIT :current_page, :record_per_page');
$stmt->bindValue(':current_page', ($page-1)*$records_per_page, PDO::PARAM_INT);
$stmt->bindValue(':record_per_page', $records_per_page, PDO::PARAM_INT);
$stmt->execute();
$contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);


$num_contacts = $pdo->query('SELECT COUNT(*) FROM reservasi')->fetchColumn();
?>

<link href="style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
<div class="content read">
	<h2>DATA RESERVASI USER</h2>
	<a href="create.php" class="create-contact">Create Data</a>
    <form action="search.php" method="GET">
        <div class="wrap">
            <div class="search">
                    <input type="text" class="searchTerm" name="keyword" id="keyword" placeholder="Search..">
                    <button type="submit" class="searchButton" name="search">
                        <i class="fa fa-search"></i>
                    </button>
            </div>
        </div>
    </form>
	<table>
        <thead>
            <tr>
                <td>ID</td>
                <td>Nama</td>
                <td>No. Telp</td>
                <td>Tanggal Reservasi</td>
                <td>Jenis Layanan</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contacts as $contact): ?>
            <tr>
                <td><?=$contact['id']?></td>
                <td><?=$contact['nama']?></td>
                <td><?=$contact['notelp']?></td>
                <td><?=$contact['tanggal']?></td>
                <td><?=$contact['jenis']?></td>
                <td class="actions">
                    <a href="update.php?id=<?=$contact['id']?>" class="edit"><i class="fas fa-pen fa-xs"></i></a>
                    <a href="delete.php?id=<?=$contact['id']?>" class="trash"><i class="fas fa-trash fa-xs"></i></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
	<div class="pagination">
		<?php if ($page > 1): ?>
		<a href="read.php?page=<?=$page-1?>"><i class="fas fa-angle-double-left fa-sm"></i></a>
		<?php endif; ?>
		<?php if ($page*$records_per_page < $num_contacts): ?>
		<a href="read.php?page=<?=$page+1?>"><i class="fas fa-angle-double-right fa-sm"></i></a>
		<?php endif; ?>
	</div>
</div>
