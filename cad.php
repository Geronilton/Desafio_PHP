<?php
include 'connectionDB.php';

$nome = $_REQUEST["nome"];
$email = $_REQUEST["email"];
$cpf = preg_replace('/[^0-9]/', '', $_POST['cpf']);
$dataFiliacao = $_REQUEST["data_filiacao"];


$sql = "INSERT INTO associado (nome, email, cpf, data_filiacao) VALUES ('$nome', '$email', '$cpf', '$dataFiliacao')";

if ($conn->query($sql) === TRUE) {
    $id_associado = $conn->insert_id;

    
    $status_pagamento = 0; 
    $tituloAnuidade = "Anuidade Recorrente";
    $dataVencimento = date('Y-m-d', strtotime('+1 month', strtotime($dataFiliacao)));
    
    $sqlAnuidade = "INSERT INTO anuidade (titulo, data_vencimento, status_pagamento, id_associado) VALUES ('$tituloAnuidade', '$dataVencimento', '$status_pagamento', '$id_associado')";

    if ($conn->query($sqlAnuidade) === TRUE) {
        echo "Novo registro inserido com sucesso!";
        header("Location: index.php");
        exit();
    } else {
        echo "Erro ao inserir anuidade: " . $conn->error;
    }
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
