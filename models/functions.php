<?php include_once "config/connection.php";
function dohvati_gradove(){
	return $select=executeQuery("SELECT * FROM grad");
}