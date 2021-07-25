<?php

    include 'shared/conexao.php';
    $id=$_GET['id'];
    $excluir = $cn->query("DELETE FROM duvida WHERE id='$id'");
    header('location:configuracoes.php');

?>