<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/nav.css">
</head>
<body>
<?php
  include 'shared/conexao.php';
?>
  <script src="js/nav.js"></script>

<div class="hero">
    <header id="masthead" role="banner">
      <div class="container">
        <button class="hamburger hamburger--boring" type="button">
          <span class="hamburger-box">
            <span class="hamburger-inner"></span>
          </span>
          <span class="hamburger-label"><h1><a href="index.php">Thunder </br> Suplementos </a></h1></span>
        </button>      
        <nav id="site-nav" role="navigation">
 
          <div class="col">
            <h4>Categoria</h4>
            <ul>
              <li><a href="categoria.php?cat=Proteínas">Proteínas</a></li>
              <li><a href="categoria.php?cat=Carboidratos">Carboidratos</a></li>
              <li><a href="categoria.php?cat=Aminoácidos">Aminoácidos</a></li>
              <li><a href="categoria.php?cat=Vitaminas">Vitaminas</a></li>
              <li><a href="categoria.php?cat=Termogênicos">Termogênicos</a></li>
              <li><a href="categoria.php?cat=Outro">Outro</a></li>
              <li><a href="index.php"><b>Todos os produtos</b></a></li>
            </ul>            
          </div>
          <div class="col">
            <h4>Objetivo</h4>
            <ul>
              <li><a href="objetivo.php?obj=Massa muscular">Massa muscular</a></li>
              <li><a href="objetivo.php?obj=Energia e resistência">Energia e resistência</a></li>
              <li><a href="objetivo.php?obj=Saúde e bem-estar">Saúde e bem-estar</a></li>
              <li><a href="objetivo.php?obj=Emagrecimento">Emagrecimento</a></li>
              <li><a href="index.php"><b>Todos os produtos</b></a></li>
            </ul> 
          </div>
          <div class="col">
            <h4>Marca</h4>
            <ul>
              <li><a href="marca.php?marca=Fitpharma">Fitpharma</a></li>
              <li><a href="marca.php?marca=Integralmedica">Integralmedica</a></li>
              <li><a href="marca.php?marca=Iridium labs">Iridium labs</a></li>
              <li><a href="marca.php?marca=Max titaniun">Max titaniun</a></li>
              <li><a href="marca.php?marca=Muscle pharm">Muscle pharm</a></li>
              <li><a href="marca.php?marca=Muscletech">Muscletech</a></li>
              <li><a href="marca.php?marca=Nutrata">Nutrata</a></li>
              <li><a href="marca.php?marca=Optimum nutrition">Optimum nutrition</a></li>
              <li><a href="marca.php?marca=Proteína pura">Proteína pura</a></li>
              <li><a href="index.php"><b>Todos os produtos</b></a></li>
            </ul>    
         
          </div>
          <div class="col">
            <h4>Loja</h4>
            <ul>

            <?php if(empty ($_SESSION['ID'])) { ?>
            <li>
                <a href="login.php">Login e cadastro</a>
            </li>
        <?php } else {
            if($_SESSION['Status'] == 2) {
                $consulta_usuario = $cn->query("select nome from usuario where id = '$_SESSION[ID]'");
                $exibe_usuario = $consulta_usuario->fetch(PDO::FETCH_ASSOC);
        ?>
            <li><a href="cliente.php">Olá <?php echo $exibe_usuario['nome']; ?></a></li>
            <li><a href="sair.php">Sair</a></li>
        <?php } else if($_SESSION['Status'] == 1){ ?>
            <li><a href="dashboard.php">Área do admistrador</a></li>
        <?php } } ?>



              <li><a href="faq.php">Perguntas frequentes</a></li>
              <li><a href="contato.php">Contato</a></li>
              <li><a href="promocao.php"><b>Produtos em promoção</b> </a></li>
              <li><br></li>
              <?php if (isset($_SESSION['carrinho'])) { ?>
              <li><b><a href="carrinho.php?cd=0">
              <svg xmlns="http://www.w3.org/2000/svg" width="3.6em" height="3.6rem" fill="currentColor" class="bi bi-cart2" viewBox="0 0 16 16">
                <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l1.25 5h8.22l1.25-5H3.14zM5 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
              </svg>      
              CARRINHO</a></b></li>
              <?php } ?>
            </ul>               
          </div>
          <div class="col">
            
            <ul>
              <li><i>Procurando um produto especifico?</i></li>
              </br></br></br>
              <li>
              <form id="masthead-search" role="search" name="frmpesquisa" method="GET" action="busca.php">
                <input type="text" name="txtpesquisar" aria-labelledby="search-label" placeholder="Pesquisar&hellip;" class="draw">
                <button type="submit">&rarr;</button>
              </form> 
              </li>
            </ul> 
          </div>
      </nav>
    </div>
  </header>
</div>

</body>
</html>