<body class="bg-light">
<div class="container mt-5">
	<div class="row">
		<div class="col-md-6"></div>
		<div class="col-md-6">
				<?php if(isset($_SESSION["message"])):?>

		<span class="alert alert-danger"><?php echo($_SESSION['message']);?></span>


<?php 
session_unset(); endif; ?>
		</div>
	</div>
</div>


<div class="container mt-5">

	<div class="row bg-w border">
		<div class="col-md-6 p-0">
			<img src="../assets/img/banner-images/login.jpg" class="mw-100">
		</div>
		<div class="col-md-6 my-auto text-center ">
			<h3 class="text-left mb-5">Login</h3>
			<form method="POST" action="../../models/korisnici/login.php">
	    		<input type="text" name="email" id="user" placeholder="E-mail" class="border-top-0 border-left-0 border-right-0 border-bottom-success p-2 w-100">
	    		<input type="password" name="sifra" id="sifra" placeholder="Password" class="border-top-0 border-left-0 border-right-0 border-bottom-success text-sec p-2 w-100 mt-5">
	    		<input type="submit" value="Login" name="login" id="login" class="btn btn-success mt-5 w-100">
			</form>			
		</div>
	</div>

</div>
</body>