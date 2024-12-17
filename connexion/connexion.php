<?php
// 'connexion-Temp.php'; show to make the connexion
try {
session_start();	
$connexion=new PDO('mysql:dbname=eka_manager; host=host', 'root', '');
} catch (Exception $e) {
	echo $e;
	
}
