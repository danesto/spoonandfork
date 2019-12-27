<?php include_once 'config/connection.php';
		
function get_sponsored_cards(){
	            
 $all=executeQuery("SELECT * FROM restoran r join img i on r.restoran_id=i.restoran_id limit 4");
   return $all;           

    }

 function get_belgrade_restaurants(){
 	  return $belgrade=executeQuery("SELECT * FROM restoran r join grad_restoran gr on r.restoran_id=gr.r_id WHERE gr.g_id=1");
 }

 function get_noviSad_restaurants(){
 	  return $novisad=executeQuery("SELECT * FROM restoran r join grad_restoran gr on r.restoran_id=gr.r_id WHERE gr.g_id=3");
 }

 function get_cities(){
 	return $grad=executeQuery("SELECT * FROM grad");
 }
