<div class="container">
	<div class="row mt-5">
		<div class="col-md-5 bg-w border p-2 text-center mx-auto">
			<?php include 'models/autor/functions.php'; 
					$autor=author_info();
					foreach ($autor as $a):
			?>
			<h2 class="font-weight-bold p-2">	<?=$a->imePrezime?> <?=$a->Indeks?><br></h2>
			<img src="../../assets/img/<?=$a->Slika ?>" class="mw-100 rounded p-2" width="300px"><br>
		
			
			<?=$a->Opis?><br>
			<a href="../../models/autor/wordexport.php" class="btn btn-primary mt-2">Preuzmi podatke kao word fajl</a>
			
		<?php endforeach; ?>
		</div>
	</div>
</div>