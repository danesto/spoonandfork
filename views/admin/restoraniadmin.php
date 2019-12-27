<?php if(isset($_SESSION['korisnik'])):?>
<script type="text/javascript" src="../../assets/js/admin.js"></script>
	<div class="container">
		<div class="row mt-5">
			<div class="col-md-4">
				<div class=" bg-w border text-center p-3">
				<img src="../../assets/img/logo.png" class="rounded-circle mw-100" width="100px">
				<p class="font-weight-bold mt-2 border-bottom pb-3"><?= $_SESSION['korisnik']->ime .' '. $_SESSION['korisnik']->prezime; ?></p>
				<p><span class="font-weight-bold float-left pl-5">e-mail: </span class=""><?= $_SESSION['korisnik']->email?></p>
					<p class="border-bottom pb-3"><span class="font-weight-bold float-left pl-5">broj telefona: </span class=""><?= $_SESSION['korisnik']->broj_telefona?></p>
						<p><button class="btn btn-primary w-75 mt-3">Edit</button></p>
			</div>
		</div>
			<div class="col-md-8 border p-2 bg-w">
				<?php $restoran=executeQuery("SELECT * FROM restoran"); ?>
				<table class="table table-striped">
					<thead>
					<tr><th>Restoran</th>
						<th>Akcija</th>
					
					</tr>
					</thead>
					<tbody>
					<?php foreach($restoran as $r):?>

					<tr><td><?= $r->naziv_restorana ?></td><td>
						
					<button class="btn btn-danger deleteRes" data-id="<?=$r->restoran_id?>" name="deleteRes"><i class="fas fa-trash-alt"></i></button></td></tr>
						
					<?php endforeach; ?>
					</tbody>
				</table>


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
						<li class="mb-4"><a href="#" class="text-dark font-weight-bold "><i class="fas fa-cog mr-4"></i>Upravljaj rezervacijama <?= $obavestenje ?></a></li>
						<li class="mb-4"><a href="index.php?page=restoraniadmin" class="text-dark font-weight-bold"><i class="fas fa-cog mr-4"></i>Upravljaj restoranima</a></li>
						<li><a href="#" class="text-dark font-weight-bold"><i class="fas fa-chart-line mr-4"></i>Analitika</a></li>
					</ul>
				</div>
			</div>
			<div class="col-md-8 bg-w p-2 border">
				<h3 class="font-weight-bold pb-3 border-bottom">Dodaj restoran: </h3>
				<form action="../../models/admin/dodavanjeRestorana.php" method="POST" enctype="multipart/form-data">
				<label class="font-weight-bold w-50">Odaberite grad: </label> 
				<select class="border p-2 w-50" name="grad"><option value="1">Beograd</option>
					<option value="3">Novi Sad</option>
				</select><br>
				<label class="font-weight-bold w-50 mt-4">Naziv Restorana: </label><br>
				<input type="text" class="border p-2 w-50" name="nazivRestorana"><br>
				<label class="font-weight-bold w-50 mt-4">Adresa Restorana: </label><br>
				<input type="text" class="border p-2 w-50" name="adresa"><br>
				<label class="font-weight-bold w-50 mt-4">Opis: </label>
				<textarea class="border p-2 w-50" name="opis"></textarea><br>
				<input type="file" name="slikeRestorana" value="Dodajte slike:"><br>
				<button type="submit" data-id="dodaj" class="btn btn-primary w-50 mt-4" name="dodajRestoran">Dodaj</button>
				</form>
			</div>
		</div>
	</div>
<?php endif;?>