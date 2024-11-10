<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Anuidades Atrasadas</title>
</head>

<body>
   <div class="conteiner">
    <p><a href="javascript:history.back()">Voltar</a>
    </p>
   <?php
    include 'db_functions.php';

    $anuidadesAtrasadas = getAllAnuidadesAtrasadas();

    if (!empty($anuidadesAtrasadas)) {
        echo "<h2>Lista de Anuidades Atrasadas</h2>";
        echo "<table>";
        echo "<tr><th>ID Anuidade</th><th>Nome do Associado</th><th>Título</th><th>Data de Vencimento</th><th>Status Pagamento</th></tr>";

        foreach ($anuidadesAtrasadas as $anuidade) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($anuidade["id_anuidade"]) . "</td>";
            echo "<td>" . htmlspecialchars($anuidade["nome_associado"]) . "</td>";
            echo "<td>" . htmlspecialchars($anuidade["titulo"]) . "</td>";
            echo "<td>" . htmlspecialchars($anuidade["data_vencimento"]) . "</td>";
            $statusPagamento = $anuidade["status_pagamento"] == 0 ? "Não Pago" : "Pago";  
            echo "<td>" . htmlspecialchars($statusPagamento) . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "Nenhuma anuidade atrasada encontrada.";
    }
    ?>

   </div>
</body>

</html>
