<?php
$DB_Name = "";
$Host = "";
$userName = "";
$Pass_Word = "";
try {
    $connexion = new PDO('mysql:dbname= ; host=localhost', 'root', '');
} catch (Exception $e) {
    echo $e;
}
