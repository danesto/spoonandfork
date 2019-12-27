<?php

header("Content-Type: application/json");

if($_SERVER['REQUEST_METHOD'] == "GET"){
    require "../../config/connection.php";
    try {
       $id=$_GET['id'];
		$komentari=executeQuery("SELECT * FROM komentar where id_restoran=$id");
        echo json_encode($komentari);
    } catch(PDOException $ex){
        echo json_encode(['message'=> $ex->getMessage()]);
        http_response_code(500);
    }
    
} else {
    http_response_code(400);
}

