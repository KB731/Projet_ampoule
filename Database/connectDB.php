<?php
$servername = 'localhost';
$username = 'root';
$password = '';

//On essaie de se connecter
try {
    $connectDB = new PDO("mysql:host=$servername;dbname=projet_ampoule", $username, $password);
//On définit le mode d'erreur de PDO sur Exception
    $connectDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo 'Connexion réussie';
}

/*On capture les exceptions si une exception est lancée et on affiche
*les informations relatives à celle-ci*/ 
catch (PDOException $e) {
echo "Erreur : " . $e->getMessage();
}
