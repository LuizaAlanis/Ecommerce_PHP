<?php

include 'shared/conexao.php';
include 'shared/rezise_class.php'; 

$cd = $_GET['cd'];  

$consulta = $cn->query("SELECT imagem FROM slide WHERE id='$cd'"); 

$exibe = $consulta->fetch(PDO::FETCH_ASSOC);

$recebe_foto1 = $_FILES['txtfoto1'];

$destino = "imagens/";

if (!empty($recebe_foto1['name'])) {

	preg_match("/\.(jpg|jpeg|png|gif){1}$/i",$recebe_foto1['name'],$extencao1); 
	$img_nome1 = md5(uniqid(time())).".".$extencao1[1];
	$upload_foto1=1;

}

else {
	
	$img_nome1=$exibe['imagem'];
	$upload_foto1=0;
	
}

try {

	$alterar = $cn->query("UPDATE slide SET imagem = '$img_nome1' WHERE id = $cd");

	if ($upload_foto1==1) {  
		move_uploaded_file($recebe_foto1['tmp_name'], $destino.$img_nome1);             
		$resizeObj = new resize($destino.$img_nome1);
		//$resizeObj -> resizeImage(900, 640, 'crop');
		$resizeObj -> saveImage($destino.$img_nome1, 100);
	}
	header('location:configuracoes.php');  // redirecionando para a pagina menu principal (se tudo der certo)

} catch(PDOException $e) {  // se exsitir algum problema, será gerado uma mensagem de erro

	echo $e->getMessage();  
}

?>
