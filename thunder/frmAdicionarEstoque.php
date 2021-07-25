<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Thunder Suplementos</title>
</head>
<body>
  <?php
        session_start();
        if(empty($_SESSION['Status']) || $_SESSION['Status']!=1){
        header('location:index.php'); //volte para o Index
        }

        include 'shared/sidenav.php';
        include 'shared/conexao.php';	
  ?>  
    <div class="animated animatedFadeInUp fadeInUp">
        <div class="abacaxi">
            <div class="base">
                <h2>Adicionar no estoque</h2></br>
                <form method="post" action="adicionarEstoque.php" name="incluiProd" enctype="multipart/form-data" class="form">
                    <input name="id" type="text" class="texto" required id="id" placeholder="Código do produto"> <br>
                    <input name="validade" type="date" class="texto" required id="validade" placeholder="Data de validade"><br>
                    <input name="quantidade" type="number" class="texto" required id="quantidade" placeholder="Quantidade"><br>     
                    <button type="submit" class="button2"> Adicionar </button><br>
                </form>
            </div>
        </div>
    </div>
</body>
</html>