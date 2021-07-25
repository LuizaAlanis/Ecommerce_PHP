<?php
    include 'shared/conexao.php';

    $nome= $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $duvida = $_POST['duvida'];

    try {
        $inserir=$cn->query("INSERT INTO duvida(nome,email,telefone,duvida) VALUES ('$nome','$email','$telefone','$duvida')");
        echo "<script language=javascript> window.alert('Dúvida enviada com sucesso, tentaremos ser o mais breve possivel quanto a respectiva resposta.'); </script>";
        echo "<script language=javascript> window.location='contato.php'; </script>";     
    }catch(PDOException $e) {
        echo $e->getMessage();
    }
?>