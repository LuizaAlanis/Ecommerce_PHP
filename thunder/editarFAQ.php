<?php
	include 'shared/conexao.php';

	$id = $_GET['id'];
	$pergunta = $_POST['pergunta'];
	$resposta = $_POST['resposta'];

	try {
	
	$alterar = $cn->query("update FAQ set  
		pergunta = '$pergunta',
		resposta = '$resposta'

	    where id = '$id' 	
	");

	header('location:configuracoes.php');
	}catch(PDOException $e) {
		echo $e->getMessage();  
	}
?>