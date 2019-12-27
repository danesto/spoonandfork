<?php session_start();
if(isset($_GET['grad'])){

include_once "../../config/connection.php";
	$grad=$_GET['grad'];
	$gradovi=executeQuery("SELECT * FROM restoran inner join grad_restoran on restoran.restoran_id=grad_restoran.r_id inner join grad
 on grad_restoran.g_id=grad.grad_id inner join img on restoran.restoran_id=img.restoran_id where grad.grad_id=$grad");
	foreach ($gradovi as $grad) {
		$link='views/restaurant.php?id='.$grad->restoran_id;
		echo '<div class="w-100 border pt-3 pb-3 display-flex bg-w p-3 rounded mb-3 zoom">
					<img src="../assets/img/restorani/'.$grad->slika.'" width="150px" height="120px" class="mw-100" alt="restoran">
					<div class="col-md-4"><p class="font-weight-bold"> ' . $grad->naziv_restorana .' </p>
						<p class="text-secondary">'.substr($grad->opis, 0,40).'</p></div>
					<div class="w-100 text-right my-auto"><a href="'.$link.'" class="btn btn-primary">Pogledajte</a></div>
				</div>';
	}
}