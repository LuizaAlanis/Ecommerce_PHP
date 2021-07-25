<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/styleFAQ.css">
    <link rel="stylesheet" href="css/pesquisa.css">
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


      if(!empty($_GET['txtpesquisar'])){
        $pesquisa = $_GET['txtpesquisar'];
        $consulta = $cn->query("SELECT DISTINCT ticket ticket, dataVenda from viewVenda where ticket like concat ('%','$pesquisa','%')");
        if($consulta->rowCount() == 0) echo "<html><script>location.href='shared/erro2.php'</script></html>";
    }else echo "<html><script>location.href='shared/erro2.php'</script></html>";
    ?>
    <div class="animated animatedFadeInUp fadeInUp">    
        <div class="container">
            <div class="space">
                <p style="font-size:1.7em;">Vendas</p>
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
                Pedidos
                    <svg class="control-icon control-icon-expand" width="24" height="24" role="presentation"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#expand-more" /></svg>
                    <svg class="control-icon control-icon-close" width="24" height="24" role="presentation"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#close" /></svg>
                </summary>
                <br><br>
                <p>
                
                <form class="masthead-search" role="search" name="frmpesquisa" method="GET" action="buscaVenda.php">
                    <input type="text" name="txtpesquisar" aria-labelledby="search-label" placeholder="Pesquisar&hellip;" class="draw">
                    <button type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg>
                    </button>
                </form> 
                
                </p>
                <br>
            </details>

            <details>
                <summary>
                Lista de pedidos
                    <svg class="control-icon control-icon-expand" width="24" height="24" role="presentation"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#expand-more" /></svg>
                    <svg class="control-icon control-icon-close" width="24" height="24" role="presentation"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#close" /></svg>
                </summary>
                
                </br>
                <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <th scope="col">Ticket</th>
                                <th scope="col">Data</th>
                                <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($exibe = $consulta->fetch(PDO::FETCH_ASSOC)) {?>
                                <tr>
                                <td><?php echo $exibe['ticket']; ?></td>
                                <td><?php $data = $exibe['dataVenda']; echo date('d/m/Y', strtotime($data));?></td>
                                <td><a href="visualizarCompra.php?id=<?php echo $exibe['ticket']; ?>"><button class="button2">&nbsp;&nbsp;Detalhes&nbsp;&nbsp;</button></a></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
            </details>
        
        </div>
    </div>


</body>
</html>