<?php  session_start();
 include "../../config/connection.php";

 if(isset($_POST['login'])){
    $email=$_POST['email'];
    $sifra=md5($_POST['sifra']);

    $upit="SELECT * FROM korisnik WHERE email=:email AND sifra=:sifra";
    $stmt=$conn->prepare($upit);
    $stmt->bindParam(":email",$email);
    $stmt->bindParam(":sifra", $sifra);

    try {
        $stmt->execute();
        $korisnik=$stmt->fetch();
        var_dump($korisnik);
        $brojRedova=$stmt->rowCount();
        if($brojRedova==1){
            $_SESSION['korisnik']=$korisnik;
            
            if($_SESSION['korisnik']->uloga_id==1){
                header("Location: ../../index.php?page=admin");
            }
            else{
                // var_dump($korisnik);
                // echo "Uspesna sesija";
                header("Location: ../../index.php");
            
            }
        }
        else{
            $_SESSION['message']="Email ili sifra nisu u dobrom formatu";
            header("Location: ../../index.php?page=login");
        }

    } catch(PDOException $e){
        $_SESSION['message']="Greska na serveru";
        header('Location: index.php');
    }
 }