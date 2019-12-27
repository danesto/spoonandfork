<?php session_start();
include '../../config/connection.php';
$id=$_SESSION['korisnik']->korisnik_id;
$email=$_POST['email'];
$sifra=$_POST['sifra'];
$prezime=$_POST['prezime'];
$ime=$_POST['ime'];
$uloga=$_POST['uloga'];
$broj_telefona=$_POST['broj_telefona'];

$update="UPDATE korisnik SET email=:email, sifra=:sifra, broj_telefona=:broj_telefona, prezime=:prezime, uloga_id=:uloga, ime=:ime WHERE korisnik_id=$id";

$stmt=$conn->prepare($update);
// $stmt->bindParam(":id",$id);
$stmt->bindParam(":email",$email);
$stmt->bindParam(":sifra",$sifra);
$stmt->bindParam(":broj_telefona",$broj_telefona);
$stmt->bindParam(":prezime",$prezime);
$stmt->bindParam(":uloga",$uloga);
$stmt->bindParam(":ime",$ime);

$stmt->execute();