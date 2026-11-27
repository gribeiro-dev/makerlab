<?php

require_once __DIR__ . '/init.php';

$bancadasDisponiveis = readAll(database(), 'Bancadas', 'status_bancada = ?', ['disponivel']);

if($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['bancada'])){
    if($_GET['bancada'] == 'Prototipagem'){
        $bancadasDisponiveis = readAll(database(), 'Bancadas', 'area_bancada= ?',['Prototipagem']);
    }
    if($_GET['bancada'] == 'Corte'){
        $bancadasDisponiveis = readAll(database(), 'Bancadas', 'area_bancada= ?',['Corte e Usinagem']);
    }
    if($_GET['bancada'] == 'Robotica'){
        $bancadasDisponiveis = readAll(database(), 'Bancadas', 'area_bancada= ?',['Robótica']);
    }
    if($_GET['bancada'] == 'Eletronica'){
        $bancadasDisponiveis = readAll(database(), 'Bancadas', 'area_bancada= ?',['Eletrônica']);
    }
    if($_GET['bancada'] == 'Marcenaria'){
        $bancadasDisponiveis = readAll(database(), 'Bancadas', 'area_bancada= ?',['Marcenaria']);
    }
    if($_GET['bancada'] == 'Quimica'){
        $bancadasDisponiveis = readAll(database(), 'Bancadas', 'area_bancada= ?',['Química']);
    }
}
?>

 <li><a href="./reservas.php?bancada=Marcenaria">Bancada de Marcenaria</a></li>
              <li><a href="./reservas.php?bancada=Quimica">Bancada de Química</a></li>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservas</title>
    <link rel="stylesheet" href="./css/reservas.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <?php require_once __DIR__ . '/nav.php' ?>
    <br>
    <br>
    <br>
    <br>
    <div class="titulo">
        <h1>SERVIÇOS DE BANCADAS:</h1>
    </div>

    <div class="cards">
        <?php foreach ($bancadasDisponiveis as $b): ?>
            <div class="card">
                <img src="<?= $b['imagens_bancada'] ?>" alt="">
                <h1><?= $b['nome_bancada'] ?></h1>
                <br>
                <p><i class="bi bi-people-fill"></i> Capacidade: <?= $b['quantidade_bancada'] ?> pessoas</p>
                <br>
                <p><i class="bi bi-check-circle-fill"></i> <?= $b['primeira_vantagem'] ?></p>
                <br>
                <p><i class="bi bi-check-circle-fill"></i> <?= $b['segunda_vantagem'] ?></p>
                <br>
                <h1>R$<?= $b['preco_bancada']?> / hora</h1>
                <a href="./processaReserva.php?id=<?= $b['id_bancada'] ?>"><button class="botao-salvar">Reservar ></button></a>
            </div>
            <br>
        <?php endforeach; ?>
    </div>

</body>
<?php require_once __DIR__ . '/footer.php' ?>
</html>