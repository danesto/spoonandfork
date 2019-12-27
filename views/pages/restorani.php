    <script src="../assets/js/filtriranje.js"></script>
    <script src="../assets/js/pretraga.js"></script>
    <script src="../assets/js/sortiranje.js"></script>
<body class="bg-light">
	<div class="container-fluid p-0"><div class="row">
			<div class="col-md-12"><img src="../assets/img/banner-images/collage.jpg" class="w-100"></div>
			<!-- <div class="col-md-2 bg-success"></div> -->
		</div>
		<div class="row mt-5">
			<div class="col-md-12 text-secondary text-center">Trenutno u Novom Sadu i Beogradu! <br>
		
				<br>
				<?php include "models/functions.php";
						$gradovi=dohvati_gradove();
						foreach ($gradovi as $grad):
				?>
					<input type="checkbox" name="filter" class="filterChbox" value="<?=$grad->grad_id?>"><?=$grad->grad?><br>
<?php endforeach; ?>

				<div class="grad">
					
				<?php
						$gr=dohvati_gradove();
						foreach ($gradovi as $g):
				?>
					<?=$g->grad?><br>
<?php endforeach; ?>
					

				</div>



			</div>
		</div></div>
	<div class="container">
		<div class="row mt-5">
			<div class="col-md-3"></div>
			<div class="col-md-8 border-bottom">
				<button type="button" class="btn btn-link font-weight-bold sort" value="ASC">A-Z <i class="fa fas fa-arrow-down"></i></button>
				<button type="button" class="btn btn-link font-weight-bold sort" value="DESC">Z-A <i class="fa fas fa-arrow-up"></i></button>
			</div>
		</div>
		<div class="row mt-2">
			<div class="col-md-3">
				<div class="mb-2 font-weight-bold">Grad:</div>
				
				<select name="gradovi" id="gradovi" class="p-2 w-100 border">
					<?php 
						$gradovi=executeQuery("SELECT * FROM grad");
						foreach ($gradovi as $grad):
					?>
					<option value="<?=$grad->grad_id?>"><?= $grad->grad;?></option>
				<?php endforeach; ?>
				</select>
				<div class="mb-2 font-weight-bold mt-4">Pretrazi restoran:</div>
				<input type="text" name="search" id="search" class="p-2 w-100 border" placeholder="Pretrazi">
			</div>
			<div class="col-md-8 gradovi">

				<?php 
						$restorani=executeQuery("SELECT distinct * FROM restoran inner join img on restoran.restoran_id=img.restoran_id ");
						foreach ($restorani as $restoran):
				?>
				<div class="w-100 border pb-3 display-flex bg-w p-3 rounded mb-3 pt-3 zoom">
					<img src="../assets/img/restorani/<?=$restoran->slika?>" width="150px" height="120px" class="mw-100" alt="restoran">
					<div class="col-md-4"><p class="font-weight-bold"> <?= $restoran->naziv_restorana ?> </p>
						<p class="text-secondary">
	<?php $opis=$restoran->opis; echo substr($opis, 0,40)?>..<a href="views/restaurant.php?id=<?=$restoran->restoran_id?>" class="ml-2">Prkazi vise..</a></p></div>
					<div class="w-100 text-right my-auto"><a href="#" class="btn btn-primary">Rezervisite</a></div>
				</div>
			<?php endforeach; ?>
			</div>
		</div>
	</div>
	</body>