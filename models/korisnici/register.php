<?php include "../../config/connection.php";



    $ime=$_POST['ime'];
    $prezime=$_POST['prezime'];
    $email=$_POST['email'];
    $sifra=$_POST['sifra'];
    $brojTelefona=$_POST['brojTelefona'];

    $errors=[];
    $reIme= "/^[A-Z][a-z]{2,15}$/";

    if(!preg_match($reIme,$ime)){
        array_push($errors, "Prvo slovo imena mora biti veliko");
    }

    if(!preg_match($reIme,$prezime)){
        array_push($errors, "Prvo slovo prezimena mora biti veliko");
    }



    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($errors, "Email nije u dobrom formatu");
    }

    if(count($errors)){
        echo "<ul class='alert alert-danger mx-auto col-md-5 mt-5'>";
        foreach ($errors as $error){
            echo "<li>".$error."</li>";
        }
       
        echo "</ul>";
    }

    else {
        $upit = "INSERT INTO korisnik(korisnik_id,email,sifra,broj_telefona,prezime,uloga_id,ime) VALUES (NULL,:email,:sifra,:brojTelefona,:prezime,2,:ime)";
        $md5sifra = md5($sifra);
        $stmt = $conn->prepare($upit);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":sifra", $md5sifra);
        $stmt->bindParam(":brojTelefona", $brojTelefona);
        $stmt->bindParam(":prezime", $prezime);
        $stmt->bindParam(":ime", $ime);
       
       
        
        



        $stmt->execute();
        echo "<div class='col-md-6 mx-auto p-0'>
            <div class='alert alert-primary show'>Uspesno ste se registrovali! <a href='index.php?page=login'>Ulogujte se ovde.</a></div>
        </div>";
    }

