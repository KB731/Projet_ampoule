    <!-- Insertion des données dans la table -->
    <?php
    require 'Database/connectDB.php';
   

    if(isset($_POST['date']) && isset($_POST['etage']) && isset($_POST['emplacement']) && isset($_POST['prix'])) {

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

      echo 'Entrée ajoutée dans la table';

}
    ?>