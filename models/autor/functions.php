<?php include_once "config/connection.php";
function author_info(){
	return $author=executeQuery("SELECT * FROM autor");
}

