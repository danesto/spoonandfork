<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>C'mon!</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="../assets/css/main.css">
    <script src="../assets/js/reservation.js"></script>
    <script src="../assets/js/komentarisanje.js"></script>
</head>

<body class="bg-light">
    <div class="p-2"></div>
     <nav class="navbar navbar-expand-lg navbar-light bg-w border-bottom p-0 pl-5 pr-3 pr-5">
    <a class="navbar-brand" href="#">
    <img src="../assets/img/logo.png" width="30" height="30" class="rounded-circle d-inline-block mr-2" alt="">
    spoon & fork
  </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
            <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle p-3 border-right border-left" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Menu
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="../index.php?page=pocetna">Home</a>
          <a class="dropdown-item" href="../index.php?page=restorani">Restorani</a>
          <a class="dropdown-item" href="../index.php?page=oautoru">O autoru</a>
          <a class="dropdown-item" href="../index.php?page=dokumentacija">Dokumentacija</a>
          <?php if(isset($_SESSION['korisnik']) && $_SESSION['korisnik']->uloga_id==1):?>
         <a class="dropdown-item" href="../index.php?page=admin">Nazad na admin stranu</a>
       <?php endif;?>
          <?php if(!isset($_SESSION['korisnik'])):?>    
          <a class="dropdown-item" href="../index.php?page=login">Login</a>
        <?php endif; ?>
          <div class="dropdown-divider"></div>
          <?php if(isset($_SESSION['korisnik'])):?>
          <a class="dropdown-item" href="../index.php?page=logout">Logout</a>
          <?php endif; ?>
        </div>
      </li>
            </div>
      <div class="col text-right">
        <a href="../index.php?page=login" class="btn btn-primary pl-4 pr-4">Log in</a>
          <a href="../index.php?page=register" class="btn btn-link">Register</a>
      </div>
    </nav>
    
    
<div class="container mt-5">
    <div class="row"><div class="col-md-8"></div> <div class="w-100 mt-2" id="alert"></div></div>
    <div class="row">
        <div class="col-md-8 bg-w p-3 shadow-sm">
            <?php include_once '../config/connection.php';
                     $restoran=$_GET['id'];
                    $restorani=executeQuery("SELECT * FROM restoran inner join img on restoran.restoran_id=img.restoran_id where restoran.restoran_id=$restoran limit 1");
                    foreach ($restorani as $r):
                    
                    
            ?>
            <h3 class="font-weight-bold pb-2 pt-2"><?= $r->naziv_restorana ?></h3>
            <img src="../assets/img/restorani/<?=$r->slika?>" alt="" class="mw-100">
        <div class="col-md-12 mt-3">
            
            <p class="border-bottom pb-3 mt-3 font-weight-bold"><i class="fas fa-map-marker-alt mr-2"></i> <?= $r->adresa ?> </p>
            <p> <?=$r->opis?> </p>
            <?php endforeach;?>
            
        </div>
        </div>
        
        
        <div class="col-md-4 h-25 sticky-top pt-0">
            <div class="p-3 shadow-sm bg-w pt-0 mt-0">
            <h4 class="text-center mt-3 border-bottom pb-3 mb-3 font-weight-bold"> Make a reservation </h4>
            <span class="font-weight-bold">Number of people:</span>
             <select class="w-100 border-top-0 border-left-0 border-right-0 border-bottom p-2" name="people" id="people">
                <?php for($broj=1; $broj<11; $broj++): ?>
                <option value="<?=$broj?>"><?= $broj ?>  </option>
                <?php endfor; ?>
                </select>
                <div class="w-100 display-flex mt-3">
                    <input type="hidden" name="restoran_id" value="<?=$restoran?>" id="restoran_id">
              <div class="w-50">
                  Date:
                <input type="date" name="date" class="mt-2 border-top-0 border-left-0 border-right-0 border-bottom mt-3 p-2 w-100" id="date"></div>
                <div class="">
                    Time:
                <input type="time" name="time" class=" mt-2 border-top-0 border-left-0 border-right-0 border-bottom mt-3 p-2 w-100" id="time"></div>
               
            </div><?php if(isset($_SESSION['korisnik'])): ?>
            <button type="button" class="btn btn-success mt-3 w-100 border-radius-0 mb-3" name="reserve" id="reserve">Reserve</button>
          <?php else: ?>
            <button type="button" class="btn btn-primary disabled mt-3 w-100 border-radius-0 mb-3">Morate biti ulogovani kako bi rezervisali!</button>
            <?php endif; ?>
    </div>

</div>

   
</div>


    <div class="row">
      <div class="col-md-12 p-3 mt-5 border-bottom pb-3"><h3 class="font-weight-bold">Komentari:</h3></div>
    </div>
  <div class="row">
    <div class="col-md-12 comments pt-4" id="comments">
    <?php   $id=$_GET['id'];
            $komentari=executeQuery("SELECT * FROM komentar where id_restoran=$id");
            foreach ($komentari as $kom):
    ?>
      <div class="col-md-8 p-3 border-bottom mb-5">
       
        <h5 class="font-weight-bold mb-3"><?= $kom->ime .' '. $kom->prezime ?></h5>
        <div class="w-50 mb-3 my-auto ml-3"><?= $kom->komentar ?></div>
      </div>
  <?php endforeach; ?>
    </div>
  </div>

  <?php if(isset($_SESSION['korisnik'])):?>
  <div class="row">
    <div class="col-md-8">
      <h3 class="font-weight-bold mt-5">Komentarisite: </h3>
      <div class="w-100">
        <input type="hidden" name="id_restorana" id="id_restorana" value="<?=$_GET['id']?>">
        <textarea  name="komentar" id="komentar" class="mt-4 form-control border p-2 w-100" rows="5"></textarea>
        <button type="button" name="postujKomentar" id="postujKomentar" class="btn btn-primary mt-2">Postavi komentar</button>
      </div>

    </div>

</div>

<?php else: ?>
<h3 class="alert alert-danger">Morate biti ulogovani kako bi komentarisali! </h3>
<?php endif; ?>
</div>
 <footer class="bg-darker mt-5"> 
        <div class="container pt-4">
            <div class="row">
                <div class="col-md-10">
                    <img src="../assets/img/banner-images/footer.jpg" class="mw-100">
                </div>
            <div class="col-md-2 list-secondary border-bottom pb-3">

                    <ul class="pl-0">
                        <li class="text-light fw-bold mb-3">Menu</li>
                        <li><a href="../index.php?page=pocetna">Početna</a></li>
                        <li><a href="../index.php?page=restorani">Restorani</a></li>
                        <li><a href="../index.php?page=oautoru">O autoru</a></li>
                        <li><a href="../index.php?page=dokumentacija">Dokumentacija</a></li>
                        <li><a href="../index.php?page=login">Login</a></li>
                        <li><a href="../index.php?page=register"> Register</a></li>
                       
                    </ul>
            </div>
            </div>
            <div class="row">
                <div class="col-md-10 text-light mt-2 pt-2"></div>
            </div>
        </div>
    </footer>


</body>

</html>