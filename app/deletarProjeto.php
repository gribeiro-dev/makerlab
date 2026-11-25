<?php   
    require_once __DIR__ . "/init.php";

    if (isset($_SESSION['id'])) {
        $userAtual = read(database(), "Usuarios", "id_usuario = {$_SESSION['id']}");
        if (!isset($userAtual) || $userAtual == null) {
            header("Location: index.php");
            exit;
        }
    } else {
        header("Location: index.php");
        exit;
    }

    $projetoAtual = [];
    
    if (!isset($_GET['id']) || $_GET['id'] == null) {
        print("<p>Projeto não reconhecido</p>");
    }

    if ($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['id'])) {
        $idProjeto = $_GET['id'];  
        $projetoAtual = read(database(), "Projetos", "id_projeto = ? AND id_criador = ?", [$idProjeto, $_SESSION['id']]);
        if ($projetoAtual == null) {
            print("<p>Projeto não reconhecido</p>");
            exit;
        }
    }  

    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['id'])) {
        $idProjeto = $_POST['id'];  
        update(database(), "Projetos", [
            "nome_projeto"      => "",
            "descricao_projeto" => "",
            "imagem_projeto"    => ""
        ], "id_projeto = ? AND id_criador = ?", [$idProjeto, $_SESSION['id']]);
        header("Location: perfil.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MakerLab - Deletar Projeto</title>
    <link rel="stylesheet" href="./css/criarProjeto.css">
</head>
<body>
    <?php require_once __DIR__ . '/nav.php'; ?>

    <main class="pagina-criar">

        <h1 class="titulo-criar">Deletar Projeto</h1>

        <form class="caixa-criar" action="" method="POST">
            <input type="hidden" name="id" value="<?= htmlspecialchars((string) $idProjeto, ENT_QUOTES, 'UTF-8') ?>">

            <div class="coluna-esquerda">
                <div class="linha-titulo">
                    <label class="rotulo-criar">Nome do projeto:</label>
                    <input class="campo-criar" value="<?= htmlspecialchars($projetoAtual['nome_projeto'], ENT_QUOTES, 'UTF-8') ?>" readonly>
                </div>

                <label class="rotulo-criar">Descrição do projeto:</label>
                <textarea class="campo-criar campo-descricao-criar" readonly><?= htmlspecialchars($projetoAtual['descricao_projeto'], ENT_QUOTES, 'UTF-8') ?></textarea>
            </div>

            <div class="coluna-direita">
                <label class="rotulo-criar">Link da imagem:</label>
                <input class="campo-criar campo-imagem-criar" value="<?= htmlspecialchars($projetoAtual['imagem_projeto'], ENT_QUOTES, 'UTF-8') ?>" readonly>
            </div>

            <button class="botao-registrar botao-deletar" type="submit">Deletar Projeto</button>
        </form>

    </main>

    <?php require_once __DIR__ . '/footer.php'; ?>
</body>
</html>