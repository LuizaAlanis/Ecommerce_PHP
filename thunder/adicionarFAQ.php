<?php
    include 'shared/conexao.php';

    $pergunta= $_POST['pergunta'];
    $resposta = $_POST['resposta'];

    try {
        $inserir=$cn->query("INSERT INTO FAQ(pergunta,resposta) VALUES ('$pergunta', '$resposta')");
        header('location:configuracoes.php');	

    }catch(PDOException $e) {
        echo $e->getMessage();
    }
?>