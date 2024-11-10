<?php 
    include 'connectionDB.php';

    $id_associado = $_POST["id_associado"];
    $nome = $_REQUEST["nome"];
    $data_vencimento = $_REQUEST["data_vencimento"];
    $status_pagamento = $_REQUEST["status_pagamento"];

    
    $sql = "INSERT INTO anuidade (nome, data_vencimento, status_pagamento, id_associado) 
    VALUES ('$nome', '$data_vencimento', '$status_pagamento', '$id_associado')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Novo registro inserido com sucesso!";
        header("Location: listarAssociado.php");
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
?>