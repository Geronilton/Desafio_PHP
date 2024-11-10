<?php 
$servername = "localhost";  // Endereço do servidor MySQL   // Senha do MySQL
$database = "desafiophp";
$username = 'root';
$password = '123456';

$conn = new mysqli($servername, $username, $password, $database);

// Verificando a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

?>