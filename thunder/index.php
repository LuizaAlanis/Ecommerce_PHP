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
</head>
<body>

    <?php
        session_start();
        
        include 'shared/nav.php';
        include 'shared/slide.php';
        include 'shared/conexao.php';
    ?>

    <?php
 
        //Receber o número da página
        $pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);		
        $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;

        //Setar a quantidade de itens por pagina
        $qnt_result_pg = 16;

        //calcular o inicio visualização
        $inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;

        $result_produto = "SELECT id, nomeProduto, valorProduto, capaProduto FROM catalogo where exibir = 'S' LIMIT $inicio, $qnt_result_pg";
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
        //Paginção - Somar a quantidade de usuários
        $result_pg = "SELECT COUNT(id) AS num_result FROM catalogo";
        $resultado_pg = mysqli_query($cnx, $result_pg);
        $row_pg = mysqli_fetch_assoc($resultado_pg);
        //echo $row_pg['num_result'];
        //Quantidade de pagina 
        $quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);

        //Limitar os link antes depois
        $max_links = 2;
    ?>

    <div class="abacaxi1">
        <div class="paginacao">
            <?php
                echo "<a href='index.php?pagina=1'> <svg xmlns='http://www.w3.org/2000/svg' width='1.4em' height='1.4em' fill='#202020' class='bi bi-chevron-double-left' viewBox='0 0 16 16'><path fill-rule='evenodd' d='M8.354 1.646a.5.5 0 0 1 0 .708L2.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z'/><path fill-rule='evenodd' d='M12.354 1.646a.5.5 0 0 1 0 .708L6.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z'/></svg></a> &nbsp;";

                for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
                    if($pag_ant >= 1){
                        echo "<a href='index.php?pagina=$pag_ant'>$pag_ant</a> ";
                    }
                }
                    
                echo "$pagina ";

                for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
                    if($pag_dep <= $quantidade_pg){
                        echo "<a href='index.php?pagina=$pag_dep'>$pag_dep</a> ";
                    }
                }

                echo " &nbsp; <a href='index.php?pagina=$quantidade_pg'><svg xmlns='http://www.w3.org/2000/svg' width='1.4em' height='1.4em' fill='#202020' class='bi bi-chevron-double-right' viewBox='0 0 16 16'><path fill-rule='evenodd' d='M3.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L9.293 8 3.646 2.354a.5.5 0 0 1 0-.708z'/><path fill-rule='evenodd' d='M7.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L13.293 8 7.646 2.354a.5.5 0 0 1 0-.708z'/></svg></a>";	
            ?>	
        </div>
    </div>

    <?php
        include 'shared/footer.php';
    ?>
</body>
</html>