<?php

    include 'shared/conexao.php';
    $ticket=$_GET['id'];
    $data = date('Y-m-d');

    $excluir = $cn->query("DELETE FROM venda WHERE ticket='$ticket'");
    $inserir = $cn->query("insert into vendaCancelada(dataCancelamento)values('$data')");

    session_start();

    if($_SESSION['Status'] == 1){
        echo "<script language=javascript> window.alert('A venda do ticket n° $ticket foi cancelada!'); </script>";
        echo "<script language=javascript> window.location='dashboard.php'; </script>";   

    } else if($_SESSION['Status'] == 2){
        echo "<script language=javascript> window.alert('A venda do ticket n° $ticket foi cancelada!'); </script>";
        echo "<script language=javascript> window.location='cliente.php'; </script>";   
    }
    
?>
