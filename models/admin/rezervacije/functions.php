<?php include_once "../../../config/connection.php";
function get_reservations(){
	return $rezervacija=executeQuery("SELECT * FROM rezervacija INNER JOIN restoran on rezervacija.id_restorana=restoran.restoran_id");
}