<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styleFAQ.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/detalhes.css">
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

      $comando = "select * from slide";
      $resultado = mysqli_query($cnx, $comando);

      $consulta = $cn->query("select * from FAQ");
      $consulta2 = $cn->query("select * from duvida");
  ?>  

  <div class="animated animatedFadeInUp fadeInUp">
    <div class="container">

        <div class="space">
                <h2> Slides </h2>
        </div>
        <div class="grid product">
        
            <?php while($exibe = mysqli_fetch_assoc($resultado)){ ?>
           
            <div class="column-xs-12 column-md-4">
                <form method="post" action="alterarSlide.php?cd=<?php echo $exibe['id'];?>" name="incluiProd" enctype="multipart/form-data">
                    <img style="height:250px; width:250px; border-radius:500px;"" src="imagens/<?php echo $exibe['imagem'];?>">
                    <p><input type="file"accept="image/*" class="texto" name="txtfoto1" id="txtfoto1" placeholder="Foto"></p>
                    <p><button type = "submit" class="button2">Editar</button></p>
                </form>
            </div>  

            <?php } ?>
        </div>

        <div class="space">
                <h2> Perguntas Frequentes </h2>
        </div>

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
                <a href="frmAdicionarFAQ.php">Adicione novas perguntas</a>
                    <svg class="control-icon control-icon-expand" width="24" height="24" role="presentation"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#expand-more" /></svg>
                    <svg class="control-icon control-icon-close" width="24" height="24" role="presentation"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#close" /></svg>
                </summary>
                <p>Você também pode <i>editar</i> e <i>excluir</i> as perguntas existentes expostas abaixo.</p>
            </details>

            <?php while ($exibe = $consulta->fetch(PDO::FETCH_ASSOC)) {?>
            <details>
                <summary>
                <?php echo $exibe['pergunta']; ?>
                    <svg class="control-icon control-icon-expand" width="24" height="24" role="presentation"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#expand-more" /></svg>
                    <svg class="control-icon control-icon-close" width="24" height="24" role="presentation"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#close" /></svg>
                </summary>
                <br>
                <?php echo $exibe['resposta']; ?>
                <br>
                <br>
                <div style="width:70%; margin: 0 15%;">
                    <a href="frmEditarFAQ.php?id=<?php echo $exibe['id']; ?>"><button class="button2">Editar</button></a>
                    <a href="excluirFAQ.php?id=<?php echo $exibe['id']; ?>"><button class="button2">Excluir</button></a>
                </div>
            </details>
            <?php } ?>
        </div>

        <div class="space">
                <h2> Dúvidas </h2>
        </div>

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
                Veja as dúvidas de seus clientes!
                    <svg class="control-icon control-icon-expand" width="24" height="24" role="presentation"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#expand-more" /></svg>
                    <svg class="control-icon control-icon-close" width="24" height="24" role="presentation"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#close" /></svg>
                </summary>
                <p>Também serão apresentados email e telefone para possível contato com o cliente</p>
            </details>

            <?php while ($exibe2 = $consulta2->fetch(PDO::FETCH_ASSOC)) {?>

            <details>
                <summary>
                <?php echo $exibe2['duvida']; ?>
                    <svg class="control-icon control-icon-expand" width="24" height="24" role="presentation"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#expand-more" /></svg>
                    <svg class="control-icon control-icon-close" width="24" height="24" role="presentation"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#close" /></svg>
                </summary>
                <br>
                <p>
                    <svg xmlns="http://www.w3.org/2000/svg" width="2rem" height="2rem" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                    </svg> &nbsp;&nbsp;
                    <?php echo $exibe2['nome']; ?>
                </p>
                <p>
                    <svg xmlns="http://www.w3.org/2000/svg" width="2rem" height="2rem" fill="currentColor" class="bi bi-envelope-open" viewBox="0 0 16 16">
                        <path d="M8.47 1.318a1 1 0 0 0-.94 0l-6 3.2A1 1 0 0 0 1 5.4v.818l5.724 3.465L8 8.917l1.276.766L15 6.218V5.4a1 1 0 0 0-.53-.882l-6-3.2zM15 7.388l-4.754 2.877L15 13.117v-5.73zm-.035 6.874L8 10.083l-6.965 4.18A1 1 0 0 0 2 15h12a1 1 0 0 0 .965-.738zM1 13.117l4.754-2.852L1 7.387v5.73zM7.059.435a2 2 0 0 1 1.882 0l6 3.2A2 2 0 0 1 16 5.4V14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V5.4a2 2 0 0 1 1.059-1.765l6-3.2z"/>
                    </svg> &nbsp;&nbsp;
                    <?php echo $exibe2['email']; ?>
                </p>
                <p>
                    <svg xmlns="http://www.w3.org/2000/svg" width="2rem" height="2rem" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
                        <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                    </svg> &nbsp;&nbsp;
                    <?php echo $exibe2['telefone']; ?>
                </p>
                <div style="width:70%; margin: 0 15%;">
                    <a href="excluirDuvida.php?id=<?php echo $exibe2['id']; ?>"><button class="button2">Excluir</button></a>
                </div>
            </details>

            <?php } ?>

        </div>

        <div class="space">
            <h2> Alterar Senha</h2>
        </div>

        <details>
            <summary>
            Alterar senha
                <svg class="control-icon control-icon-expand" width="24" height="24" role="presentation"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#expand-more" /></svg>
                <svg class="control-icon control-icon-close" width="24" height="24" role="presentation"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#close" /></svg>
            </summary>
            <div class="abacaxi1" style="margin-top:80px;">
                <form method="post" action="alterarSenha.php" name="incluiProd" enctype="multipart/form-data" class="form">
                    <input name="senhaAtual" type="text" class="texto" required placeholder="Sua senha atual"> <br>
                    <input name="novaSenha" type="text" class="texto" required placeholder="Nova senha"> <br>
                    <input name="confirmarSenha" type="text" class="texto" required placeholder="Confirmar senha"> <br>
                    <button type="submit" class="button2"> Confirmar</button><br>
                </form>    
            </div>
        </details>

        <div class="space">
        </div>
    </div>
  </div>
</body>
</html>