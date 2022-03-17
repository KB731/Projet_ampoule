<?php

require_once 'connectDB.php';

$delete_database = "DROP DATABASE projet_ampoule";
$connectDB->exec($delete_database);

echo 'Database deleted !';