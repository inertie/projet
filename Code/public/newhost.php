<?php
require_once '../functions/user.php';
require_once '../views/layout/header.php';

@session_start();
if (isset($_SESSION['state']) && $_SESSION['state'] == 'connected') { ?> 
    </br>
    Bonjour <?php echo $_SESSION['firstName']?> <?php echo $_SESSION['lastName']?> </br></br>
    Ajoutez un bien : </br></br>

  <?php
    $add = NULL;

  if (!empty($_POST) && !empty($_POST['type']) && !empty($_POST['nbBed']) && !empty($_POST['nbBedroom']) && !empty($_POST['nbBathroom']) && !empty($_POST['parking']) && !empty($_POST['wifi']) && !empty($_POST['pool']) && !empty($_POST['toilets']) && !empty($_POST['airConditioning']) && !empty($_POST['centralHeating']) && !empty($_POST['TV']) && !empty($_POST['dinnerware']) && !empty($_POST['essentials'])) {
      $type = $_POST['type'];
      $nbBed = $_POST['nbBed'];
      $nbBedroom = $_POST['nbBedroom'];
      $nbBathroom = $_POST['nbBathroom'];
      $parking = $_POST['parking'];
      $wifi = $_POST['wifi'];
      $pool = $_POST['pool'];
      $toilets = $_POST['toilets'];
      $airConditioning = $_POST['airConditioning'];
      $centralHeating = $_POST['centralHeating'];
      $TV = $_POST['TV'];
      $dinnerware = $_POST['dinnerware'];
      $essentials = $_POST['essentials'];

      $add = addHost($type, $nbBed, $nbBedroom, $nbBathroom, $parking, $wifi, $pool, $toilets, $airConditioning, $centralHeating, $TV, $dinnerware, $essentials);
  }?>

  <form method="POST">
    <div class="form-group">
      <label for="type">Type de bien :</label>
        <select name="type" id="type">
          <option value="appartement">Appartement</option>
          <option value="maison">Maison</option>
          <option value="villa">Villa</option>
          <option value="chalet">Chalet</option>
          <option value="chambre">Chambre</option>
        </select> 

      <label for="nbBed">Nombre de place :</label>
        <select name="nbBed" id="nbBed">
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
          <option value="7">7</option>
          <option value="8">8</option>
        </select> 
    </div>
    
    <div class="form-group">
      <label for="nbBedroom">Nombre de chambre :</label>
        <select name="nbBedroom" id="nbBedroom">
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
        </select> 

      <label for="nbBathroom">Nombre de salle de bain :</label>
        <select name="nbBathroom" id="nbBathroom">
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
        </select>

      <label for="toilets">Nombre de toilette :</label>
        <select name="toilets" id="toilets">
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
        </select>
    </div> 
</br>
    <div class="form-check">
      <input type="checkbox" class="form-check-input" id="parking">
      <label class="parking" for="parking">Parking</label>
    </div>

    <div class="form-check">
      <input type="checkbox" class="form-check-input" id="wifi">
      <label class="wifi" for="wifi">Wifi</label>
    </div>

    <div class="form-check">
      <input type="checkbox" class="form-check-input" id="pool">
      <label class="pool" for="pool">Piscine</label>
    </div>

    <div class="form-check">
      <input type="checkbox" class="form-check-input" id="airConditioning">
      <label class="airConditioning" for="airConditioning">Climatisation</label>
    </div>

    <div class="form-check">
      <input type="checkbox" class="form-check-input" id="centralHeating">
      <label class="centralHeating" for="centralHeating">Chauffage</label>
    </div>

    <div class="form-check">
      <input type="checkbox" class="form-check-input" id="TV">
      <label class="TV" for="TV">TV</label>
    </div>

    <div class="form-check">
      <input type="checkbox" class="form-check-input" id="dinnerware">
      <label class="dinnerware" for="dinnerware">Vaisselle / équipements cuisine</label>
    </div>

    <div class="form-check">
      <input type="checkbox" class="form-check-input" id="essentials">
      <label class="essentials" for="essentials">Linge / Literie</label>
    </div>

    <button type="submit" class="btn btn-primary">Ajouter</button>
  </form>

  <?php if ($add) { ?>
    <div class="alert alert-success" role="alert">
      Bien ajouté.
    </div>
  <?php } ?>

  <?php if ($add === false) { ?>
    <div class="alert alert-danger" role="alert">
      Une erreur est survenue.
    </div>
  <?php } ?>

  <?php } 
  else {
      header('Location: login.php');
  }
  ?>

<?php require_once '../views/layout/footer.php'; ?>