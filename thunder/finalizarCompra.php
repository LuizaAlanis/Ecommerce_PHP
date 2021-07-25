<?php

session_start();

include 'shared/conexao.php';

$data = date('Y-m-d');
$ticket = uniqid();
$idCliente = $_SESSION['ID'];
$endereco = $_POST['endereco']; 
$cep = $_POST['cep'];  
$telefone = $_POST['telefone']; 

foreach($_SESSION['carrinho'] as $cd => $qnt){
    $consulta = $cn->query("select valorProduto from catalogo where id='$cd'");
    $exibe = $consulta->fetch(PDO::FETCH_ASSOC);
    $preco = $exibe['valorProduto'];

    $inserir = $cn->query("insert into venda(ticket,idCliente,idProduto,quantidade,valorItem,dataVenda,endereco,cep,telefone) values
    ('$ticket',$idCliente,$cd,$qnt,$preco,'$data','$endereco','$cep','$telefone')");  
}
echo "<script language=javascript> window.alert('Pedido realizado com sucesso! A loja entrará em contato para confirmar os dados de entrega/pedido o mais breve possível. Thunder Suplementos agradece a preferência!'); </script>";
echo "<script language=javascript> window.location='cliente.php'; </script>";   
?>