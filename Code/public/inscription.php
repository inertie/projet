<?php
require_once '../views/layout/header.php';
require_once '../functions/user.php';

$register = NULL;

if (!empty($_POST) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['firstName']) && !empty($_POST['lastName'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];

    $register = registerUser($email, $password, $firstName, $lastName);
}
?>

<form method="POST">
  <div class="form-group">
    <label for="email">Adresse email</label>
    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
  <div class="form-group">
    <label for="firstName">Prénom</label>
    <input type="text" class="form-control" id="firstName" name="firstName">
  </div>
  <div class="form-group">
    <label for="lastName">Nom</label>
    <input type="text" class="form-control" id="lastName" name="lastName">
  </div>
  <button type="submit" class="btn btn-primary">S'enregistrer</button>
</form>

<?php if ($register) { ?>
  <div class="alert alert-success" role="alert">
    Compte créé.
  </div>
<?php } ?>

<?php if ($register === false) { ?>
  <div class="alert alert-danger" role="alert">
    Une erreur est survenue.
  </div>
<?php } ?>

<?php require_once '../views/layout/footer.php';