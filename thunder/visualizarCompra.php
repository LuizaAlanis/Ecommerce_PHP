<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Thunder Suplementos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <script language="Javascript">
    function confirmacao(id) {
        var resposta = confirm("Deseja realmente cancelar esse pedido?");
        if (resposta == true) {
            window.location.href = "cancelarPedido.php?id="+id;
        }
    }
    </script>
</head>
<body>	
    <?php
    
    include 'shared/nav.php';
    include 'shared/conexao.php';

    $ticket = $_GET['id'];

    $consulta = $cn->query("SELECT * FROM viewVenda WHERE ticket='$ticket'");	
    $consulta1 = $cn->query("SELECT nome, email, dataVenda, endereco, cep, telefone FROM viewVenda WHERE ticket='$ticket' limit 2");
    $exibe1 = $consulta1->fetch(PDO::FETCH_ASSOC);
    $consultaTotal = $cn->query("SELECT sum(valorTotalItem) FROM venda WHERE ticket='$ticket'");	
    $total = $consultaTotal->fetch(PDO::FETCH_ASSOC);

    ?>
    <div class="container">
        <div class="animated animatedFadeInUp fadeInUp">
             <div class="space" style="text-align:center;">
                <h2>Ticket <?php echo $ticket; ?></h2><br><br>
                <i>Data da compra <?php $data = $exibe1['dataVenda']; echo date('d/m/Y', strtotime($data));?></i>
            </div><br><br>
            <div class="abacaxi1">
                <div class="base">
                    <br>
                    <div class="space" style="text-align:center;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="6rem" height="6rem" fill="currentColor" class="bi bi-cart2" viewBox="0 0 16 16">
                    <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l1.25 5h8.22l1.25-5H3.14zM5 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
                    </svg><br>
                    <i>Sobre a compra</i>
                </div>
                <br><br><br>
                <table>
                    <tr>
                        <td>Produto</td>
                        <td>Valor</td>
                        <td>Quantidade</td>
                        <td>Subtotal</td>
                    </tr>
                    <?php while ($exibe = $consulta->fetch(PDO::FETCH_ASSOC)) {?>
                    <tr>
                        <td><?php echo $exibe['nomeProduto']; ?></td>
                        <td><?php echo number_format ($exibe['valorProduto'],2,',','.'); ?></td>
                        <td><?php echo $exibe['quantidade']; ?></td>
                        <td><?php echo number_format ($exibe['valorTotalItem'],2,',','.'); ?></td>
                    </tr>
                    <?php }	?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td><b>Total</b></td>
                        
                        <td><b><?php echo number_format ($total['sum(valorTotalItem)'],2,',','.'); ?></b></td>
                    </tr>
                </table>
                <br><br><br>
                    <div class="space" style="text-align:center;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="6rem" height="6rem" fill="currentColor" class="bi bi-box-seam" viewBox="0 0 16 16">
                    <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zm3.564 1.426L5.596 5 8 5.961 14.154 3.5l-2.404-.961zm3.25 1.7l-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z"/>
                    </svg> <br>
                    <i>Sobre a destinatário</i>
                    <br><br><br>
                    <div class="abacaxi1">
                    <table style="text-align:left;">
                        <tr>
                            <td>Endereço</td>
                            <td></td>
                            <td><?php echo $exibe1['endereco'];?></td>
                        </tr>
                        <tr>
                            <td>CEP</td>
                            <td></td>
                            <td><?php echo $exibe1['cep'];?></i></td>
                        </tr>
                        <tr>
                            <td>Telefone</td>
                            <td></td>
                            <td><?php echo $exibe1['telefone'];?></td>
                        </tr>
                        <tr>
                            <td>Nome</td>
                            <td></td>
                            <td><?php echo $exibe1['nome'];?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td></td>
                            <td><?php echo $exibe1['email'];?></td>
                        </tr>
                    </table>
                    </div>
                    <div class="abacaxi1" style="width:60%; margin:10% 20%;">
                        <a href="javascript:func()" onclick="confirmacao('<?php echo $ticket;?>')"><button class="button2">Cancelar pedido</button></a>
                    </div>
                </div>
            </div>
            
        </div>
        
    </div>
    <?php include 'shared/footer.php' ?>
</body>
</html>