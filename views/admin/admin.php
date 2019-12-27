<?php
if(isset($_SESSION['korisnik'])){
        if($_SESSION['korisnik']->uloga_id != 1){
            header("Location: index.php");
        }
    }
    else {
        $_SESSION['message'] ="Niste ulogovani!";
        header("Location: index.php");
    }
    
?>
	<script type="text/javascript" src="../../assets/js/reservation.js"></script>
	<div class="container">
		<div class="row mt-5">
			<div class="col-md-4">
				<div class=" bg-w border text-center p-3">
				<img src="../../assets/img/logo.png" class="rounded-circle mw-100" width="100px">
				<p class="font-weight-bold mt-2 border-bottom pb-3"><?= $_SESSION['korisnik']->ime .' '. $_SESSION['korisnik']->prezime; ?></p>
				<p><span class="font-weight-bold float-left pl-5">e-mail: </span class=""><?= $_SESSION['korisnik']->email?></p>
					<p class="border-bottom pb-3"><span class="font-weight-bold float-left pl-5">broj telefona: </span class=""><?= $_SESSION['korisnik']->broj_telefona?></p>
						<p><a href="index.php?page=userupdate" class="btn btn-primary w-75 mt-3">Edit</a></p>
			</div>
		</div>
			<div class="col-md-8 border p-2 bg-w">
				<?php $rezervacije=executeQuery("SELECT * FROM rezervacija INNER JOIN restoran on rezervacija.id_restorana=restoran.restoran_id"); ?>
				<table class="table table-striped">
					<thead>
					<tr><th>Restoran</th>
						<th>Rezervisao</th>
						<th>Broj telefona</th>
						<th>Broj ljudi</th>
						<th>Datum</th>
					
					</tr>
					</thead>
					<tbody>
					<?php foreach($rezervacije as $rezervacija):?>

					<tr><td><?= $rezervacija->naziv_restorana ?></td>
						<td><?= $rezervacija->ime .' '. $rezervacija->prezime ?></td>
						<td><?= $rezervacija->broj_telefona ?></td>
						<td><?= $rezervacija->broj_ljudi ?></td>
						<td><?= $rezervacija->datum ?> <button class="btn btn-danger ml-3 deleteRez" data-id="<?=$rezervacija->id_rezervacija?>" name="deleteRez"><i class="fas fa-trash-alt"></i></button></td></tr>
						
					<?php endforeach; ?>
					</tbody>
				</table>
				<a href="../models/admin/rezervacije/excel_export.php">Prezumi Excel fajl rezervacija</a>

			</div>
		</div>

	</div>
	<div class="container mt-5">
		   <?php   
   
            $notifications = executeQuery("SELECT COUNT(*) as obavestenje FROM rezervacija");
            foreach($notifications as $o):
           
                $obavestenje='<span class="ml-1 badge badge-pill badge-danger">'.$o->obavestenje.'</span>';
           
            ?>
                            
                            <?php endforeach; ?>
		<div class="row">
			<div class="col-md-4">
				<div class="bg-w border p-3">
					<ul class="list-style-none">

						<li class="mb-4"><a href="index.php?page=admin" class="text-dark font-weight-bold "><i class="fas fa-cog mr-4"></i>Upravljaj rezervacijama <?= $obavestenje ?></a></li>
						<li class="mb-4"><a href="index.php?page=restoraniadmin" class="text-dark font-weight-bold"><i class="fas fa-cog mr-4"></i>Upravljaj restoranima</a></li>
						<li><a href="../../models/admin/greske.txt" download class="text-dark font-weight-bold"><i class="fas fa-chart-line mr-4"></i>Preuzmite izvestaj o greskama</a></li>
					</ul>
				</div>
			</div>
			<div class="col-md-8 bg-w border p-2">
				<h3>Posete stranicama</h3>
				<table class="table table-striped">
					<tr><td class="font-weight-bold">Stranica i datum</td>
						<td class="font-weight-bold">Vreme i ip adresa racunara</td></tr>
				<?php $file='data/log.txt';
						$lines=file($file);

						
					foreach ($lines as $line):
						 ?>
<?php $line=explode(' ', $line); ?>
							
						 	<tr><td><?php print_r($line[0])?></td>
						 		<td><?php print_r($line[1])?></td>
						 	</tr>
							 <?php endforeach; ?>
							</table>
			</div>

		</div>
	</div>
