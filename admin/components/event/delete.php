<?php
$dbc= mysqli_connect("localhost","root","vijai1234@", "enigma")  
        or die("Unable to select database"); 

session_start();

if (!(isset($_SESSION['Aname']))) {
	echo "Unauthorized Access";
	return;
}

$id = $_GET['id'];
$DelSql = "DELETE FROM `events` WHERE eid=$id";
$res = mysqli_query($dbc, $DelSql);
if($res){
	header('location: ../../events.php');
}else{
	echo "Failed to delete";
}
?>