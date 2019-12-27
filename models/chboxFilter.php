<?php 

header("Content-Type: application/json");

if(isset($_GET['Chbox'])){
	$Chbox=$_GET['Chbox'];

	include_once "../config/connection.php";

	$query=executeQuery("SELECT * FROM grad WHERE grad_id=$Chbox");
	 echo json_encode($query);

}