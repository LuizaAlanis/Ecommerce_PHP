<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/styleFAQ.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Thunder Suplementos</title>
    <style type="text/css">
    .texto{
        width:360px;
    }
    </style>
</head>
<body>	
    <?php
        
        session_start();
        include 'shared/conexao.php';	
        include 'shared/nav.php';
        
    ?> 

    <div class="animated animatedFadeInUp fadeInUp">
        <div class="abacaxi1">
            <div class="base" style="padding:60px;">
                <h2>Envie a sua dúvida</h2><br><br>
                <form method="post" action="enviarDuvida.php" name="incluiProd" enctype="multipart/form-data" class="form">     
                    <input name="nome" type="text" class="texto" required id="nome" placeholder="Seu nome completo"> <br>
                    <input name="email" type="text" class="texto" required id="email" placeholder="Email para contato"> <br>
                    <input name="telefone" type="text" class="texto" required id="telefone" placeholder="Telefone para contato"> <br>
                    <textarea rows="2" class="texto" name="duvida" required id="duvida" placeholder="Sua dúvida"></textarea> <br>
                    <button type="submit" class="button2"> Enviar </button><br>
                </form>
            </div>
        </div>
    </div>
    
    <?php
        include 'shared/footer.php';
    ?>
</body>
</html>