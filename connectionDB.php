<?php 
$servername = "localhost"; 
$database = "desafiophp";
$username = 'root';
$password = '123456';

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

?>