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


    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        $erros = [];

        $dadosFerramentas = [
            'nome_ferramenta' => trim($_POST['nomeFerramenta'] ?? ''),
            'area' => trim($_POST['area'] ?? ''),
            'estoque' => trim($_POST['valorEstoque'] ?? ''),
            'id_bancada' => (int)($_POST['bancada'] ?? 0)
        ];

        if ($dadosFerramentas['nome_ferramenta'] == '') {
            $erros['nome'] = 'O campo nome da ferramenta é obrigatório, tente novamente.';
        } elseif (strlen($dadosFerramentas['nome_ferramenta']) > 100) {
            $erros['nome'] = 'O campo nome da ferramenta deve ter no máximo 100 caracteres, tente novamente.';
        } elseif (read($pdo, 'Ferramentas', 'nome_ferramenta = ?', [$dadosFerramentas['nome_ferramenta']]) !== false) {
            $erros['nome'] = 'O nome da bancada já está sendo utilizado, por favor escolha outro.';
        }

        // --------------------------------------------------

        if ($dadosFerramentas['area'] == '') {
            $erros['area'] = 'O campo de área é obrigatório, tente novamente.';
        } elseif (strlen($dadosFerramentas['area']) < 5 || strlen($dadosFerramentas['area']) > 50) {
            $erros['area'] = 'O campo de área deve ser preenchido com no mínimo 5 caracteres e máximo 50 caracteres, tente novamente.';
        }

        // ---------------------------------------------------

        if ($dadosFerramentas['estoque'] == '') {
            $erros['estoque'] = 'O campo estoque é obrigatório, tente novamente.';
        } elseif ($dadosFerramentas['estoque'] < 0 || $dadosFerramentas['estoque'] > 20000) {
            $erros['estoque'] = 'O campo quantidade deve ser preenchido com valores reais, tente novamente.';
        }

        // ----------------------------------------------------

        if (read($pdo, 'Ferramentas', 'id_bancada = ?', [$dadosFerramentas['id_bancada']]) == false || $dadosFerramentas['id_bancada'] == '') {
            $erros['bancada'] = 'A bancada selecionada não existe, tente novamente.';
        }

        // ----------------------------------------------------

        if ($erros === []) {
            create($pdo, 'Ferramentas', [
                'nome_ferramenta' => $dadosFerramentas['nome_ferramenta'],
                'area' => $dadosFerramentas['area'],
                'estoque' => (int) $dadosFerramentas['estoque'],
                'id_bancada' => $dadosFerramentas['id_bancada'],
            ]);

            header('Location: dashboard.php?');
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
    <main class="conteudo">
    
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
        <label for="nome">Nome da ferramenta:</label>
        <br>
        <input type="text" name="nomeFerramenta" id="nomeFerramenta" required>
        <br>

        <label for="area">Escreva a área da bancada:</label>
        <br>
        <input type="text" name="area" id="area" required>
        
        <br>

        <label for="valorEstoque">Quantos temos em estoque?:</label>
        <br>
        <input type="number" name="valorEstoque" id="valorEstoque" step="1" required>
        
        <br>
        
        <p>De qual bancada ela pertence?</p>

        <select name="bancada" required>
            <option value="">-- Escolha uma bancada --</option>
            <?php foreach ($bancadas as $b): ?>
                <option value="<?= $b['id_bancada'] ?>"><?= htmlspecialchars($b['nome_bancada']) ?></option>
            <?php endforeach; ?>
        </select>

        <br>
        <br>

        <button type="submit">Registrar</button>

    </form>

    
</body>
</html>