<?php 
    include 'shared/conexao.php';

    session_start();

    $Vemail = $_POST['txtemail'];
    $Vsenha = $_POST['txtsenha'];

    //echo    $Vemail.'<br>';
    //echo    $Vsenha.'<br>';

    $consulta = $cn->query("select * from usuario where email = '$Vemail' and senha = '$Vsenha' ");

    if($consulta->rowCount() == 1){
        $exibeUsuario = $consulta->fetch(PDO::FETCH_ASSOC);
        if($exibeUsuario['adm'] == 2) {
            $_SESSION['ID'] = $exibeUsuario['id'];
            $_SESSION['Status'] = 2 ;
            header('location:index.php');
        }
        else {
            $_SESSION['ID'] = $exibeUsuario['id'];
            $_SESSION['Status'] = 1 ;
            header('location:index.php');
        }
    }
    else{
        echo "<script language=javascript> window.alert('Usuário ou senha incorretos!'); </script>";
        echo "<script language=javascript> window.location='login.php'; </script>";      
    }
?>