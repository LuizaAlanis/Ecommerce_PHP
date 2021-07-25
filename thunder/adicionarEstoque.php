<?php
    include 'shared/conexao.php';
    include 'shared/resize_class.php';

    $id = $_POST['id'];
    $validade = $_POST['validade'];
    $quantidade = $_POST['quantidade'];

    try {
        $inserir=$cn->query("INSERT INTO estoque(idCatalogo, validadeProduto, quantidadeProduto) VALUES ('$id', '$validade', '$quantidade')");
        header('location:estoque.php');	

    }catch(PDOException $e) {
        echo $e->getMessage();
    }
?>