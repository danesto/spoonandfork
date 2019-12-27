<?php include '../../config/connection.php';

if(isset($_GET['data'])){

	$id=$_GET['data'];
	$deleteRes="DELETE FROM restoran WHERE restoran_id=$id";
	$stmt=$conn->prepare($deleteRes);
	$stmt->execute();

}