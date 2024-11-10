<?php
if (isset($_GET['id'])) {
    $id_associado = $_GET['id'];
} else {
    die("ID do associado não fornecido.");
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Cadastrar Anuidade</title>
</head>

<body>
    <div class="formulario">
    <p><a href="javascript:history.back()">Voltar</a>
        <header>
            <h1>Adicionar Anuidade</h1>

        </header>
        <Section>
            <form action="cad_anuidade.php" method="post">
                <input type="hidden" name="id_associado" value="<?php echo htmlspecialchars($id_associado); ?>">

                <label for="titulo">titulo</label>
                <input type="text" id="titulo" name="titulo" required>

                <label for="data_vencimento">Data de vencimento</label>
                <input type="date" id="data_vencimento" name="data_vencimento" required>

                <label>Status do Pagamento:</label><br>
                <input type="radio" id="pago" name="status_pagamento" value="1">
                <label for="pago">Pago</label><br>

                <input type="radio" id="nao_pago" name="status_pagamento" value="0">
                <label for="nao_pago">Não Pago</label><br>

                <input type="submit" value="Cadastrar">
            </form>
        </Section>
    </div>
</body>

</html>