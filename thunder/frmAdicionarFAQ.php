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
                <h2>Adicionar nova pergunta</h2></br>
                <form method="post" action="adicionarFAQ.php" name="incluiProd" enctype="multipart/form-data" class="form">
                    <textarea required rows="5" name="pergunta" class="textbox" placeholder="Pergunta"></textarea>     
                    <textarea required rows="5" name="resposta" class="textbox" placeholder="Resposta"></textarea>  
                    <button type="submit" class="button2"> Adicionar </button><br>
                </form>
            </div>
        </div>
    </div>
</body>
</html>