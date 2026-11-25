<?php

    require_once __DIR__ . '/init.php';
    require_once __DIR__ . '/banco/crud.php';

    if (empty($_SESSION['id'])) {
        header("Location: loginUsuario.php");
        exit;
    }
    
    $projetoSelecionado = [];

    if (!isset($_GET['id']) || $_GET['id'] == null) {
        print("<p>Projeto não reconhecido</p>");
        exit;
    }

    $idProjeto = $_GET['id'];
    $projetoSelecionado = readAll(
        $pdo,
        "Projetos",
        "id_projeto = ? AND id_criador = ?",
        [$idProjeto, $_SESSION['id']]
    );

    if ($projetoSelecionado == null) {
        print("<p>Projeto não reconhecido ou você não tem permissão para editá-lo.</p>");
        exit;
    }

    $erros = [];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $dados = [
            'nomeProjeto' => trim($_POST['nomeProjeto'] ?? ''),
            'descricao'   => trim($_POST['descricao'] ?? ''),
            'imagem'      => trim($_POST['imagem'] ?? ''),
        ];

        // -------------- Validação dos dados (após limpar eles) -----------------

        if ($dados['nomeProjeto'] == '') {
            $erros['nome'] = 'O campo nome do projeto é obrigatório, tente novamente.';
        } elseif (strlen($dados['nomeProjeto']) > 100) {
            $erros['nome'] = 'O campo nome do projeto deve ter no máximo 100 caracteres, tente novamente.';
        } elseif (!empty(read($pdo, 'Projetos', 'nome_projeto = ? AND id_projeto <> ?', [$dados['nomeProjeto'], $idProjeto]))) {
            $erros['nome'] = 'O nome do projeto já está sendo utilizado, por favor escolha outro.';
        }

        // -----------------------------------------------------

        if ($dados['descricao'] == '') {
            $erros['descricao'] = 'O campo descrição é obrigatório, tente novamente.';
        } elseif (strlen($dados['descricao']) > 300) {
            $erros['descricao'] = 'O campo descrição deve ter no máximo 300 caracteres, tente novamente.';
        }

        // -----------------------------------------------------

        if ($dados['imagem'] !== '') {
            if (filter_var($dados['imagem'], FILTER_VALIDATE_URL) === false) {
                $erros['imagem'] = 'O campo de imagem precisa ser um link válido.';
            } elseif (strlen($dados['imagem']) > 255) {
                $erros['imagem'] = 'O link da imagem deve ter no máximo 255 caracteres.';
            }
        }

        // -----------------------------------------------------

        if ($erros === []) {
            update($pdo, 'Projetos', [
                'nome_projeto'      => $dados['nomeProjeto'],
                'descricao_projeto' => $dados['descricao'],
                'imagem_projeto'    => $dados['imagem']
            ], "id_projeto = ? AND id_criador = ?", [$idProjeto, $_SESSION['id']]);

            header('Location: perfil.php');
            exit;
        }

        $projetoSelecionado[0]['nome_projeto']      = $dados['nomeProjeto'];
        $projetoSelecionado[0]['descricao_projeto'] = $dados['descricao'];
        $projetoSelecionado[0]['imagem_projeto']    = $dados['imagem'];
    }

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MakerLab - Editar Projeto</title>
    <link rel="stylesheet" href="./css/criarProjeto.css">
</head>
<body>
    <?php require_once __DIR__ . '/nav.php'; ?>

    <main class="pagina-criar">

        <h1 class="titulo-criar">Editar Projeto</h1>

        <?php if (!empty($erros)): ?>
            <div class="erro-criar">
                <p>Corrija os campos abaixo:</p>
                <?php foreach ($erros as $mensagem): ?>
                    <p><?= htmlspecialchars($mensagem, ENT_QUOTES, 'UTF-8') ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <?php foreach ($projetoSelecionado as $projeto): ?>

            <form class="caixa-criar" action="editarProjeto.php?id=<?= urlencode($idProjeto) ?>" method="POST">

                <div class="coluna-esquerda">
                    <div class="linha-titulo">
                        <label class="rotulo-criar" for="nomeProjeto">Nome do projeto:</label>
                        <input class="campo-criar" type="text" name="nomeProjeto" id="nomeProjeto" value="<?= htmlspecialchars($projeto['nome_projeto'], ENT_QUOTES, 'UTF-8') ?>" required>
                    </div>

                    <label class="rotulo-criar" for="descricao">Escreva uma descrição para o projeto:</label>
                    <textarea class="campo-criar campo-descricao-criar" name="descricao" id="descricao" required><?= htmlspecialchars($projeto['descricao_projeto'], ENT_QUOTES, 'UTF-8') ?></textarea>
                </div>

                <div class="coluna-direita">
                    <label class="rotulo-criar" for="imagem">Cole o link da imagem:</label>
                    <input class="campo-criar campo-imagem-criar" type="text" name="imagem" id="imagem" value="<?= htmlspecialchars($projeto['imagem_projeto'], ENT_QUOTES, 'UTF-8') ?>">
                </div>

                <button class="botao-registrar" type="submit">Salvar alterações</button>
            </form>

        <?php endforeach; ?>
    </main>

    <?php require_once __DIR__ . '/footer.php'; ?>
</body>
</html>