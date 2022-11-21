<?php
include '../functions.php';
$pdo = pdo_connect_mysql();
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
$records_per_page = 1000;



$stmt = $pdo->prepare('SELECT * FROM data_login ORDER BY id LIMIT :current_page, :record_per_page');
$stmt->bindValue(':current_page', ($page-1)*$records_per_page, PDO::PARAM_INT);
$stmt->bindValue(':record_per_page', $records_per_page, PDO::PARAM_INT);
$stmt->execute();
$contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);


$num_contacts = $pdo->query('SELECT COUNT(*) FROM data_login')->fetchColumn();

?>


<link href="style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
<div class="content read">
	<h2>DATA ACCOUNT USER</h2>
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
                <td>Username</td>
                <td>Password</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contacts as $contact): ?>
            <tr>
                <td><?=$contact['id']?></td>
                <td><?=$contact['username']?></td>
                <td><?=$contact['password']?></td>
                <td class="actions">
                    <a href="update.php?id=<?=$contact['id']?>" class="edit"><i class="fas fa-pen fa-xs"></i></a>
                    <a href="delete.php?id=<?=$contact['id']?>" class="trash"><i class="fas fa-trash fa-xs"></i></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
