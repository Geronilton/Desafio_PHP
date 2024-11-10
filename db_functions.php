<?php 
    include 'connectionDB.php';


    function getAssociados() {
        global $conn;
        
        $sql = "SELECT id_associado, nome, email, cpf, data_filiacao FROM associado";
        $result = $conn->query($sql);
    
        $associados = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $associados[] = $row;  
            }
        }
 
        return $associados; 
    }

    function getStatusAnuidade() {
        global $conn;
    
        $sql = "
            SELECT a.id_associado, a.nome,a.email,a.cpf,a.data_filiacao, n.status_pagamento 
            FROM associado a
            LEFT JOIN anuidade n ON a.id_associado = n.id_associado
        ";
        $result = $conn->query($sql);
    
        $associadosComAnuidade = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $associadosComAnuidade[] = $row;
            }
        }
    
        return $associadosComAnuidade;
    }
    
    function getAnuidades($id_associado) {
        global $conn;

        $sql = "
            SELECT a.id_associado, a.nome, a.email, a.cpf, a.data_filiacao, 
                   n.id_anuidade,n.titulo, n.data_vencimento, n.status_pagamento 
            FROM anuidade n
            INNER JOIN associado a ON a.id_associado = n.id_associado
            WHERE a.id_associado = ?
        ";
    
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id_associado);
        $stmt->execute();
        $result = $stmt->get_result();
    
        $anuidades = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $anuidades[] = $row;
            }
        }
    
        return $anuidades;
    }

    function getAllAnuidadesAtrasadas() {
        global $conn;
    
        $sql = "
            SELECT n.id_anuidade, n.titulo, n.data_vencimento, n.status_pagamento, a.nome AS nome_associado 
            FROM anuidade n
            INNER JOIN associado a ON n.id_associado = a.id_associado
            WHERE n.status_pagamento = 0  
            OR n.data_vencimento < CURDATE()
        ";
    
        $result = $conn->query($sql);
    
        $anuidadesAtrasadas = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $anuidadesAtrasadas[] = $row;
            }
        }
    
        return $anuidadesAtrasadas;
    }
    
    
    function deleteAssociado($id_associado) {
        global $conn;
    
   
        $conn->begin_transaction();
    
        try {
        
            $sqlAnuidade = "DELETE FROM anuidade WHERE id_associado = ?";
            $stmtAnuidade = $conn->prepare($sqlAnuidade);
            $stmtAnuidade->bind_param("i", $id_associado);
            $stmtAnuidade->execute();
 
            $sqlAssociado = "DELETE FROM associado WHERE id_associado = ?";
            $stmtAssociado = $conn->prepare($sqlAssociado);
            $stmtAssociado->bind_param("i", $id_associado);
            $stmtAssociado->execute();

            $conn->commit();
    
            return true;
        } catch (Exception $e) {
            $conn->rollback();
            return false;
        }
    }

    function setAnuidadePaga($id_anuidade) {
        global $conn;
    
        $sql = "UPDATE anuidade SET status_pagamento = 1 WHERE id_anuidade = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id_anuidade);
    
        if ($stmt->execute()) {
            $stmt->close();
    
            // Obter o id_associado para redirecionar corretamente
            $sqlAssoc = "SELECT id_associado FROM anuidade WHERE id_anuidade = ?";
            $stmtAssoc = $conn->prepare($sqlAssoc);
            $stmtAssoc->bind_param("i", $id_anuidade);
            $stmtAssoc->execute();
            $result = $stmtAssoc->get_result();
            $assocData = $result->fetch_assoc();
    
            return $assocData['id_associado'] ?? null;
        } else {
            return false;
        }
    }
    
    
    
    
?>