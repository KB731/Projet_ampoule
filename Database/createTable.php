<?php

require_once 'connectDB.php';

$create_table = "CREATE TABLE IF NOT EXISTS `ampoule`(
    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `date` DATE  NOT NULL,
    `etage` INT(2) NOT NULL,
    `emplacement` VARCHAR(255) NOT NULL,
    `prix` DECIMAL(6,2) NOT NULL
    )";

$connectDB->exec($create_table);
echo 'Table created !';
