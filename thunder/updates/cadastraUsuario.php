<?php 

    require_once 'shared/conexao.php';

    session_start();

    if(isset($_POST['txtemail']) && !empty($_POST['txtemail']) && isset($_POST['txtsenha']) && !empty($_POST['txtsenha'])):


        $nome = addslashes($_POST['txtnome']); 
        $email = addslashes($_POST['txtemail']); 
        $senha = addslashes($_POST['txtsenha']);

    else:
        header("Location: login.php");
    
    endif;

    $sql = "select email from usuario where email='$email'";
    $resultado = mysqli_query($cnx, $sql);	

    if(mysqli_num_rows($resultado) == 1):
        echo "<script language=javascript> window.alert('Email já cadastrado! tente novamente'); </script>";
        echo "<script language=javascript> window.location='login.php'; </script>";        
    else:
         
        echo "$nome <br> $email <br> $senha";
        
        // $sql = " insert into usuario(nome, email, senha, adm)
        
         $sql = "INSERT INTO `Usuario`(`id`, `nome`, `email`, `senha`, `adm`) VALUES (default,'$nome','$email','$senha',2)";
        
        // values('$nome','$email','$senha', 2)";

         if (mysqli_query($cnx, $sql)):
             echo "<script language=javascript> window.alert('Cadastro efetuado com sucesso!'); </script>";
            echo "<script language=javascript> window.location='login.php'; </script>";  
         endif;    
    endif;
?>