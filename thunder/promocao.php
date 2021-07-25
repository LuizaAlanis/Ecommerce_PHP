<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <title>Thunder Suplementos</title>
    <style type="text/css">
    </style>
</head>
<body>
    <?php
        include 'shared/nav.php';
        include 'shared/slide.php';
        include 'shared/conexao.php';
    ?>

    <?php
        $result_produto = "SELECT id, nomeProduto, valorProduto, capaProduto FROM viewProduto where promocao = 'S'";
        $resultado_produto = mysqli_query($cnx, $result_produto);
    ?>

    <div class="container">
        <div class="row">
            <?php while($exibe = mysqli_fetch_assoc($resultado_produto)){ ?>
            <div class="card">
                <img style="height:250px; width:250px;" src="imagens/<?php echo $exibe['capaProduto'] ?>" class="img-responsive"> <br>
                <div class="ajuste"><h2><b><a href="detalhes.php?cd=<?php echo $exibe['id'];?>"><?php echo mb_strimwidth($exibe['nomeProduto'],0,10,'...');?></a></b></h2></div>
                <div class="ajuste"><h3>R$ <?php echo number_format ($exibe['valorProduto'],2,',','.');?></h3></div>
                <a href="carrinho.php?cd=<?php echo $exibe['id'];?>"><button class="button2">Comprar</button></a>
            </div>
            <?php } ?>
        </div>
    </div>

    <?php
        include 'shared/footer.php';
    ?>
</body>
</html>