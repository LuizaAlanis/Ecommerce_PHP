<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/detalhes.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
    
        <?php	

          session_start();

            include 'shared/conexao.php';
            include 'shared/nav.php';

            if(!empty($_GET['cd'])) {
                $cd_produto = $_GET['cd'];
                $consulta = $cn->query("select * from viewProduto where id='$cd_produto'");
                $exibe = $consulta->fetch(PDO::FETCH_ASSOC);
            } else {
                header("location:index.php");
            }
?>

        <main>
  <div class="container">
    <div class="grid product">
      <div class="column-xs-12 column-md-7">
        <img src="imagens/<?php echo $exibe['capaProduto'];?>"></li>
      </div>
      <div class="column-xs-12 column-md-5">
        <h1><?php echo $exibe['nomeProduto'];?></h1>
        <h2>R$ <?php echo number_format ($exibe['valorProduto'],2,',','.');?></h2>
        <div class="description">
          <p><?php echo $exibe['descricao'];?></p>
        </div>
        <a href="carrinho.php?cd=<?php echo $exibe['id'];?>">
        <button class="add-to-cart">Comprar</button></a>
      </div>
    </div>
    <div class="grid related-products">
      <div class="column-xs-12">
        <h3>Produtos que talvez você goste</h3>
      </div>


        <?php 

            $objetivo = $exibe['objetivo'];
            $consulta1 = $cn->query("select * from viewProduto where objetivo='$objetivo' and id != $cd_produto limit 4");
            $exibe1 = $consulta1->fetch(PDO::FETCH_ASSOC);
            
            while($exibe1 = $consulta1->fetch(PDO::FETCH_ASSOC)){
        ?>

    
      <div class="column-xs-12 column-md-4">
        <img style="height:250px; width:250px;" src="imagens/<?php echo $exibe1['capaProduto'];?>">
        <a href="detalhes.php?cd=<?php echo $exibe1['id'];?>">
            <h4><?php echo $exibe1['nomeProduto'];?></h4>
            <p class="price">R$ <?php echo number_format ($exibe1['valorProduto'],2,',','.');?></p>
        </a> 
      </div>  
    
    <?php } ?>

    </div>
  </div>
</main>
<?php
        include 'shared/footer.php';
    ?>



    </body>
</html>