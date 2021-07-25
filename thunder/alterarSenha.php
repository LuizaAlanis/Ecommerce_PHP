<?php

    include 'shared/conexao.php';
    session_start();

    $idUsuario = $_SESSION['ID'];
    $senhaAtual = $_POST['senhaAtual'];
    $novaSenha = $_POST['novaSenha'];
    $confirmarSenha = $_POST['confirmarSenha'];

    $consulta = $cn->query("select senha from usuario where id = '$idUsuario' and senha = '$senhaAtual' ");

    if($consulta->rowCount() == 1){

        if($novaSenha == $confirmarSenha) {
            try {
                $alterar = $cn->query("UPDATE usuario SET senha = '$novaSenha' WHERE id = $idUsuario");
                echo "<script language=javascript> window.alert('Senha alterada com sucesso!'); </script>";
                echo "<script language=javascript> history.back(); </script>";   
            } catch(PDOException $e) {
                echo $e->getMessage();  
            }
        }
        else {
            echo "<script language=javascript> window.alert('As senhas não coincidem!'); </script>";
            echo "<script language=javascript> history.back(); </script>";   
        }
    }
    else{
        echo "<script language=javascript> window.alert('Senha atual incorreta!'); </script>";
        echo "<script language=javascript> history.back(); </script>";      
    }

?>
