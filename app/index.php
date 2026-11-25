<?php



declare(strict_types=1);



require_once __DIR__ . '/init.php';



$recomendacoes = readAll(database(), "Recomendacoes");


?>

<!DOCTYPE html>

<html lang="pt-BR">

<head>


  <meta charset="UTF-8">


  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Makerlab</title>


  <link rel="stylesheet" href="./css/index.css">

</head>

<body>

  <?php require_once __DIR__ . '/nav.php' ?>

  <section class="hero">

    <div class="hero-conteudo">

      <div class="hero-texto">

        <h1>Transforme Suas Ideias<br>em <span>Realidade</span></h1>

        <p>

          Um espaço maker completo com prototipagem 3D, corte a laser,

          usinagem CNC e bancadas de eletrônica. Tudo isso na palma da sua mão.

        </p>

        <a href="./reservas.php" class="botao">Reserve conosco →</a>

      </div>

    </div>

    <span class="marca"><img src="./img/cabecalho/logo.png" alt=""></span>

  </section>

  <br>

  <br>

  <br>

  <br>

  <section class="sobre">

    <div class="sobre-conteudo">



      <div class="sobre-imagem">

        <img src="./img/index/sobre.jpg" alt="Laboratório Makerlab">

      </div>



      <div class="sobre-lado">

        <p class="sobre-texto">

          Um ecossistema completo onde ideias abstratas ganham forma.

          Nosso MakerLab foi projetado para impulsionar a criatividade,

          acelerar a prototipagem e transformar projetos em soluções reais.

        </p>



        <div class="areas">

          <div class="area">

            <img src="./img/index/arduino.png" alt="Eletrônica e Robótica">

            <p>Eletrônica &amp;<br>Robótica</p>

          </div>

          <div class="area">

            <img src="./img/index/impressora.png" alt="Prototipagem 3D">

            <p>Prototipagem<br>3D</p>

          </div>

          <div class="area">

            <img src="./img/index/bancada.png" alt="Corte e Usinagem">

            <p>Corte &amp;<br>Usinagem</p>

          </div>

          <div class="area">

            <img src="./img/index/bancadaMadeira.png" alt="Bancadas Multiuso">

            <p>Bancadas<br>Multiuso</p>

          </div>

        </div>

      </div>



    </div>

  </section>

  <br>

  <br>

  <br>

  <section class="reservar">

    <div class="reservar-conteudo">

      <h2 class="reservar-titulo">COMO RESERVAR?</h2>



      <div class="passos">



        <div class="passo-intro">

          <h3>Reserve em 3 passos!</h3>

          <p>É simples, rápido, seguro e em poucos passos você reserva seu espaço.</p>

        </div>



        <div class="passo">

          <img src="./img/index/um.png" alt="Passo 1" class="icone-passo">

          <h3>Busque o espaço</h3>

          <p>Encontre a bancada ou equipamento perfeito para seu projeto</p>

        </div>



        <div class="passo">

          <img src="./img/index/dois.png" alt="Passo 2" class="icone-passo">

          <h3>Escolha os horários disponíveis</h3>

          <p>Verifique a disponibilidade e confirme a reserva.</p>

        </div>



        <div class="passo">

          <img src="./img/index/tres.png" alt="Passo 3" class="icone-passo">

          <h3>Pronto!</h3>

          <p>Receba a confirmação e aproveite o seu espaço</p>

        </div>

      </div>

    </div>

  </section>



  <div>

    <h2 class="titulo-recomendacao">Quem projeta, <strong> recomenda!</strong> </h2>

  </div>




  <div class="carousel">

    <div class="containerRecomendacoes">



      <?php foreach ($recomendacoes as $comentario): ?>



        <div class="cardComentario">



          <div class="estrelas">

            <?php

             
             
             
             
             
             
             
             
             
             
            for ($i = 0; $i < 5; $i++) {

               
               
               
               
               
               
               
               
               
               
               
               
              echo $i < $comentario["estrelas"] ? "★" : "☆";

               
               
               
               
               
               
               
               
               
               
            }

             
             
             
             
             
             
             
             
             
              ?>

          </div>




          <p>

            <?= $comentario["texto"] ?>

          </p>




          <strong>

            <?= $comentario["autor"] ?>

          </strong>



          <p>
            <!---- Ta vendo essa parte que fica ali embaixo do autor, esse p vazio serve pra ficar esse espaco-->



          </p>



        </div>



      <?php endforeach; ?>



      <?php foreach ($recomendacoes as $comentario): ?>



        <div aria-hidden="true" class="cardComentario">



          <div class="estrelas">

            <?php
            for ($i = 0; $i < 5; $i++) {

              echo $i < $comentario["estrelas"] ? "★" : "☆";
            }
              ?>

          </div>



          <p>

            <?= $comentario["texto"] ?>

          </p>




          <strong>

            <?= $comentario["autor"] ?>

          </strong>



          <p>
            <!---- Ta vendo essa parte que fica ali embaixo do autor, esse p vazio serve pra ficar esse espaco-->



          </p>



        </div>



      <?php endforeach; ?>



    </div>

  </div>



  <?php require_once __DIR__ . '/footer.php' ?>

</body>

</html>