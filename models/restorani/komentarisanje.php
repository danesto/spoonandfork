<?php session_start();
include_once '../../config/connection.php';

if(isset($_GET['komentar'])){

$id=$_GET['id'];
$komentar=$_GET['komentar'];
$ime=$_SESSION['korisnik']->ime;
$prezime=$_SESSION['korisnik']->prezime;


        $result = $conn->prepare("INSERT INTO komentar(komentar_id,komentar,id_restoran,ime,prezime) VALUES(NULL,:komentar,:id,:ime,:prezime)");

        $result->bindParam(":komentar", $komentar);
        $result->bindParam(":id", $id);
        $result->bindParam(":ime", $ime);
        $result->bindParam(":prezime", $prezime);
       
       

        // var_dump($result);

            

        $result->execute();

     
        // $komentari->executeQuery('SELECT * FROM komentar where komentar_id=$id');

  }