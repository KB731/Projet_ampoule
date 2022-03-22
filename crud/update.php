<?php
require_once '../Database/connectDB.php';

if(isset($_POST['submit'])) {

    $sql = " UPDATE ampoule SET date=:date,etage=:etage,emplacement=:emplacement,prix=:prix WHERE id=:id";

    $query = $connectDB->prepare($sql);

    $query->bindValue(':date' , $_POST['date']);
    $query->bindValue(':etage' , $_POST['etage']);
    $query->bindValue(':emplacement' , $_POST['emplacement']);
    $query->bindValue(':prix' , $_POST['prix']);

    $query->bindValue(':id' , $_GET['id']);

    $query->execute();
    header('Location: http://localhost/Projet_ampoule/historique.php');


}