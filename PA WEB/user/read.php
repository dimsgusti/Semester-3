<?php
include '../admin/functions.php';
$pdo = pdo_connect_mysql();
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
$records_per_page = 1000;



$stmt = $pdo->prepare('SELECT * FROM cabang ORDER BY kode LIMIT :current_page, :record_per_page');
$stmt->bindValue(':current_page', ($page-1)*$records_per_page, PDO::PARAM_INT);
$stmt->bindValue(':record_per_page', $records_per_page, PDO::PARAM_INT);
$stmt->execute();
$contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);


$num_contacts = $pdo->query('SELECT COUNT(*) FROM cabang')->fetchColumn();
?>

<link href="style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
<div class="content read">
	<h2>DATA CABANG MARBLE HAIR SALON</h2>
	<table>
        <thead>
            <tr>
                <td>Kota</td>
                <td>Alamat</td>
                <td>No. Telp</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contacts as $contact): ?>
            <tr>
                <td><?=$contact['kota']?></td>
                <td><?=$contact['alamat']?></td>
                <td><?=$contact['notelp']?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
