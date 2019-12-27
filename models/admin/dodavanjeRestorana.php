<?php include "../../config/connection.php";
if(isset($_POST['dodajRestoran'])){
    $datum=date("Y/m/d");
    $time = date('H:i:s', time());
    $greske=[];
	$grad=$_POST['grad'];
	$restoranNaziv=$_POST['nazivRestorana'];
	$opis=$_POST['opis'];
    $adresa=$_POST['adresa'];
    $image=$_FILES['slikeRestorana'];
    $fileType=$image['type'];
        
    if(!empty($grad) && !empty($restoranNaziv) && !empty($opis) && !empty($adresa) && !empty($fileType)){

          
        
$upit1="INSERT INTO restoran(restoran_id,naziv_restorana,opis,adresa) VALUES(NULL, :naziv, :opis,:adresa)";
    $stmt=$conn->prepare($upit1);
    $stmt->bindParam(':naziv',$restoranNaziv);
    $stmt->bindParam(':opis',$opis);
    $stmt->bindParam(':adresa',$adresa);
    // $stmt->bindParam(':naziv',$restoranNaziv);
    $stmt->execute();
        

  

    

    $upit2=executeQuery("SELECT * FROM restoran ORDER BY restoran_id DESC limit 1");
    foreach ($upit2 as $upit) {
        $id_r=$upit->restoran_id;           
    }

    $upit3="INSERT INTO grad_restoran(id_gr,g_id,r_id) VALUES(NULL, :grad, :id_r)";
    $stmt=$conn->prepare($upit3);
    $stmt->bindParam(':grad',$grad);
    $stmt->bindParam(':id_r',$id_r);
    $stmt->execute();


            $target = '../img/restorani/' . basename($_FILES['slikeRestorana']['name']);
            $image = $_FILES['slikeRestorana']['name'];

            $query = "INSERT INTO img(img_id,restoran_id,grad_id,slika) VALUES (NULL,:restoran_id,:grad_id,:slika)";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':restoran_id', $id_r);
            $stmt->bindParam(':grad_id', $grad);
            $stmt->bindParam(':slika', $image);

            $stmt->execute();

            move_uploaded_file($_FILES['slikeRestorana']['tmp_name'], $target);

           header("Location: Refresh:0; url=index.php?page=restoraniadmin.php");
           var_dump('Usepeh!');
    
      
    }

    else{
          array_push($greske,"$datum, $time - Sva polja moraju biti popunjena! Ili format slike nije dobar!\n");
            $txt_fajl="greske.txt";
            foreach ($greske as $greska){
                 $upis = fopen($txt_fajl, 'ab');
                fwrite ($upis, $greska);
                fclose ($upis);
            }

            echo '<h1 class="alert alert-danger">Doslo je do greske! Proverite fajl o greskama za vise informacija!'. "<a href='greske.txt' class='alert alert-primary' download>Fajl sa greskama</a></h1>" ;
    
}
}