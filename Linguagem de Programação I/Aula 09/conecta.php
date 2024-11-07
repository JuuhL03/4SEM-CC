<?php  
$domain = "localhost";
$user = "root";
$password = "";
$database = "bd_jogos";

$mysqli = new mysqli($domain, $user, $password, $database);

if($mysqli->connect_errno){
    echo "Não foi possível conectar com o banco de dados: " . $mysqli->connect_error;
}
?>
