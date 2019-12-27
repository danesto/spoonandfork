<div class="container mt-5">
	<script type="text/javascript" src="../../assets/js/admin.js"></script>
	<div class="row" id="ispis"></div>

	<div class="row">
		<div class="col-md-7 border bg-w mx-auto text-center">
			<img src="../../assets/img/admin.png" width="300px" class="mx-auto p-2 rounded-circle"><br>
			E-mail:
			<input type="text" id="email" class="border w-100 p-2 mb-3" name="email" value="<?=$_SESSION['korisnik']->email?>">
			Broj telefona:
			<input type="text" id="broj_telefona" class="border w-100 p-2 mb-3" name="broj_telefona" value="<?=$_SESSION['korisnik']->broj_telefona?>">
			Ime:
			<input type="text" id="ime" class="border w-100 p-2 mb-3" name="ime" value="<?=$_SESSION['korisnik']->ime?>">
			Prezime:
			<input type="text" id="prezime" class="border w-100 p-2 mb-3" name="prezime" value="<?=$_SESSION['korisnik']->prezime?>">
			<input type="hidden" id="uloga" class="border w-100 p-2 mb-3" name="uloga" value="<?=$_SESSION['korisnik']->uloga_id?>">
			<input type="hidden" id="sifra" class="border w-100 p-2 mb-3" name="uloga" value="<?=$_SESSION['korisnik']->sifra?>">
			<button type="button" id="edit" name="edit" class="btn btn-primary w-100 mb-2">Izmeni</button>
		</div>
	</div>
</div>