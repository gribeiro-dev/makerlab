<?php

require_once __DIR__ . '/init.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $erros = [];

    $dados = [
        'nome'        => trim($_POST['nome_usuario'] ?? ''),
        'email'       => trim($_POST['email'] ?? ''),
        'instituicao' => trim($_POST['instituicao'] ?? ''),
        'telefone'    => trim($_POST['telefone'] ?? ''),
        'senha'       => $_POST['senha'] ?? '',
    ];

    // -------------- Validação dos dados -----------------

    if ($dados['nome'] == '') {
        $erros['nome'] = 'O campo nome é obrigatório, tente novamente.';
    } elseif (strlen($dados['nome']) > 100) {
        $erros['nome'] = 'O campo nome deve ter no máximo 100 caracteres, tente novamente.';
    }

    // -----------------------------------------------------

    if ($dados['email'] == '') {
        $erros['email'] = 'O campo email é obrigatório, tente novamente.';
    } elseif (filter_var($dados['email'], FILTER_VALIDATE_EMAIL) === false) {
        $erros['email'] = 'O campo email precisa ser um email válido, tente novamente.';
    } elseif (read($pdo, 'Usuarios', 'email = ?', [$dados['email']]) !== false) {
        $erros['email'] = 'Este email já está cadastrado, por favor use outro.';
    }

    // -----------------------------------------------------

    if ($dados['instituicao'] == '') {
        $erros['instituicao'] = 'O campo instituição é obrigatório, tente novamente.';
    } elseif (strlen($dados['instituicao']) > 100) {
        $erros['instituicao'] = 'O campo instituição deve ter no máximo 100 caracteres, tente novamente.';
    }

    // -----------------------------------------------------

    if ($dados['telefone'] == '') {
        $erros['telefone'] = 'O campo telefone é obrigatório, tente novamente.';
    } elseif (strlen($dados['telefone']) > 20) {
        $erros['telefone'] = 'O campo telefone deve ter no máximo 20 caracteres, tente novamente.';
    }

    // -----------------------------------------------------

    if ($dados['senha'] == '') {
        $erros['senha'] = 'O campo senha é obrigatório, tente novamente.';
    } elseif (strlen($dados['senha']) < 6) {
        $erros['senha'] = 'O campo senha deve ter no mínimo 6 caracteres, tente novamente.';
    }

    // -----------------------------------------------------

    if ($erros === []) {
        create($pdo, 'Usuarios', [
            'nome_usuario' => $dados['nome'],
            'email'        => $dados['email'],
            'instituicao'  => $dados['instituicao'],
            'telefone'     => $dados['telefone'],
            'senha'        => password_hash($dados['senha'], PASSWORD_DEFAULT),
        ]);

        header('Location: loginUsuario.php');
        exit;
    }
}

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MakerLab - Cadastro</title>
    <link rel="stylesheet" href="./css/cadastroUser.css">
</head>

<body>
    <?php require_once __DIR__ . '/nav.php'; ?>
    <br>
    <br>
    <section class="loginADM">
        <div class="conteudo">

            <?php if (!empty($erros)): ?>
                <div class="erros">
                    <p>Corrija os campos abaixo:</p>
                    <ul>
                        <?php foreach ($erros as $mensagem): ?>
                            <li><?= htmlspecialchars($mensagem) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form class="form-login" action="" method="post">
                <div class="campo">
                    <label for="nome_usuario">Nome Usuário:</label>
                    <input type="text" id="nome_usuario" name="nome_usuario" required>
                </div>

                <div class="campo">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="campo">
                    <label for="instituicao">Instituição:</label>
                    <input type="text" id="instituicao" name="instituicao" required>
                </div>

                <div class="campo">
                    <label for="telefone">Telefone:</label>
                    <input type="tel" id="telefone" name="telefone" required>
                </div>

                <div class="campo">
                    <label for="senha">Senha:</label>
                    <input type="password" id="senha" name="senha" required>
                </div>

                <button type="submit">Cadastrar-se</button>
            </form>

            <div class="moverTextos">
                <h4 class="textoLogin">Já tem uma conta?</h4>
                <a class="textoLink" href="./loginUsuario.php">Faça Login Aqui!</a>
            </div>
        </div>
    </section>

    <?php require_once __DIR__ . '/footer.php'; ?>
</body>

</html>