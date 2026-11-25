<?php

    require_once __DIR__ . '/init.php';

    require_once __DIR__ . '/banco/crud.php';

    if (isset($_SESSION['id'])) {
        $userAtual = read(database(), "Usuarios", "id_usuario = {$_SESSION['id']}");
        if($userAtual['perfil'] != "admin" || !isset($userAtual)){
            header("Location: index.php");
            exit;
        }
    }else{
        header("Location: index.php");
        exit;
    };


    $bancadaSelecionada = [];   

    
    
    if(!isset( $_GET['id']) || $_GET['id'] == null){
        print("<p>Bancada não reconhecida</p>");
        }
        


    if($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['id'])){
        $idBancada = $_GET['id'];  
        $bancadaSelecionada = readAll($pdo, "Bancadas", "id_bancada={$idBancada}");
        if ($bancadaSelecionada == null){
            print("<p>Bancada não reconhecida</p>");
            exit;
        }
    }

    $ehLink = null;
    if(filter_var($bancadaSelecionada[0]['imagens_bancada'], FILTER_VALIDATE_URL) === false){
        $ehLink = false;
    }else{
        $ehLink = true;
    }



    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        $erros = [];

        $dados = [
            'nomeBancada'      => trim($_POST['nomeBancada'] ?? ''),
            'descricao'        => trim($_POST['descricao'] ?? ''),
            'quantidade'       => trim($_POST['quantidade'] ?? ''),
            'primeiraVantagem' => trim($_POST['vantagem1'] ?? ''),
            'segundaVantagem'  => trim($_POST['vantagem2'] ?? ''),
            'imagem'           => trim($_POST['imagem'] ?? ''),
            'preco'            => str_replace(',', '.', trim($_POST['valorHora'] ?? '')),
            'status'           => trim($_POST['statusBancada'] ?? 'disponivel'),
            'area'             => trim($_POST['area'] ?? ''),
        ];

        // -------------- Validação dos dados (apos limpar eles) -----------------

        if ($dados['nomeBancada'] == '') {
            $erros['nome'] = 'O campo nome da bancada é obrigatório, tente novamente.';
        } elseif (strlen($dados['nomeBancada']) > 100) {
            $erros['nome'] = 'O campo nome da bancada deve ter no máximo 100 caracteres, tente novamente.';
        } elseif (read( $pdo, 'Bancadas', 'nome_bancada = ? AND id_bancada <> ?', [$dados['nomeBancada'], $_GET['id']]) !== false) {
            $erros['nome'] = 'O nome da bancada já está sendo utilizado, por favor escolha outro.';
        }

        // -----------------------------------------------------

        if ($dados['descricao'] == '') {
            $erros['descricao'] = 'O campo descrição é obrigatório, tente novamente.';
        } elseif (strlen($dados['descricao']) > 300) {
            $erros['descricao'] = 'O campo descrição deve ter no máximo 300 caracteres, tente novamente.';
        }

        // -----------------------------------------------------

        if ($dados['quantidade'] == '') {
            $erros['quantidade'] = 'O campo quantidade é obrigatório, tente novamente.';
        } elseif ($dados['quantidade'] < 0) {
            $erros['quantidade'] = 'O campo quantidade deve ser um número positivo, tente novamente.';
        } elseif ($dados['quantidade'] > 16) {
            $erros['quantidade'] = 'O campo quantidade deve ter no máximo 16 pessoas, tente novamente.';
        }

        // -----------------------------------------------------

        if ($dados['primeiraVantagem'] == '') {
            $erros['primeiraVantagem'] = 'O primeiro campo de vantagem é obrigatório, tente novamente.';
        } elseif (strlen($dados['primeiraVantagem']) > 30) {
            $erros['primeiraVantagem'] = 'O primeiro campo de vantagem deve ter no máximo 30 caracteres, tente novamente.';
        }

        // -----------------------------------------------------

        if ($dados['segundaVantagem'] == '') {
            $erros['segundaVantagem'] = 'O segundo campo de vantagem é obrigatório, tente novamente.';
        } elseif (strlen($dados['segundaVantagem']) > 30) {
            $erros['segundaVantagem'] = 'O segundo campo de vantagem deve ter no máximo 30 caracteres, tente novamente.';
        }

        // -----------------------------------------------------
        if($ehLink){
            if ($dados['imagem'] === '') {
                $erros['imagem'] = 'O campo de imagem é obrigatório.';
            } elseif (filter_var($dados['imagem'], FILTER_VALIDATE_URL) === false) {
                $erros['imagem'] = 'O campo de imagem precisa ser um link válido.';
            } elseif (strlen($dados['imagem']) > 255) {
                $erros['imagem'] = 'O link da imagem deve ter no máximo 255 caracteres.';
            }
        }

        // -----------------------------------------------------
        
        $preco = filter_var($dados['preco'], FILTER_VALIDATE_FLOAT);

        if ($dados['preco'] === '') {
            $erros['preco'] = 'O campo de preço é obrigatório, tente novamente.';
        } elseif ($preco === false || $preco < 0) {
            $erros['preco'] = 'O campo de preço precisa ser um número com valor positivo, tente novamente.';
        }

        // -----------------------------------------------------

        if ($dados['status'] != 'disponivel' && $dados['status'] != 'manutencao') {
            $erros['status'] = 'O campo de status deve ser preenchido corretamente com os valores padrões, tente novamente.';
        }

        // -----------------------------------------------------

        if ($dados['area'] == '') {
            $erros['area'] = 'O campo de área é obrigatório, tente novamente.';
        } elseif (strlen($dados['area']) < 5) {
            $erros['area'] = 'O campo de área deve ser preenchido com no mínimo 5 caracteres, tente novamente.';
        }

        if ($erros === []) {
            if($ehLink){
                update($pdo, 'Bancadas', [
                    'nome_bancada'      => $dados['nomeBancada'],
                    'descricao_bancada' => $dados['descricao'],
                    'quantidade_bancada'=> $dados['quantidade'],
                    'primeira_vantagem' => $dados['primeiraVantagem'],
                    'segunda_vantagem'  => $dados['segundaVantagem'],
                    'imagens_bancada'   => $dados['imagem'],
                    'preco_bancada'     => $dados['preco'],
                    'status_bancada'    => $dados['status'],
                    'area_bancada'      => $dados['area']
                    ], "id_bancada = ?", [$_GET['id']]);
                }else{
                    update($pdo, 'Bancadas', [
                        'nome_bancada'      => $dados['nomeBancada'],
                        'descricao_bancada' => $dados['descricao'],
                        'quantidade_bancada'=> $dados['quantidade'],
                        'primeira_vantagem' => $dados['primeiraVantagem'],
                        'segunda_vantagem'  => $dados['segundaVantagem'],
                        'preco_bancada'     => $dados['preco'],
                        'status_bancada'    => $dados['status'],
                        'area_bancada'      => $dados['area']
                        ], "id_bancada = ?", [$_GET['id']]);
                }
                        
        }
                    header('Location: dashboard.php');
                    exit;
        }
    
        
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MakerLab - Editar Bancada</title>
    <link rel="stylesheet" href="css/navAdm.css">
    <link rel="stylesheet" href="css/dashboard.css">
