<?php
if (isset($_GET['id'])) {
    $id_associado = $_GET['id'];
} else {
    die("ID do associado não fornecido.");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <header>
            <h1>Adicionar Anuidade</h1>
        </header>
        <Section>
            <form action="cad_anuidade.php" method="post">
                <input type="hidden" name="id_associado" value="<?php echo htmlspecialchars($id_associado); ?>">

                <label for="nome">Nome</label>
                <input type="text" id="nome" name="nome" required>

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