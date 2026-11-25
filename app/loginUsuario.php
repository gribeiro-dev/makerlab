<?php
require_once __DIR__ . '/init.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST' && !empty($_SESSION['user'])) {
header("Location: perfil.php");
exit;
}

$users = readAll(database(), "Usuarios");

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $email = trim($_POST['email'] ?? '');
    $senha = $_POST['senha'] ?? '';

if ($email === '' && $senha === '') {
header("Location: loginUsuario.php?erro=campos_vazios");
exit;
    }
if ($email === '') {
header("Location: loginUsuario.php?erro=usuario_nao_preenchido");
exit;
    }
if ($senha === '') {
header("Location: loginUsuario.php?erro=senha_nao_preenchida");
exit;
    }

    $usuarioEncontrado = null;
foreach ($users as $u) {
if ($u['email'] == $email) {
            $usuarioEncontrado = $u;
break;
        }
    }

if ($usuarioEncontrado) {
if (password_verify($senha, $usuarioEncontrado['senha'])) {
            session_regenerate_id(true);
            $_SESSION['user'] = $usuarioEncontrado['nome_usuario'];
            $_SESSION['id'] = $usuarioEncontrado['id_usuario'];
            $_SESSION['perfil'] = $usuarioEncontrado['perfil'];
header("Location: index.php");
exit;
        } else {
header("Location: loginUsuario.php?erro=senha_invalida");
exit;
        }
    } else {
header("Location: loginUsuario.php?erro=credenciais_invalidas");
exit;
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MakerLab - Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/loginUsuario.css">
</head>

<body>
<?php require_once __DIR__ . '/nav.php'; ?>

    <section class="loginADM">
        <div class="conteudo">
            <form class="form-login" action="" method="post">
                <div class="campo">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="campo">
                    <label for="senha">Senha:</label>
                    <input type="password" id="senha" name="senha" required>
                </div>

                <button type="submit">Enviar</button>
            </form>

            <div class="moverTextos">
                <h4 class="textoLogin">Não tem conta?</h4>
                <a class="textoLink" href="./cadastroUser.php">Cadastre-se Aqui!</a>
            </div>
            <div class="erro">
<?php
if (isset($_GET['erro']) && $_GET['erro'] != "") {
echo "<p>Erro detectado: " . $_GET['erro'] . " </p>";
                }
?>
            </div>
        </div>
    </section>

<?php require_once __DIR__ . '/footer.php'; ?>
</body>

</html>