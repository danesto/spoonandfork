 <nav class="navbar navbar-expand-lg navbar-light bg-w border-bottom p-0 pl-5 pr-3 sticky-top pr-5">
    <a class="navbar-brand" href="index.php?page=pocetna">
    <img src="assets/img/logo.png" width="30" height="30" class="rounded-circle d-inline-block mr-2" alt="">
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
          <a class="dropdown-item" href="index.php?page=pocetna">Home</a>
          <a class="dropdown-item" href="index.php?page=restorani">Restorani</a>
          <a class="dropdown-item" href="index.php?page=oautoru">O autoru</a>
          <a class="dropdown-item" href="index.php?page=dokumentacija">Dokumentacija</a>
          <?php if(isset($_SESSION['korisnik']) && $_SESSION['korisnik']->uloga_id==1):?>
         <a class="dropdown-item" href="index.php?page=admin">Nazad na admin stranu</a>
       <?php endif;?>
          <?php if(!isset($_SESSION['korisnik'])):?>    
          <a class="dropdown-item" href="index.php?page=login">Login</a>
        <?php endif; ?>
          <div class="dropdown-divider"></div>
          <?php if(isset($_SESSION['korisnik'])):?>
          <a class="dropdown-item" href="index.php?page=logout">Logout</a>
          <?php endif; ?>
        </div>
      </li>
            </div>
      <div class="col text-right">
         <?php if(isset($_SESSION['korisnik'])):?>
                     <a href="index.php?page=logout" class="btn btn-primary pl-4 pr-4">Izloguj se</a>
          <?php else: ?>
           <a href="index.php?page=login" class="btn btn-primary pl-4 pr-4">Log in</a>
          <a href="index.php?page=register" class="btn btn-link">Registracija</a>       

          <?php endif;?>
      </div>
    </nav>