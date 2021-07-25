<?php

    include 'shared/conexao.php';
    $id=$_GET['id'];
    $excluir = $cn->query("DELETE FROM FAQ WHERE id='$id'");
    header('location:configuracoes.php');

?>