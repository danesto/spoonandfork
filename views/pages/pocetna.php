<body class="bg-light">
    
    
    <div class="bg-header shadow-sm">
        <div class="container ">
           
   
            <div class="row h-400 text-center">
                <div class="col-md-6 mx-auto my-auto text-w text-bold"><h1 class="text-center header text-w ">Rezervacije u najboljim restoranima!</h1>
               
            <a href="index.php?page=register" class="btn btn-primary w-50">Registruj se!</a>
                </div>
                
            </div>
        </div>
    </div>
     <div class="p-2 bg-primary text-light">
            </div>


<div class="container-fluid">
     <div class="row mt-5">
            <div class="col-md-10 mx-auto">  <h3 class="border-bottom pb-3">Sponzorisano:</h3></div>
        </div>
        <div class="row mt-3 bg-w p-5 border-top border-bottom">
            <?php include 'models/restorani/functions.php';
$cards=get_sponsored_cards();
foreach ($cards as $card):
?>
            <div class="col-md-3 mx-auto">
<!-- card -->

                <div class="card shadow-sm">
              <img class="card-img-top" src="assets/img/restorani/<?=$card->slika?>" height="150px" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title"><?= $card->naziv_restorana ?></h5>
                <p class="card-text"><?php $opis=$card->opis; echo substr($opis, 0,29).'...'; ?></p>
                <a href="views/restaurant.php?id=<?=$card->restoran_id?>" class="btn btn-primary">Pogledaj</a>
              </div>
            </div>



</div>
<?php endforeach;?>
        </div>


</div>
    <div class="container mt-5">
       

        <div class="row mt-5">
            <div class="col-md-10 mx-auto">
                <h3 class="border-bottom pb-3">Po gradovima:</h3>
                <div class="text-center pt-3 mw-100 belgrade">
                    <h3 class="text-w lh-60">Beograd</h3>
                </div>
                <div class="col-md-10 list-primary">
                <ul class="w-100 ">
                    <?php
                        $belgrade= get_belgrade_restaurants();
                     foreach($belgrade as $bel):
                           
                    ?>
             
                    <li class="pb-2"><a href="views/restaurant.php?id=<?=$bel->restoran_id?>" class="text-dark"><?=$bel->naziv_restorana?></a></li>
                
                     <?php endforeach;?>
                     </ul>
                </div>
                <div class="text-center pt-3 mw-100 ns mt-5">
                    <h3 class="text-w lh-60">Novi Sad</h3>
                </div>
                <div class="col-md-10 list-primary">
                <ul class="w-100 ">
                    <?php
                   
                    $novisad=get_noviSad_restaurants();
                     foreach($novisad as $ns):
                           
                    ?>
             
                    <li class="pb-2"><a href="views/restaurant.php?id=<?=$ns->restoran_id ?>" class="text-dark"><?=$ns->naziv_restorana?></a></li>
                
                     <?php endforeach;?>
                     </ul>
                </div>


            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-10 mx-auto">
                <h3 class="border-bottom pb-3">Za sada u dva grada:</h3>
            <div class="list-primary">
            <ul class="w-100 ">
                    <?php
                   
                    $grad=get_cities();
                     foreach($grad as $g):
                           
                    ?>
            
                    <li class="pb-2 text-dark font-weight-bold"><?=$g->grad?></li>
                
                     <?php endforeach;?>
                     </ul>
            </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <img src="../assets/img/wide.jpg" class="mw-100 rounded under mx-auto" alt="">
                <span class="over-image mx-auto text-center">Svetska najlakša platforma za rezervaciju <br>stolova</span>
            </div>
        </div>
    </div>