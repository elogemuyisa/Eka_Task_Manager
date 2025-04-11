<?php
$DB_Name = "eka_manager";
$Host = "localhost";
$userName = "root";
$Pass_Word = "";
try {
    $connexion = new PDO('mysql:dbname= $DB_Name; host=$Host', '$userName', '$Pass_Word');
} catch (Exception $e) {
    echo $e;
}
