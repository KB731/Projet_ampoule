<?php

require_once 'connectDB.php';

$delete_table = "DROP TABLE ampoule";

$connectDB->exec($delete_table);

echo 'Tables deleted !';