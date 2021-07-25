<?php

	include 'shared/conexao.php';  

	$cd=$_GET['id']; 
	$pasta = "imagens/"; 
	$consulta = $cn->query("SELECT * FROM catalogo WHERE id='$cd'");
	$exibe = $consulta->fetch(PDO::FETCH_ASSOC);
	$excluir = $cn->query("DELETE FROM catalogo WHERE id='$cd'");
	$foto1=$exibe['capaProduto'];

	if ($foto1!="") { 
		unlink($pasta.$foto1);
	}

	header('location:produtos.php');

?>