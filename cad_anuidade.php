<?php 
    include 'connectionDB.php';

    $id_associado = $_POST["id_associado"];
    $titulo = $_REQUEST["titulo"];
    $data_vencimento = $_REQUEST["data_vencimento"];
    $status_pagamento = $_REQUEST["status_pagamento"];

    
    $sql = "INSERT INTO anuidade (titulo, data_vencimento, status_pagamento, id_associado) 
    VALUES ('$titulo', '$data_vencimento', '$status_pagamento', '$id_associado')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Novo registro inserido com sucesso!";
        header("Location: index.php");
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
?>