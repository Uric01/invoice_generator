<?php


include 'db.inc.php';

$db = new DatabaseConnection();

echo $db->connectDB();

$db->disconnectDB();

