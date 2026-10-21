<?php
require_once __DIR__ . "/../tecnico/conexao.php";

$erro = "";

// Para onde ir depois do login (o ícone de engrenagem manda destino=configuracoes)
$destino = $_GET["destino"] ?? "";

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

        // As telas do paciente usam id_paciente, então guardamos o primeiro paciente desse usuário
        $stmt = $pdo->prepare(
            "SELECT id_paciente FROM paciente WHERE id_usuario = ? ORDER BY id_paciente LIMIT 1"
        );
        $stmt->execute([$usuarioEncontrado["id_usuario"]]);
        $idPaciente = $stmt->fetchColumn();
        if ($idPaciente) {
            $_SESSION["id_paciente"] = $idPaciente;
        }

        if ($destino === "configuracoes") {
            header("Location: ../configuracoes/configuracoes.php");
        } else {
            header("Location: ../paciente/inicio.php");
        }
        exit;
    } else {
        $erro = "E-mail ou senha incorretos.";
    }
}
?>

<!-- HTML -->
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrar | Fafala</title>
    <link rel="stylesheet" href="../../CSS/style.css">
    <link rel="stylesheet" href="../../CSS/especifico/acesso_dados.css">
</head>

<body>
    <main class="pagina-acesso">

        <section class="card card-acesso" aria-labelledby="titulo-acesso">

            <!-- A LOGO FICA AQUI (igual ao cadastro) -->

            <header class="cabecalho-acesso">
                <h1 id="titulo-acesso">Entrar</h1>
                <p>Acesse a área do responsável para configurar o Fafala.</p>
            </header>

            <?php if ($erro): ?>
                <p class="mensagem-erro" role="alert"><?= e($erro) ?></p>
            <?php endif; ?>

            <form method="post" id="form-acesso">

                <div class="campo">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" name="email"
                           placeholder="exemplo@email.com" maxlength="100"
                           autocomplete="email"
                           value="<?= e($_POST["email"] ?? "") ?>" required>
                </div>

                <div class="campo">
                    <label for="senha">Senha</label>
                    <div class="campo-senha">
                        <input type="password" id="senha" name="senha"
                               placeholder="Digite sua senha"
                               autocomplete="current-password" required>
                        <button type="button" class="mostrar-senha" aria-label="Mostrar senha" aria-pressed="false" data-alvo="senha">
                            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7S2 12 2 12z"/><circle cx="12" cy="12" r="3"/></svg>
                        </button>
                    </div>
                </div>

                <button type="submit" id="botao-acesso" class="botao">
                    Entrar
                    <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M9 6l6 6-6 6"/></svg>
                </button>

            </form>

            <footer class="rodape-acesso">
                <p>
                    Ainda não tem conta? <a href="cadastro.php?tipo=conta">Cadastre-se</a>
                </p>
            </footer>

        </section>

    </main>

    <script src="../../JS/especifico/login.js" defer></script>
</body>
</html>

<?php rodape(); ?>
