<?php 
    require_once 'shared/conexao.php';

    session_start();

    $Vemail = mysqli_escape_string($cnx, $_POST['txtemail']);
    $Vsenha = mysqli_escape_string($cnx, $_POST['txtsenha']);

    $sql = "select * from `Usuario` where `email` = '$Vemail' and `senha`='$Vsenha'";
    
    $resultado = mysqli_query($cnx, $sql);	

    if(mysqli_num_rows($resultado) == 1):

        $dados = mysqli_fetch_array($resultado);
        mysqli_close($cnx);
        $_SESSION['logado'] = true;
        $_SESSION['ID'] = $dados['id'];

        if($dados['adm'] == 2):
            $_SESSION['Status'] = 2 ;
        else:
            $_SESSION['Status'] = 1 ;
        endif;

        header('location:index.php');
    
        else:
            echo "<script language=javascript> window.alert('Usuário ou senha incorretos!'); </script>";
            echo "<script language=javascript> window.location='login.php'; </script>";  
    endif;
    
?>