<?php
    include 'shared/conexao.php';  // include com arquivo de conexao
    include 'shared/resize_class.php';
    //variáveis que vão receber os dados do formulário que esta na pagina formProduto

    $nomeProduto = $_POST['txtnome'];
    $preco = $_POST['txtpreco'];
    $remover1='.';  // criando variável e atribuindo o valor de ponto para ela
    $preco = str_replace($remover1, '', $preco); // removendo ponto de casa decimal,substituindo por vazio
    $remover2=','; // criando variável e atribuindo o valor de virgula para ela
    $preco = str_replace($remover2, '.', $preco); // removendo virgula de casa decimal,substituindo por ponto
    $descricao = $_POST['txtresumo'];
    $recebe_foto1 = $_FILES['txtfoto1'];
    $promocao = $_POST['sltpromo'];
    $exibir = $_POST['sltexibir'];
    $categoria = $_POST['sltcat'];  // recebendo o valor do campo select, valor numérico
    $objetivo = $_POST['sltobj'];  // recebendo o valor do campo select, valor numérico
    $marca = $_POST['sltmarca'];  // recebendo o valor do campo select, valor numérico
    
    $destino = "imagens/";  // informando para qual diretorio será enviado a imagem
    //gerando nome aleatorio para imagem
    // preg_match vai pegar imagens nas extensões jpg|jpeg|png|gif
    // do nome que esta na variavel $recebe_foto1 do parametro name e a $extensão vai receber o formato
    preg_match("/\.(jpg|jpeg|png|gif|svg){1}$/i",$recebe_foto1['name'],$extencao1);
    // a função md5 vai gerar um valor randomico  com base no horario "time"
    // incrementar o ponto e a extensão
    // função md5 é criado para gerar criptografia
    $img_nome1 = md5(uniqid(time())).".".$extencao1[1];
    try {  // try para tentar inserir	
        $inserir=$cn->query("INSERT INTO Catalogo(idMarca, idObjetivo, idCategoria, nomeProduto, capaProduto, valorProduto, descricao, exibir, promocao) VALUES ('$marca', '$objetivo', '$categoria', '$nomeProduto', '$img_nome1', '$preco', '$descricao', '$exibir', '$promocao')");
        header('location:produtos.php');	
        move_uploaded_file($recebe_foto1['tmp_name'], $destino.$img_nome1);             
        $resizeObj = new resize($destino.$img_nome1);
        $resizeObj -> resizeImage(900, 640, 'crop');
        $resizeObj -> saveImage($destino.$img_nome1, 100);
    }catch(PDOException $e) {  // se houver algum erro explodir na tela a mensagem de erro
        echo $e->getMessage();
    }
?>