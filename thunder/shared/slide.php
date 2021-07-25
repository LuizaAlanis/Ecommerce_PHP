<?php
  $comando = "select imagem from slide where id=1";
  $resultado = mysqli_query($cnx, $comando);

  $comando1 = "select imagem from slide where id!=1";
  $resultado1 = mysqli_query($cnx, $comando1);

?>


<div class="animated animatedFadeInUp fadeInUp">
  <div class="container">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>

      <!-- Wrapper for slides -->
      <div class="carousel-inner" >

        <?php while($exibe = mysqli_fetch_assoc($resultado)){ ?>

        <div class="item active">
          <img src="imagens/<?php echo $exibe['imagem'];?>" alt="imagem" style="width:100%;">
          <div class="carousel-caption">
            <!-- <h3><a href="#" ><button class="button">Comprar</button></a></h3>
            </br>
            <p>Alguma descrição sobre o produto</p> -->
          </div>
        </div>

        <?php } ?>

        <?php while($exibe1 = mysqli_fetch_assoc($resultado1)){ ?>

        <div class="item">
        <img src="imagens/<?php echo $exibe1['imagem'];?>" alt="imagem" style="width:100%;">
          <div class="carousel-caption">
            <!-- <h3><a href="#" ><button class="button">Comprar</button></a></h3>
            </br>
            <p>Alguma descrição sobre o produto</p> -->
          </div>
        </div>
    
        <?php } ?>

      </div>

      <!-- Left and right controls -->
      <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
</div>
<br><br><br><br>