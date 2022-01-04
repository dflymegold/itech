<?php
error_reporting(E_ALL);
$db_driver="mysql";
$host="localhost";
$database="itech2_1";
$dch="$db_driver:host=$host;dbname=$database";
$username="root";
$password="";
try
{
$pdo=new PDO($dch,$username,$password);
}
catch(PDOException $e)
{
	print "Error";
	die();
}
?>