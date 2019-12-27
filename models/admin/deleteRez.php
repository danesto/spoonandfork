<?php include '../../config/connection.php';

if(isset($_GET['data'])){
	$id=$_GET['data'];
	$deleteRez="DELETE FROM rezervacija WHERE id_rezervacija=$id";
	$stmt=$conn->prepare($deleteRez);
	$stmt->execute();

}