</head>
<body>
    <header>    
        
        <nav class="sidebar">
            <div class="sidebar-content">
                
                <div class="logo">
                    <a href="index.php"><img src="img/cabecalho/logo.png" alt=""></a>
                </div>
                
                <a href="./dashboard.php" class="item">
                    <img src="./img/icons/pen_branco.png" alt="" class="icone">
                    <span>Dashboard</span>
                </a>
                
                <a href="./adicionarFerramenta.php" class="item">
                    <img src="./img/icons/plus_branco.png" alt="" class="icone">
                    <span>Ferramenta</span>
                </a>
                
                <a href="./adicionarBancada.php" class="item ativo">
                    <img src="./img/icons/plus_roxo.png" alt="" class="icone">
                    <span>Bancada</span>
                </a>
                
                <a href="./historicoReservas.php" class="item">
                    <img src="./img/icons/folder_branco.png" alt="" class="icone">
                    <span>Reservas</span>
                </a>
            </div>
        </nav>
    </header>
    
    <main class="conteudo pagina-formulario">

        <h1 class="titulo-formulario">Editar Bancada</h1>

        <?php if (isset($erros)): ?>
            <div class="erros">
                <p>Corrija os campos abaixo:</p>
                <ul>
                    <?php foreach ($erros as $mensagem): ?>
                        <li><?= ($mensagem) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <?php foreach($bancadaSelecionada as $bancadas): ?>

            <form class="formulario" action="" method="POST">

                <div class="coluna">
                    <label class="rotulo" for="nomeBancada">Nome da bancada:</label>
                    <input class="campo" type="text" name="nomeBancada" id="nomeBancada" value="<?= $bancadas['nome_bancada'] ?>" required>

                    <label class="rotulo" for="quantidade">Será para quantas pessoas?</label>
                    <input class="campo campo-numero" type="number" name="quantidade" id="quantidade" value="<?= $bancadas['quantidade_bancada'] ?>">

                    <p class="rotulo">Digite em forma listada as vantagens para aparecer no card:</p>
                    <ol class="lista-vantagens">
                        <li><input class="campo" type="text" name="vantagem1" placeholder="Ex: Arduino e sensores..." value="<?= $bancadas['primeira_vantagem'] ?>"></li>
                        <li><input class="campo" type="text" name="vantagem2" placeholder="Ex: Pc's e notebooks..." value="<?= $bancadas['segunda_vantagem'] ?>"></li>
                    </ol>

                    <label class="rotulo" for="area">Escreva a área da bancada:</label>
                    <input class="campo" type="text" name="area" id="area" value="<?= $bancadas['area_bancada'] ?>" required>
                </div>

                <div class="coluna">
                    <label class="rotulo" for="descricao">Escreva uma descrição da bancada</label>
                    <textarea class="campo campo-descricao" name="descricao" id="descricao" required><?= $bancadas['descricao_bancada'] ?></textarea>

                    <p class="rotulo">Digite o valor por hora:</p>
                    <div class="linha-valor">
                        <label class="rotulo-valor" for="valorHora">R$:</label>
                        <input class="campo campo-numero" type="number" name="valorHora" id="valorHora" step="0.50" placeholder="Use virgula ao digitar" value="<?= $bancadas['preco_bancada'] ?>" required>
                    </div>

                    <p class="rotulo">Escolha o status da bancada: </p>
                    <div class="opcoes-status">
                        <input class="radio" type="radio" id="disponivel" name="statusBancada" value="disponivel"
                            <?php if ($bancadas['status_bancada'] == "disponivel") { echo "checked"; } ?>>
                        <label class="opcao" for="disponivel">Disponível</label>

                        <input class="radio" type="radio" id="manutencao" name="statusBancada" value="manutencao"
                            <?php if ($bancadas['status_bancada'] == "manutencao") { echo "checked"; } ?>>
                        <label class="opcao" for="manutencao">Manutenção</label>
                    </div>

                    <?php if ($ehLink == true):?>
                        <label class="rotulo" for="imagem">Cole o link da imagem</label>
                        <input class="campo campo-imagem" type="text" name="imagem" id="imagem" value="<?= $bancadas['imagens_bancada'] ?>" required>
                    <?php endif;?>
                    

                    <button class="botao-registrar" type="submit">Registrar</button>
                </div>

            </form>

        <?php endforeach; ?>
    </main>
</body>
</html>