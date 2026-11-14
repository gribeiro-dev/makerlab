<?php

    require_once __DIR__ . "/init.php";

    $bancadas = readAll($pdo, "Bancadas");

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

    if ($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['id'])) {
        $ferramentaSelecionada = readAll($pdo, "Ferramentas", "id_ferramenta = {$_GET['id']}");
        $idFerramenta = $_GET['id'];

        if ($ferramentaSelecionada == false) {
            print("<p>Bancada não reconhecida</p>");
            exit;
        }

    }

    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        $idFerramenta = (int)($_POST['idFerramenta'] ?? 0);

        $erros = [];

        $dadosDoForm = [
            'nome_ferramenta' => trim($_POST['nomeFerramenta'] ?? ''),
            'area'=> trim($_POST['area'] ?? ''),
            'estoque' => trim($_POST['valorEstoque'] ?? ''),
            'id_bancada' => (int)($_POST['bancada'] ?? 0)
        ];

        // ---------------------------------------------------------------

        if ($dadosDoForm['nome_ferramenta'] == '') {
            $erros['nome'] = 'O campo nome da ferramenta é obrigatório, tente novamente.';

        } elseif (strlen($dadosDoForm['nome_ferramenta']) > 100) {
            $erros['nome'] = 'O campo nome da ferramenta deve ter no máximo 100 caracteres, tente novamente.';

        } elseif (read($pdo, 'Ferramentas', 'nome_ferramenta = ? AND id_ferramenta != ?', [$dadosDoForm['nome_ferramenta'], $idFerramenta]) !== false) {
            $erros['nome'] = 'O nome da ferramenta já está sendo utilizado, por favor escolha outro.';
        }

        // ---------------------------------------------------------------

        if ($dadosDoForm['area'] == '') {

            $erros['area'] = 'O campo de área é obrigatório, tente novamente.';

        } elseif (strlen($dadosDoForm['area']) < 5 || strlen($dadosDoForm['area']) > 50) {

            $erros['area'] = 'O campo de área deve ser preenchido com no mínimo 5 caracteres e máximo 50 caracteres, tente novamente.';

        }

        // ---------------------------------------------------------------


        if ($dadosDoForm['estoque'] == '') {
            $erros['estoque'] = 'O campo estoque é obrigatório, tente novamente.';

        } elseif ((int)$dadosDoForm['estoque'] > 20000) {
            $erros['estoque'] = 'O campo quantidade deve ser preenchido com valores inteiros entre 0 e 20000, tente novamente.';

        }

        // ---------------------------------------------------------------
        
        if ($dadosDoForm['id_bancada'] <= 0 || read($pdo, 'Bancadas', 'id_bancada = ?', [$dadosDoForm['id_bancada']]) === false) {
            $erros['bancada'] = 'A bancada selecionada não existe, tente novamente.';

        }

        // ---------------------------------------------------------------

        if ($erros === []) {

            update($pdo, 'Ferramentas', [
                'nome_ferramenta' => $dadosDoForm['nome_ferramenta'],
                'area' => $dadosDoForm['area'],
                'estoque' => (int)$dadosDoForm['estoque'],
                'id_bancada' => $dadosDoForm['id_bancada']
            ], "id_ferramenta = ?", [$idFerramenta]);

            header('Location: dashboard.php');
            exit;

        }

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php if (!empty($erros)): ?>
        <div class="erros">
            <p>Corrija os campos abaixo:</p>
            <ul>
                <?php foreach ($erros as $mensagem): ?>
                    <li><?= ($mensagem) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="" method="POST">

        <?php foreach($ferramentaSelecionada as $campoDaFerramenta): ?>

            <input type="hidden" name="idFerramenta" value="<?= $idFerramenta ?>">

            <label for="nome">Nome da ferramenta:</label>
            <br>
            <input type="text" name="nomeFerramenta" id="nomeFerramenta" value="<?= $campoDaFerramenta['nome_ferramenta']?>" required>
            <br>
        
            <label for="area">Escreva a área da bancada:</label>
            <br>
            <input type="text" name="area" id="area" value="<?= $campoDaFerramenta['area']?>" required>
            
            <br>
        
            <label for="valorEstoque">Quantos temos em estoque?:</label>
            <br>
            <input type="number" name="valorEstoque" id="valorEstoque" step="1" value="<?= $campoDaFerramenta['estoque']?>" required>
            
            <br>
            
            <p>De qual bancada ela pertence?</p>
        
            <select name="bancada" required>

            <?php foreach ($bancadas as $b): ?>

                <option value="<?= $b['id_bancada'] ?>"
                    <?= $campoDaFerramenta['id_bancada'] == $b['id_bancada'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($b['nome_bancada']) ?>
                </option>

            <?php endforeach; ?>

            </select>

        
            <br>
            <br>
        
            <button type="submit">Registrar</button>

        <?php endforeach ?>


    </form>

</body>
</html>
    
