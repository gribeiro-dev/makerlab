<?php

require_once __DIR__ . '/init.php';

if (isset($_SESSION['user'])) {
  $user = $_SESSION['user'];
  $perfil = $_SESSION['perfil'] ?? '';
  
  if(empty($_SESSION['imagem'])){
    $usuario = read(database(), "Usuarios", "id_usuario = ?", [$_SESSION['id']]);
    $_SESSION['imagem'] = $usuario['imagens_usuario'];
  }
  
  
  $imagemUser = $_SESSION['imagem'];
  
  if($_SESSION['imagem'] == 'padrao'){
    $imagemUser = "img/cabecalho/usuario.png";
  }

} else {
  $user = "";
  $perfil = "";
  $imagemUser = "";
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="./css/nav.css">
</head>

<body>
  <header class="header">
    <div class="header-conteudo">
      <a href="./index.php" class="logo"><img src="./img/cabecalho/logo.png" alt="Logo"></a>
      <nav>
        <ul class="menu">
          <li><a href="./index.php">Início</a></li>

          <li class="tem-submenu">
            <a href="./reservas.php">Reservas ▾</a>
            <ul class="submenu">
              <li><a href="./reservas.php?bancada=Prototipagem">Bancada de Prototipagem</a></li>
              <li><a href="./reservas.php?bancada=Corte">Bancada de Corte a Laser</a></li>
              <li><a href="./reservas.php?bancada=Robotica">Bancada de Robótica</a></li>
              <li><a href="./reservas.php?bancada=Eletronica">Bancada de eletrônica</a></li>
              <li><a href="./reservas.php?bancada=Marcenaria">Bancada de Marcenaria</a></li>
              <li><a href="./reservas.php?bancada=Quimica">Bancada de Química</a></li>
            </ul>
          </li>

          <li><a href="./quemSomos.php">Quem Somos</a></li>
          <li><a href="./projetos.php">Projetos</a></li>

          <?php if ($perfil == 'admin'): ?>
            <li><a href="./dashboard.php">Administrador</a></li>
          <?php endif; ?>
          
          <?php if ($user != ""): ?>
            <li><a href="./logout.php">Logout</a></li>
          <?php endif; ?>
        </ul>
      </nav>

      <?php if ($user != ""): ?>
        <a href="./perfil.php" class="usuario">
          <img src="<?= $imagemUser ?>" alt="Usuário" width="56px">
          Olá, <?= $user ?>
        </a>
      <?php else: ?>
        <a href="./loginUsuario.php" class="usuario">
          <img src="./img/cabecalho/usuario.png" alt="Login" width="56px">
        </a>
      <?php endif; ?>
    </div>
  </header>
</body>

</html>