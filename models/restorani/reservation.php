<?php session_start();
include_once '../../config/connection.php';

$date=$_GET['date'];
$time=$_GET['time'];
$people=$_GET['people'];
$restoran=$_GET['restoran'];
$ime=$_SESSION['korisnik']->ime;
$prezime=$_SESSION['korisnik']->prezime;
$broj=$_SESSION['korisnik']->broj_telefona;

        $result = $conn->prepare("INSERT INTO rezervacija(id_rezervacija,id_restorana,broj_ljudi,datum,vreme,ime,prezime,broj_telefona) VALUES(NULL,:restoran,:people,:datum,:vreme,:ime,:prezime,:broj)");

        $result->bindParam(":restoran", $restoran);
        $result->bindParam(":people", $people);
        $result->bindParam(":datum", $date);
        $result->bindParam(":vreme", $time);
        $result->bindParam(":ime", $ime);
        $result->bindParam(":prezime", $prezime);
        $result->bindParam(":broj", $broj);
       

        var_dump($result);

            

        $result->execute();