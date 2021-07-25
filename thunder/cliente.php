<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styleFAQ.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/detalhes.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Thunder Suplementos</title>
</head>
<body>

    <?php
        session_start();

        if(empty($_SESSION['ID'])){ 
            header("location:login.php");
        } 

        $idCliente = $_SESSION['ID'];

        include 'shared/conexao.php';
        include 'shared/nav.php';

        $consulta = $cn->query("SELECT DISTINCT ticket ticket, dataVenda from viewVenda where idCliente = $idCliente order by dataVenda asc");
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
                Bem vindo(a) a área do cliente
                    <svg class="control-icon control-icon-expand" width="24" height="24" role="presentation"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#expand-more" /></svg>
                    <svg class="control-icon control-icon-close" width="24" height="24" role="presentation"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#close" /></svg>
                </summary>
                <br><br>
                <p>Visualize todas as suas compras! você também pode atualizar a sua senha se desejar</p>
                <br>
            </details>

            <details>
                <summary>
                Minhas compras
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
        </div>
    <?php
        include 'shared/footer.php';
    ?>
</body>
</html>