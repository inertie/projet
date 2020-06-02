<?php
require_once '../views/layout/header.php';
require_once '../functions/user.php';


@session_start();
if (isset($_SESSION['state']) && $_SESSION['state'] == 'connected') {
    echo "Connecté";
    ?> 
    </br>
    Bonjour <?php echo $_SESSION['firstName']?> <?php echo $_SESSION['lastName']?> </br>
    Votre adresse email est : <?php echo $_SESSION['email']?> </br>

<?php } 

else {
    header('Location: login.php');
}
?>
