<?php
require_once '../views/layout/header.php';
require_once '../functions/user.php'
?>

<?php
$pdo = getPdo();
$email = "";
$error = false;


if (!empty($_POST['email']) && !empty($_POST['password'])) {
    session_start();

    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE email = :email";
    $stmt = $pdo->prepare($query);
    $stmt -> execute([
        'email' => $email
    ]);

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row && password_verify($password, $row['password'])) {
        $_SESSION['state'] = 'connected';
        $_SESSION['email'] = $row['email'];
        $_SESSION['firstName'] = $row['firstName'];
        $_SESSION['lastName'] = $row['lastName'];
        header('Location: /Code/public/profile.php'); 
        exit;
    } else {
        $error = true;
    }
}?>

<form method='POST'>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>"/>
    </div>
    <div class="form-group">
        <label for="password">Mot de passe</label>
        <input type="password" class="form-control" id="password" name="password"/>
    </div>

<?php if($error) { ?>
    <div class="alert alert-danger" role="alert">
        Données saisies incorrect ! 
    </div>
<?php } ?>

    <button type="submit" class="btn btn-primary">Connexion</button>
</form>

<?php require_once '../views/layout/footer.php'; ?>