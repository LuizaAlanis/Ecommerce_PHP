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

        $cd = $_GET['id'];
        $cd2 = $_GET['id2']; //categoria
        $cd3 = $_GET['id3']; //marca
        $cd4 = $_GET['id4']; //objetivo
    
        $consulta = $cn->query("SELECT * FROM catalogo WHERE id='$cd'");	
        $exibe = $consulta->fetch(PDO::FETCH_ASSOC);
    
        $consultaCat = $cn->query("SELECT id, categoria FROM categoria where id ='$cd2' union select id, categoria FROM categoria where id !='$cd2'");
        $consultaMarca = $cn->query("SELECT id, marca FROM marca where id ='$cd3' union select id, marca FROM marca where id !='$cd3'");

        $consultaObj = $cn->query("SELECT id, objetivo FROM objetivo where id ='$cd4' union select id, objetivo FROM objetivo where id !='$cd4'");
  ?>  
    <div class="animated animatedFadeInUp fadeInUp">
        <div class="abacaxi">
            <div class="base">
                <h2>Novo produto</h2></br>
                <form method="post" action="alterarCatalogo.php?cd_altera=<?php echo $cd; ?>" name="incluiProd" enctype="multipart/form-data">
                    <input name="txtnome" type="text" class="texto" required id="txtnome" placeholder="Nome do produto" value="<?php echo $exibe['nomeProduto']; ?>" ><br>
                    <input type="text" class="texto"  name="txtpreco"  required id="txtpreco" placeholder="Preço do produto" value="<?php echo number_format ($exibe['valorProduto'],2,',','.'); ?>"><br>    
                    <textarea rows="5" class="texto" name="txtresumo" required id="txtresumo" placeholder="Descrição"><?php echo $exibe['descricao']; ?></textarea> <br>
                    <input type="file" accept="image/*" class="texto" name="txtfoto1" id="txtfoto1" placeholder="Foto"><br>
                    <img src="imagens/<?php echo $exibe['capaProduto']; ?>" width="100px" >	     
                    <select class="texto" name="sltpromo">					  				
						<!-- se o promocao == S este valor estará selecionado senão vazio -->
						<option value="S" <?=($exibe['promocao'] == 'S')?'selected':''?>>Sim</option>	<option value="N" <?=($exibe['promocao'] == 'N')?'selected':''?>>Não</option>	  
					</select><br>
                    <select class="texto" name="sltexibir">					  				
						<!-- se o exibir == S este valor estará selecionado senão vazio -->
						<option value="S" <?=($exibe['exibir'] == 'S')?'selected':''?>>Sim</option>	<option value="N" <?=($exibe['exibir'] == 'N')?'selected':''?>>Não</option>	  
					
                    </select><br>


                        <select class="texto" name="sltmarca">
                            <?php					
                                while($exibemarca = $consultaMarca->fetch(PDO::FETCH_ASSOC)){
                            ?>
                            <option value="<?php echo $exibemarca['id'];?>"><?php echo $exibemarca['marca'];?></option>;
                            <?php }	?>	
                        </select><br>


                        <select class="texto" name="sltobj">
                            <?php					
                                while($exibeObj = $consultaObj->fetch(PDO::FETCH_ASSOC)){
                            ?>
                            <option value="<?php echo $exibeObj['id'];?>"><?php echo $exibeObj['objetivo'];?></option>;
                            <?php }	?>	
                        </select><br>


                        <select class="texto" name="sltcat">
                            <?php					
                                while($exibeCat = $consultaCat->fetch(PDO::FETCH_ASSOC)){
                            ?>
                            <option value="<?php echo $exibeCat['id'];?>"><?php echo $exibeCat['categoria'];?></option>;
                            <?php }	?>	
                        </select><br>


                    <button type="submit" class="button2"> Editar </button><br>
                </form>
            </div>
        </div>
    </div>
</body>
</html>