<?php
$host = 'localhost';
$dbname = 'cs2skinstoredb'; 
$user = 'root';
$password = '';

$mysqli = new mysqli($host, $user, $password, $dbname);

if ($mysqli->connect_error) {
    die('Erro de Conexão (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}
?>
