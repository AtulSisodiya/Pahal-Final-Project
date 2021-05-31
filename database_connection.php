<?php

$dsn = 'mysql:dbname=pahal;host=localhost';
$user = 'fred';
$password = 'zap';
// $dsn = 'mysql:dbname=pahal;host=172.31.1.238:3306';
// $user = 'root';
// $password = 'Ashish@5959';

date_default_timezone_set('UTC'); 
try
{
	$pdo = new PDO($dsn,$user,$password);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
	echo "PDO error".$e->getMessage();
	die();
}
?>