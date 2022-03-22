<?php
require_once '../Database/connectDB.php';

if (isset($_POST['submit'])) {
    $date = $_POST['date'];
    $etage = $_POST['etage'];
    $emplacement = $_POST['emplacement'];
    $prix = $_POST['prix'];

    $query = $connectDB->prepare("INSERT INTO `ampoule` (`date`, `etage`, `emplacement`, `prix`)
                                  VALUES (:date, :etage, :emplacement, :prix)");

    $query->execute(array(
        'date' => $date,
        'etage' => $etage,
        'emplacement' => $emplacement,
        'prix' => $prix
    ));

    header('Location: ../historique.php');
}
