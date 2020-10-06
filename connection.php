<?php
//fichier de connexion à la bdd : connection.php

    $dbname= 'monpfe';
    $user = 'root';
    $password = '';
    $host = 'localhost';

try {
    $bdd = new PDO('mysql:host='.$host .';dbname='.$dbname.';charset=utf8', $user, $password );
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "<p>Erreur : " . $e->getMessage() . "</p>";
    exit();
}


?>                                                      