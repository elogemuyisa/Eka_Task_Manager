<?php
try
{
   $connexion=new PDO ('mysql:dbname=eka_task_manager;host=localhost','root','');
} catch (Exception $e) 

{
  echo $e->getMessage(); 
}