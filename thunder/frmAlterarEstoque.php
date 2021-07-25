<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>ThunderSuplementos</title>
</head>
<body>
  <?php
        session_start();
        if(empty($_SESSION['Status']) || $_SESSION['Status']!=1){
        header('location:index.php'); //volte para o Index
        }

        include 'shared/sidenav.php';
        include 'shared/conexao.php';	
        
        $cd = $_GET['id'];
        $consulta = $cn->query("SELECT * FROM estoque WHERE id='$cd'");
        $exibe = $consulta->fetch(PDO::FETCH_ASSOC);
  ?>  
    <div class="animated animatedFadeInUp fadeInUp">
        <div class="abacaxi">
            <div class="base">
                <h2>Atualizar lote no estoque</h2></br>
                <form method="post" action="alterarEstoque.php?cd_altera=<?php echo $exibe['id']; ?>" name="incluiProd" enctype="multipart/form-data" class="form">
                    <br><i style="color:#7A7A7A;">

                    <label for="cdLote">Código do lote</label>
                    <input name="cdLote" type="text" class="texto" readonly value="<?php echo $exibe['id']; ?>"> <br>

                    <label for="cdProduto">Código do produto</label>
                    <input name="cdProduto" type="text" class="texto" readonly value="<?php echo $exibe['idCatalogo']; ?>"> <br>
                    
                    <label for="validade">Validade dos produtos do lote</label>
                    <input name="validade" type="text" class="texto" readonly value=" <?php $data = $exibe['validadeProduto']; echo date('d/m/Y', strtotime($data));?>"><br>
                    
                    <br></i>

                    <label for="quantidade">Quantidade de produtos</label>
                    <input name="quantidade" type="number" class="texto" required id="quantidade" placeholder="Quantidade" value="<?php echo $exibe['quantidadeProduto']; ?>"><br>     
                    
                    <button type="submit" class="button2"> Atualizar </button><br>
                </form>
            </div>
        </div>
    </div>
</body>
</html>