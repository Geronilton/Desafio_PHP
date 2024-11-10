<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Anuidades do Associado</title>
</head>

<body>
   <div class="container">
   <p><a href="javascript:history.back()">Voltar</a></p>
   <?php
    include 'db_functions.php';

    if (isset($_GET['id'])) {
        $id_associado = $_GET['id'];

        $anuidades = getAnuidades($id_associado);

        if (!empty($anuidades)) {
            $id_associado = $_GET['id'];
            $nome_associado = $anuidades[0]['nome'];
            echo "<h2>Anuidades do Associado #" . htmlspecialchars($nome_associado) . "</h2>";
            echo "<table>";
            echo "<tr><th>ID Anuidade</th><th>Título</th><th>Data de Vencimento</th><th>Status Pagamento</th><th>Ação</th></tr>";

            foreach ($anuidades as $anuidade) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($anuidade["id_anuidade"]) . "</td>";
                echo "<td>" . htmlspecialchars($anuidade["titulo"]) . "</td>";
                echo "<td>" . htmlspecialchars($anuidade["data_vencimento"]) . "</td>";
                $statusPagamento = $anuidade["status_pagamento"] ? "Pago" : "Não Pago";
                echo "<td>" . htmlspecialchars($statusPagamento) . "</td>";

                if ($anuidade["status_pagamento"] == 0) {
                    echo "<td><a href='marca_pago.php?id_anuidade=" . urlencode($anuidade["id_anuidade"]) . "'>Marcar como Paga</a></td>";

                } else {
                    echo "<td>-</td>"; 
                }

                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "Nenhuma anuidade encontrada para este associado.";
        }
    } else {
        echo "ID do associado não fornecido.";
    }
    ?>

   </div>
</body>

</html>
