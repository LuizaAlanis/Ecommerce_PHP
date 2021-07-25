<div class="container-fluid">
	
	<div class="row text-center" style="margin-left: 10%; margin-bottom:100px;">
		<h1 style="font-size:1.2em; text-transform:uppercase; letter-spacing:2px;">Carrinho de Compras</h1>
	</div>
	
	
	<?php
	
	$total = null; // variavel total que recebe valor nulo

    // criando um loop para sessão carrinho recebe o $cd e a quantidade
    foreach ($_SESSION['carrinho'] as $cd => $qnt)  {
    $consulta = $cn->query("SELECT * FROM catalogo WHERE id='$cd'");
    $exibe = $consulta->fetch(PDO::FETCH_ASSOC);

    $produto = $exibe['nomeProduto'];  // variável que recebe o produto
    $preco = number_format(($exibe['valorProduto']),2,',','.'); // variável que recebe o preço
    $total += $exibe['valorProduto'] * $qnt; // variável que recebe preço * quantidade
	
	?>
	
    <div class="container" style="text-align:center;">
        <table style="width:100%;">
            <tbody>
                <tr>
                    <th scope="row" style="width:25%;"><img src="imagens/<?php echo $exibe['capaProduto']; ?>" style="width:100px; height:100px"></th>
                    <td style="width:25%;"><h4 class="abacaxi1"><?php echo $produto; ?></h4></td>
                    <td style="width:25%;"><h4 class="abacaxi1">R$ <?php echo $preco; ?></h4></td>
                    <td style="width:25%;"><h4 class="abacaxi1"><?php echo $qnt; ?></h4></td>
                    <td class="abacaxi1" style="width:25%;"><h4>
                    
                    <a href="removeCarrinho.php?cd=<?php echo $cd;?>">	
                        <button class="buttonRemove">
                        <span class="glyphicon glyphicon-remove"></span>		
                        </button>
                    </a>
                    
                    </h4></td>
                </tr>
            </tbody>
        </table>
	</div>
	<?php } ?>