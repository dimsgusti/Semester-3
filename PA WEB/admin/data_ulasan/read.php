<?php
include '../functions.php';
$pdo = pdo_connect_mysql();
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
$records_per_page = 1000;



$stmt = $pdo->prepare('SELECT * FROM rating ORDER BY rating LIMIT :current_page, :record_per_page');
$stmt->bindValue(':current_page', ($page-1)*$records_per_page, PDO::PARAM_INT);
$stmt->bindValue(':record_per_page', $records_per_page, PDO::PARAM_INT);
$stmt->execute();
$contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);


$num_contacts = $pdo->query('SELECT COUNT(*) FROM rating')->fetchColumn();
?>

<link href="style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
<div class="content read">
	<h2>DATA ULASAN & RATING</h2><br>
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
                <td>Ulasan</td>
                <td>Rating</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contacts as $contact): ?>
            <tr>
                <td><?=$contact['ulasan']?></td>
                <td><?=$contact['rating']?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
