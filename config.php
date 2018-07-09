<?php
require 'environment.php';

global $config;
global $db;

$config = array();
 // Verifica o ambiente que esta "development"
if(ENVIRONMENT == 'development') {
	define("BASE_URL", "http://127.0.0.1/facebook/");
	$config['dbname'] = 'bd_face';
	$config['host'] = '127.0.0.1';
	$config['dbuser'] = 'root';
	$config['dbpass'] = '';
} else {
	define("BASE_URL", "http://127.0.0.1/facebook/");
	$config['dbname'] = 'bd_face';
	$config['host'] = '127.0.0.1';
	$config['dbuser'] = 'root';
	$config['dbpass'] = '';
}

// Adicionado a conex�o com banco
$db = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['host'], $config['dbuser'], $config['dbpass']);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>