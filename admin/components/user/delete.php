<?php
$dbc = mysqli_connect("localhost", "root", "vijai@123", "enigma")
	or die("Unable to select database");

session_start();

if (!(isset($_SESSION['Aname']))) {
	echo "Unauthorized Access";
	return;
}

$id = $_GET['id'];
$DelSql = "DELETE FROM `users` WHERE uid=$id";
$res = mysqli_query($dbc, $DelSql);
if ($res) {
	header('location: ../../user.php');
} else {
	echo "Failed to delete";
}
?>