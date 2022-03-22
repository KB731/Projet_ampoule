<?php

require_once 'connectDB.php';

$create_database = "CREATE DATABASE `projet_ampoule`";

$connectDB->exec($create_database);
echo 'Database created !';
