<?php

session_start();
if(empty($_SESSION['Status']) || $_SESSION['Status']!=1){
    header('location:index.php'); //volte para o Index
}

include 'shared/sidenav.php';
include 'shared/conexao.php';	

$consulta = $cn->query("SELECT id, validadeProduto from estoque ORDER BY validadeProduto ASC");
$consulta1 = $cn->query("SELECT id, validadeProduto from estoque ORDER BY validadeProduto ASC");

$a = 0; //vencido
$b = 0; //perto de vencer
$c = 0; //bom prazo de validade

echo "<br>";
while ($exibe = $consulta->fetch(PDO::FETCH_ASSOC)) {

    $data1 = date('Y-m-d');
    $data2 = $exibe['validadeProduto'];

    $d1 = strtotime("$data1");
    $d2 = strtotime("$data2");

    $dataFinal = ($d2 - $d1) / 86400;
    $codigo = $exibe['id'];
    $dataFinal = ceil($dataFinal);

    if($dataFinal < 0){
        $a += 1;
    }else if($dataFinal >= 0 &&  $dataFinal <= 60){
        $b += 1;
    }else{
        $c += 1;
    }
} 

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styleFAQ.css">
    <link rel="stylesheet" href="css/style.css">
    <title>ThunderSuplementos</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Vendas', 'Quantidade'],
          ['Boa validade',  <?php echo "$c";?>],
          ['Vencidos',      <?php echo "$a";?>],
          ['Proximos de vencer',      <?php echo "$b";?>]
        ]);

        var options = {
          title: 'Validade dos produtos',
          colors: ['#8ba33a','#161a2b', '#2e4264' ]
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
</head>
<body>
    <div class="geral">
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

            <div class="space">
                <p style="font-size:1.7em;">Vencimentos</p>
            </div>
            <div class="abacaxi1">
                <div id="piechart" style="width: 900px; height: 500px;"></div>
            </div>

            <details open>
                <summary>
                Sobre
                    <svg class="control-icon control-icon-expand" width="24" height="24" role="presentation"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#expand-more" /></svg>
                    <svg class="control-icon control-icon-close" width="24" height="24" role="presentation"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#close" /></svg>
                </summary>
                <p>Aqui você consegue ver todos aqueles produtos vencidos e/ou que estão perto de vencer</p>
            </details>

            <details>
                <summary>
                Produtos
                    <svg class="control-icon control-icon-expand" width="24" height="24" role="presentation"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#expand-more" /></svg>
                    <svg class="control-icon control-icon-close" width="24" height="24" role="presentation"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#close" /></svg>
                </summary>
                <?php


                    $a = 0; //vencido
                    $b = 0; //perto de vencer
                    $c = 0; //bom prazo de validade

                    echo "<br>";
                    while ($exibe1 = $consulta1->fetch(PDO::FETCH_ASSOC)) {

                        $data1 = date('Y-m-d');
                        $data2 = $exibe1['validadeProduto'];

                        $d1 = strtotime("$data1");
                        $d2 = strtotime("$data2");

                        $dataFinal = ($d2 - $d1) / 86400;
                        $codigo = $exibe1['id'];
                        $dataFinal = ceil($dataFinal);

                        if($dataFinal < 0){
                            echo "<h6 class='darkBlue'> O lote número $codigo está vencido.</h6>";
                        }else if($dataFinal >= 0 &&  $dataFinal <= 60){
                            echo "<h6 class='blue'> O lote número $codigo vence em $dataFinal dias.</h6>";
                        }else{
                            echo "<h6 class='green'> O lote número $codigo vence em $dataFinal dias.</h6>";
                        }
                    } 

                ?>
            </details>
        </div>
        <div class="space">
        </div>
    </div>
</body>
</html>