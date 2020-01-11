<?php 
include 'includes/config.php'; 
include 'includes/header.php';
checkForLogin();

if($_SESSION['playeradmin'] < 1338) {
	header('Location: index.php');
}
?>

<?php
	/*$sql = 'DELETE * FROM `ucp_logs`';
	$q = $con->query($sql);*/
	$query = $con->prepare("DELETE FROM `ucp_logs`");
    $query->execute();
    header('Location: logs.php');
    //var_dump($query);
?>

<?php
include 'includes/footer.php'; 
?>
