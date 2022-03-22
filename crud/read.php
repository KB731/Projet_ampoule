<?php

require_once './Database/connectDB.php';

// On écrit notre requête
$query = $connectDB->prepare("SELECT * FROM `ampoule`");

// On exécute la requête
$query->execute();

// On stocke le résultat dans un tableau associatif
$result = $query->fetchAll(PDO::FETCH_ASSOC);
