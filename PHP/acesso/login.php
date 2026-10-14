<?php
require_once __DIR__ . "/../tecnico/conexao.php";

$erro = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST["email"] ?? "");
    $senhaDigitada = $_POST["senha"] ?? "";

    $stmt = $pdo->prepare(
        "SELECT id_usuario, nome_usuario, senha_hash
         FROM usuario
         WHERE email = ?"
    );
    $stmt->execute([$email]);
    $usuarioEncontrado = $stmt->fetch(PDO::FETCH_ASSOC);

    if (
        $usuarioEncontrado &&
        password_verify($senhaDigitada, $usuarioEncontrado["senha_hash"])
    ) {
        session_regenerate_id(true);

        $_SESSION["id_usuario"] = $usuarioEncontrado["id_usuario"];
        $_SESSION["nome_usuario"] = $usuarioEncontrado["nome_usuario"];

        header("Location: index.php");
        exit;
    } else {
        $erro = "E-mail ou senha incorretos.";
    }
}

cabecalho("Entrar");
?>

<?php if ($erro): ?>
    <p><?= e($erro) ?></p>
<?php endif; ?>

<form method="POST">
    <label>E-mail:</label><br>
    <input type="email" name="email" required><br><br>

    <label>Senha:</label><br>
    <input type="password" name="senha" required><br><br>

    <button type="submit">Entrar</button>
</form>

<p>
    Ainda não tem conta?
    <a href="cadastro.php?tipo=conta">Cadastre-se</a>
</p>

<?php rodape(); ?>