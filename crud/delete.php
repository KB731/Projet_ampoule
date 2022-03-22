<?php
require_once '../Database/connectDB.php';

if (isset($_POST['delete'])) {

    $query = $connectDB->prepare("DELETE FROM ampoule WHERE id=:id");
    $query->bindValue(':id', $_GET['id']);
    $query->execute();

    header('Location: ../historique.php');
}
