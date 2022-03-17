<?php
require_once 'connectDB.php';

$create_table = "CREATE TABLE ampoule(
    Id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Date DATE NOT NULL,
    Etage INT(2) NOT NULL,
    Emplacement VARCHAR(255) NOT NULL,
    Prix DECIMAL(6,2) NOT NULL,
    )";

$connectDB->exec($create_table);
echo 'Tables created !';
