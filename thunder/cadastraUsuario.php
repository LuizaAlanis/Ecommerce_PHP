<?php 
    include 'shared/conexao.php';

    $nome = $_POST['txtnome']; 
    $email = $_POST['txtemail']; 
    $senha = $_POST['txtsenha'];

    $consulta = $cn->query("select email from usuario where email='$email'");
    $exibe = $consulta -> fetch(PDO::FETCH_ASSOC);

    if($consulta-> rowCount() == 1){
        echo "<script language=javascript> window.alert('Email já cadastrado! tente novamente'); </script>";
        echo "<script language=javascript> window.location='login.php'; </script>";        
    } else {
        $incluir = $cn->query("
        insert into usuario(id, nome, email, senha, adm)
        values(default,'$nome','$email','$senha', 2)");
        echo "<script language=javascript> window.alert('Cadastro efetuado com sucesso!'); </script>";
        echo "<script language=javascript> window.location='login.php'; </script>";      
    }
?>