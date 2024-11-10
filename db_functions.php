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
    
        $conn->close();  
        return $associados; 
    }

?>