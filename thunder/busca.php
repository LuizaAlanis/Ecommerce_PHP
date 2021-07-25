<!doctype html>
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
    <title>ThunderSuplementos</title>
</head>
<body>
    <?php     

        include 'shared/nav.php';
        include 'shared/slide.php';
        include 'shared/conexao.php';

        if(!empty($_GET['txtpesquisar'])){
            $pesquisa = $_GET['txtpesquisar'];
            $consulta = $cn->query("select * from viewProduto where nomeProduto like concat ('%','$pesquisa','%') or marca like concat ('%','$pesquisa','%') or objetivo like concat ('%','$pesquisa','%') or categoria like concat ('%','$pesquisa','%')");
            if($consulta->rowCount() == 0) echo "<html><script>location.href='shared/erro2.php'</script></html>";
        }else echo "<html><script>location.href='shared/erro2.php'</script></html>";
    ?>


    <div class="container">
        <div class="row">
            <?php while ($exibe = $consulta->fetch(PDO::FETCH_ASSOC)) {?>
            <div class="card">
                <img style="height:250px; width:250px;" src="imagens/<?php echo $exibe['capaProduto'] ?>" class="img-responsive"> <br>
                <div class="ajuste"><h2><b><a href="detalhes.php?cd=<?php echo $exibe['id'];?>"><?php echo mb_strimwidth($exibe['nomeProduto'],0,10,'...');?></a></b></h2></div>
                <div class="ajuste"><h3>R$ <?php echo number_format ($exibe['valorProduto'],2,',','.');?></h3></div>
                <button class="button2">Comprar</button>
            </div>
            <?php } ?>
        </div>
    </div>

    <?php
        include 'shared/footer.php';
    ?>

</body> 
</html>