<?php
include 'db_functions.php';

if (isset($_GET['id_anuidade'])) {
    $id_anuidade = $_GET['id_anuidade'];

    if (empty($id_anuidade)) {
        echo "ID da anuidade inválido.";
        exit;
    }

    $id_associado = setAnuidadePaga($id_anuidade);

    if ($id_associado) {
        header("Location: listar_anuidades.php?id=" . urlencode($id_associado));
        exit; 
    } else {
        echo "Erro ao atualizar o status da anuidade.";
    }
} else {
    echo "ID da anuidade não fornecido.";
}
?>
