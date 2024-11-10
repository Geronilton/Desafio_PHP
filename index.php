<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Dashboard</title>
</head>

<body>
    <div class="conteiner">
        <div class="links-container">
            <a href="form_associado.html" class="link-button">Cadastrar Associado</a>
            <a href="anuidades_atrasadas.php" class="link-button">Anuidades Atrasadas</a>
        </div>

        <?php
        include 'db_functions.php';
        $associados = getStatusAnuidade();

        if (!empty($associados)) {
            echo "<table>";
            echo "<tr><th>Nome</th><th>Email</th><th>CPF</th><th>Data de Filiação</th><th>Status Pagamento</th></tr>";

            foreach ($associados as $associado) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($associado["nome"]) . "</td>";
                echo "<td>" . htmlspecialchars($associado["email"]) . "</td>";
                echo "<td>" . htmlspecialchars($associado["cpf"]) . "</td>";
                echo "<td>" . htmlspecialchars($associado["data_filiacao"]) . "</td>";
                $statusPagamento = $associado["status_pagamento"] ? "Pago" : "Não Pago";
                echo "<td>" . htmlspecialchars($statusPagamento) . "</td>";
                echo "<td><a href='form_anuidade.php?id=" . urlencode($associado["id_associado"]) . "'>Adicionar Anuidade</a></td>";
                echo "<td><a href='listar_anuidades.php?id=" . urlencode($associado["id_associado"]) . "'>Ver Anuidades</a></td>";
                echo "<td><a href='excluir_associado.php?id=" . urlencode($associado["id_associado"]) . "' onclick='return confirm(\"Tem certeza que deseja excluir este associado?\")'>Excluir</a></td>";
                echo "</tr>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "Nenhum associado encontrado.";
        }
        $conn->close();
        ?>
    </div>
</body>

</html>