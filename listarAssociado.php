<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <?php 
    include 'db_functions.php';
    $associados = getAssociados();

    if (!empty($associados)) {
        echo "<table>";
        echo "<tr><th>Nome</th><th>Email</th><th>CPF</th><th>Data de Filiação</th></tr>";

        foreach ($associados as $associado) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($associado["nome"]) . "</td>";
            echo "<td>" . htmlspecialchars($associado["email"]) . "</td>";
            echo "<td>" . htmlspecialchars($associado["cpf"]) . "</td>";
            echo "<td>" . htmlspecialchars($associado["data_filiacao"]) . "</td>";
            echo "<td><a href='form_anuidade.php?id=" . urlencode($associado["id_associado"]) . "'>Adicionar Anuidade</a></td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "Nenhum associado encontrado.";
    }
    
    ?>
</body>
</html>