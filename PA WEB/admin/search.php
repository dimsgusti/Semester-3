<?php 
$conn = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( isset($_GET['search']) ) {
    $keyword = $_GET['keyword'];
    $result = mysqli_query($conn, "SELECT * FROM data_login WHERE username LIKE '%$keyword%'");
}else {
    $result = mysqli_query($conn, "SELECT * FROM data_login");
}

$search = [];
while ($row = mysqli_fetch_assoc($result)) {
    $search[] = $row;
}
?>