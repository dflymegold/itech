<?php
$host = 'localhost';
$db = 'itech2_1';
$username = 'root';
$passwd = '';
$charset = 'utf8';
$port = '3306';

$dsn = "mysql:host=$host;port=$port;dbname=$db;charset=$charset";
$pdo = new PDO($dsn, $username, $passwd);

?>



