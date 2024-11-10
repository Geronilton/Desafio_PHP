<?php
include 'db_functions.php';

if (isset($_GET['id'])) {
    $id_associado = $_GET['id'];
    $deletado = deleteAssociado($id_associado);

    if ($deletado) {
        echo "Associado e anuidades excluídos com sucesso.";
        header("Location: index.php");
    } else {
        echo "Erro ao excluir o associado.";
    }
} else {
    echo "ID do associado não fornecido.";
}
?>
