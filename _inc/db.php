<?php

$host = 'localhost'; 
$username = 'root'; 
$password = ''; 
$dbname = 'db'; 

$conectDb = new mysqli($host, $username, $password, $dbname);
if ($conectDb->connect_error) {
    die("Chyba připojení k DB: " . $conectDb->connect_error);
}

