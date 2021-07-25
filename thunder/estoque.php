<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/pesquisa.css">
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
      
      $consulta = $cn->query("SELECT * from viewEstoque order by id asc");
  ?>  
  <div class="animated animatedFadeInUp fadeInUp">
    <div class="abacaxi">
      <div class="table-responsive">
        <table class="table">
          <thead>
            <th scope="col" colspan="9">
              <div class="subMenu">
                <h2>Estoque</h2>
                <div class="subMenuItens">
                  <table>
                      <tr class="up">
                          <td><a href="frmAdicionarEstoque.php" class="up">Cadastrar</a></td>
                          <td><a href="vencimentos.php" class="up">Vencimentos</a></td>
                      </tr>
                  </table>
                </div>
              </div>
            </th>
          </thead>
          <thead>
            <th scope="col" colspan="9">
                <form class="masthead-search" role="search" name="frmpesquisa" method="GET" action="buscaEstoque.php">
                    <input type="text" name="txtpesquisar" aria-labelledby="search-label" placeholder="Pesquisar lote&hellip;" class="draw">
                    <button type="submit">
                      <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                      <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                      </svg>
                    </button>
                </form> 
            </th>
          </thead>
          <thead>
            <tr class="up">
              <th scope="col">Lote</th>
              <th scope="col">Código</th>
              <th scope="col">Produto</th>
              <th scope="col">Quantidade</th>
              <th scope="col" colspan="2">Data de Validade</th>
              <th scope="col" colspan="2">Menu de opções</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($exibe = $consulta->fetch(PDO::FETCH_ASSOC)) {?>
            <tr>
              <td><?php echo $exibe['id']; ?></td>
              <td><?php echo $exibe['idCatalogo']; ?></td>
              <td><?php echo $exibe['nomeProduto']; ?></td>
              <td><?php echo $exibe['quantidadeProduto']; ?></td>
              <td colspan="2"><?php $data = $exibe['validadeProduto']; echo date('d/m/Y', strtotime($data));?></td>
              <td><a href="frmAlterarEstoque.php?id=<?php echo $exibe['id']; ?>" class="button3">Editar</a></td>
              <td><a href="excluirEstoque.php?id=<?php echo $exibe['id']; ?>" class="button3">Excluir</a></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</body>
</html>