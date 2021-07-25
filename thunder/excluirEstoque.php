<?php

	include 'shared/conexao.php';  
	$id=$_GET['id'];
	$excluir = $cn->query("DELETE FROM estoque WHERE id='$id'");
	header('location:estoque.php');

?>