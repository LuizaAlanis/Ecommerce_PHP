<?php

    include 'shared/conexao.php';

    $cd_produto = $_GET['cd_altera'];

    $quantidade = $_POST['quantidade'];

    try {

        $alterar = $cn->query("UPDATE estoque SET 
        quantidadeProduto = '$quantidade' 

        WHERE id = $cd_produto	
        ");
        
        header('location:estoque.php'); 
        
    } catch(PDOException $e) {
        echo $e->getMessage();  
    }
?>
