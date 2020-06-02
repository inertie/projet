<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <title>Inscription</title>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php">Accueil</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    <?php
      @session_start();
        if (!isset($_SESSION['state'])) { ?>
            <li class="nav-item">
              <a class="nav-link" href="inscription.php">Inscription</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="login.php">Se connecter</a>
            </li>
          <?php }
        if (isset($_SESSION['state']) && $_SESSION['state'] == 'connected') {?>
            <li class="nav-item">
              <a class="nav-link" href="newhost.php">Nouvelle annonce</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="profile.php">Mon profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="anounce.php">Mes annonces</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/Code/public/deco.php">Déconnexion</a>
            </li>
          <?php }?>

    </ul>
  </div>
</nav>


