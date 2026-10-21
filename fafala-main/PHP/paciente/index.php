<?php
require_once __DIR__ . "/../tecnico/conexao.php";
require_once __DIR__ . "/../tecnico/estilo_paciente.php";


$stmt = $pdo->prepare(
    "SELECT p.id_prancha, p.nome_prancha, p.descricao_prancha,
            (SELECT pi.id_imagem
             FROM prancha_imagem pi
             WHERE pi.id_prancha = p.id_prancha
             ORDER BY pi.ordem_exibicao
             LIMIT 1) AS id_capa
     FROM prancha p
     WHERE p.tipo_prancha = 'Padrão' OR p.id_paciente = ?
     ORDER BY p.tipo_prancha, p.nome_prancha"
);
$stmt->execute([$_SESSION['id_paciente']]);
$pranchas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Início | Fafala</title>

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../../CSS/style.css">
    <link rel="stylesheet" href="../../CSS/acessibilidade.css">
    <link rel="stylesheet" href="../../CSS/especifico/paciente.css">

    <?= $estiloPaciente ?>
</head>

<body class="<?= $classesPaciente ?>">

    <?php
    $paginaAtual = 'inicio';
    include __DIR__ . '/../tecnico/topo_paciente.php';
    ?>

    <main class="container">

        <div class="cabecalho-inicio">
            <h1>Minhas pranchas</h1>

            <label for="pesquisar" class="visualmente-oculto">Pesquisar prancha</label>
            <input type="search" id="pesquisar" class="campo-busca" placeholder="Pesquisar..." data-busca="#grade-pranchas">
        </div>

        <?php if (count($pranchas) === 0): ?>

            <p class="aviso-vazio">Nenhuma prancha cadastrada ainda.</p>

        <?php else: ?>

            <div class="grade-pranchas" id="grade-pranchas">

                <?php foreach ($pranchas as $prancha): ?>
                    <a href="pranchas.php?prancha=<?= (int)$prancha['id_prancha'] ?>"
                       class="card-prancha"
                       data-nome="<?= e($prancha['nome_prancha']) ?>">

                        <span class="card-prancha-imagem">
                            <?php if ($prancha['id_capa']): ?>
                                <img src="/fafala/PHP/tecnico/imagem.php?id=<?= (int)$prancha['id_capa'] ?>" alt="">
                            <?php else: ?>
                                <span class="card-prancha-letra" aria-hidden="true">
                                    <?= e(mb_strtoupper(mb_substr($prancha['nome_prancha'], 0, 1))) ?>
                                </span>
                            <?php endif; ?>
                        </span>

                        <span class="card-prancha-nome"><?= e($prancha['nome_prancha']) ?></span>
                    </a>
                <?php endforeach; ?>

            </div>

            <p class="aviso-vazio" data-sem-resultado="#grade-pranchas" hidden>Nenhuma prancha encontrada.</p>

        <?php endif; ?>

    </main>

    <script src="../../JS/busca.js"></script>

</body>
</html>