    <?php
        include 'connectionDB.php';

        $nome = $_REQUEST["nome"];
        $email = $_REQUEST["email"];
        $cpf = $_REQUEST["cpf"];
        $dataFiliacao = $_REQUEST["data_filiacao"];

        $sql = "INSERT INTO associado (nome, email, cpf, data_filiacao) VALUES ('$nome', '$email', '$cpf', '$dataFiliacao')";

        if ($conn->query($sql) === TRUE) {
            echo "Novo registro inserido com sucesso!";
            header("Location: listarAssociado.php");
        } else {
            echo "Erro: " . $sql . "<br>" . $conn->error;
        }
        
        $conn->close();

    ?>