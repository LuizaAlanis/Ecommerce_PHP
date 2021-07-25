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
    </head>
    <body>	
        <?php

        session_start();

        if(($_SESSION['Status'])!= 2 && ($_SESSION['Status'])!=1){
            
            header('location:login.php'); // enviando para formlogon.php
            
        }
        include 'shared/conexao.php';	// incluindo arquivo de conexão
        include 'shared/nav.php'; // incluindo arquivo barra de navegação
        
        // verificando se o codigo do produto NÃO está vazio
        if (!empty($_GET['cd'])) {
        
        // inserindo o código do produto na variável $cd_prod
        $cd_prod=$_GET['cd'];

        // se a sessão carrinho não estiver preenchida(setada)
        if (!isset($_SESSION['carrinho'])) {
            // será criado uma sessão chamado carrinho para receber um vetor
            $_SESSION['carrinho'] = array();
        }

        // se a variavel $cd_prod não estiver setado(preenchida)
        if (!isset($_SESSION['carrinho'][$cd_prod])) {
            
            // será adicionado um produto ao carrinho
            $_SESSION['carrinho'][$cd_prod]=1;
        }
        
        // caso contrario, se ela estiver setada, adicione novos produtos
        else {
            $_SESSION['carrinho'][$cd_prod]+=1;

        }
            // incluindo o arquivo 'mostraCarrinho.php'
            include 'mostraCarrinho.php';
            
        } else {
            
            //mostrando o carrinho	vazio	
            include 'mostraCarrinho.php';

        }	
        ?>
        <div class="abacaxi1">
            <a class="links" href="index.php">Continuar Comprando</a>
        </div>
        <br><br><br>
        <div class="row text-center" style="margin-left: 10%; margin-bottom:100px;">
            <h1 style="font-size:1.2em; text-transform:uppercase; letter-spacing:2px;">Contato e endereço de entrega</h1>
        </div>
        
        <div class="container">
        
            <form method="POST" action="finalizarCompra.php" name="compra" enctype="multipart/form-data" class="form">
                    <br><br>
                    <h4>Endereço</h4>
                    <input name="endereco" type="text" class="texto" id="endereco" placeholder="Informe o endereço da entrega"> <br>
                    <h4>CEP</h4>
                    <input onkeypress="$(this).mask('00.000-000')" name="cep" type="text" class="texto" id="cep" placeholder="Informe o respectivo CEP"> <br>
                    <i><a target="_blank" href="https://buscacepinter.correios.com.br/app/endereco/index.php">Não sei o meu CEP</a></i> <br><br>
                    <h4>Telefone</h4>
                    <input onkeypress="$(this).mask('(00) 0000-00009')" name="telefone" type="text" class="texto" id="telefone" placeholder="Informe um número para contato"> <br>
                    <br><br>
                <div class="abacaxi1">
                    <h1 style="font-size:1.2em; text-transform:uppercase; letter-spacing:1px;">Total: <b> R$ <?php echo number_format($total,2,',','.'); ?> </b></h1>
                </div>
                <div class="abacaxi1">
                    <a class="links"><button type="submit" class="button2">Finalizar Compra</button></a>
                </div>
                <br><br><br>
                <div class="abacaxi1">
                    <i style="font-size:1em; color:#292929;">A forma de pagamento deve ser determinada diretamente com o vendedor!</i><br>
                </div>
            </form>
        </div>

        <?php
            include 'shared/footer.php';
        ?>

    </body>
</html>