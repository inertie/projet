<?php
require_once '../views/layout/header.php';
require_once '../functions/host.php';
?>

<?php
$search = $_GET['search'] ?? null;
$hosts = listHost($search);
?>

<nav class="navbar navbar-light bg-light">
  <form class="form-inline">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" id="search" name="search" value="<?php echo $search; ?>"/>
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button>
  </form>
</nav>
<div class="container">

<div class="row">

<div class="row">
  <?php
  foreach ($hosts as $host) {
    require '../views/host/host.php';
  }

  if (empty($hosts)) { ?>
    <div class="alert alert-danger col-12" role="alert">
      Aucun résultat n'a été trouvé !
    </div>
  <?php } ?>
</div>