<?php
require __DIR__ . '/config.php';

$id = (int)($_GET['id'] ?? 0);

$stmt = conectar()->prepare('SELECT mime, dados FROM imagens WHERE id = ?');
$stmt->execute([$id]);
$img = $stmt->fetch();

if (!$img) {
    http_response_code(404);
    exit('Imagem não encontrada');
}

$dados = $img['dados'];
if (is_resource($dados)) {
    $dados = stream_get_contents($dados);
}

header('Content-Type: ' . $img['mime']);
header('Content-Length: ' . strlen($dados));
header('Cache-Control: public, max-age=31536000, immutable');
echo $dados;
