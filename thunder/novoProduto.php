<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>ThunderSuplementos</title>
</head>
<body>
  <?php
        session_start();
        if(empty($_SESSION['Status']) || $_SESSION['Status']!=1){
        header('location:index.php'); //volte para o Index
        }

        include 'shared/sidenav.php';
        include 'shared/conexao.php';	

        $consulta = $cn->query("SELECT * from viewProduto");
        $consultaCategoria = $cn->query("select * from categoria");
        $consultaObjetivo = $cn->query("select * from objetivo");
        $consultaMarca = $cn->query("select * from marca");
  ?>  
    <div class="animated animatedFadeInUp fadeInUp">
        <div class="abacaxi">
            <div class="base">
                <h2>Novo produto</h2></br>
                <form method="post" action="insprod.php" name="incluiProd" enctype="multipart/form-data" class="form">
                    <input name="txtnome" type="text" class="texto" required id="txtnome" placeholder="Nome do produto"><br>
                    <input type="text" class="texto"  name="txtpreco"  required id="txtpreco" placeholder="Preço do produto"><br> 
                    <textarea rows="5" class="texto" name="txtresumo" placeholder="Descrição"></textarea> <br>
                    <input type="file" accept="image/*" class="texto" name="txtfoto1" required id="txtfoto1" placeholder="Foto"><br>     
                    <select class="texto" name="sltpromo">
                        <option value="">Promoção?</option>
                        <option value="S">Sim</option>
                        <option value="N">Não</option>					  
                    </select><br>
                    <select class="texto" name="sltexibir">
                        <option value="">Exibir?</option>
                        <option value="S">Sim</option>
                        <option value="N">Não</option>					  
                    </select><br>
                    <select class="texto" name="sltcat">
                        <option value="">Categoria</option>
                        <?php
                        while($listaCategoria = $consultaCategoria -> fetch(PDO::FETCH_ASSOC)) { ?>
                        <option value="<?php echo $listaCategoria['id'] ?>"><?php echo $listaCategoria['categoria'] ?></option>	
                        <?php } ?>				
                    </select><br>
                    <select class="texto" name="sltobj">
                        <option value="">Objetivo</option>
                        <?php
                        while($listaObjetivo = $consultaObjetivo -> fetch(PDO::FETCH_ASSOC)) { ?>
                        <option value="<?php echo $listaObjetivo['id'] ?>"><?php echo $listaObjetivo['objetivo'] ?></option>	
                        <?php } ?>				
                    </select><br>
                    <select class="texto" name="sltmarca">
                        <option value="">Marca</option>
                        <?php
                        while($listaMarca = $consultaMarca -> fetch(PDO::FETCH_ASSOC)) { ?>
                        <option value="<?php echo $listaMarca['id'] ?>"><?php echo $listaMarca['marca'] ?></option>	
                        <?php } ?>				
                    </select><br>
                    <button type="submit" class="button2"> Adicionar </button><br>
                </form>
            </div>
        </div>
    </div>
</body>
</html>