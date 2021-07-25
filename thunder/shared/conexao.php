<?php
    $servidor = "localhost";
    $usuario = "ThunderSuplementos";
    $senha = "123456";
    $banco = "ThunderSuplementos";
    
    $cn = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);

    $cnx = mysqli_connect($servidor, $usuario, $senha, $banco);
?>