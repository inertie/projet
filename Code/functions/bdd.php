<?php 

function getPDO() {
    try {
        $pdo = new PDO ('mysql:host=localhost;dbname=projet', 'projet', 'projet');
        return $pdo;
    } catch (PDOException $error) {
        exit($error); /*"Erreur lors de la connexion à la base de données */
    }
}
