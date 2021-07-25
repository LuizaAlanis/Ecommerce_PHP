<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/styleFAQ.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Thunder Suplementos</title>
</head>
<body>	
    <?php
        
        session_start();
        include 'shared/conexao.php';	
        include 'shared/nav.php';
        
        $consulta = $cn->query("select * from FAQ");
    ?> 

    <div class="animated animatedFadeInUp fadeInUp">
        <div style="visibility: hidden; position: absolute; width: 0px; height: 0px;">
            <svg xmlns="http://www.w3.org/2000/svg">
            <symbol viewBox="0 0 24 24" id="expand-more">
                <path d="M16.59 8.59L12 13.17 7.41 8.59 6 10l6 6 6-6z"/><path d="M0 0h24v24H0z" fill="none"/>
            </symbol>
            <symbol viewBox="0 0 24 24" id="close">
                <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/><path d="M0 0h24v24H0z" fill="none"/>
            </symbol>
            </svg>
            </div>

            <details open>
                <summary>
                    Bem vindo a página de perguntas frequentes
                    <svg class="control-icon control-icon-expand" width="24" height="24" role="presentation"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#expand-more" /></svg>
                    <svg class="control-icon control-icon-close" width="24" height="24" role="presentation"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#close" /></svg>
                </summary>
                <p>Caso você não ache a resposta para a sua pergunta, fique a vontade para nos enviar uma mensagem <a href="contato.php">aqui</a></p>
            </details>

            <?php while ($exibe = $consulta->fetch(PDO::FETCH_ASSOC)) {?>
                <details>
                    <summary>
                    <?php echo $exibe['pergunta']; ?>
                        <svg class="control-icon control-icon-expand" width="24" height="24" role="presentation"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#expand-more" /></svg>
                        <svg class="control-icon control-icon-close" width="24" height="24" role="presentation"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#close" /></svg>
                    </summary>
                    <?php echo $exibe['resposta']; ?>
                </details>
            <?php } ?>
            
        </div>
    </div>
    <?php
        include 'shared/footer.php';
    ?>
</body>
</html>