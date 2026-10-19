<?php

if (!isset($_SESSION['id_paciente'])) {
    header("Location: /fafala/PHP/acesso/login.php");
    exit;
}

$stmt = $pdo->prepare(
    "SELECT p.*, pv.nome_perfil_visual
     FROM paciente p
     LEFT JOIN perfil_visual pv ON pv.id_visual = p.id_visual
     WHERE p.id_paciente = ?"
);
$stmt->execute([$_SESSION['id_paciente']]);
$paciente = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$paciente) {
    header("Location: /fafala/PHP/acesso/login.php");
    exit;
}


/* ---------- Valores que viram variáveis do CSS !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! (se precisar mudar, MUDAR AQUI) ---------- */

$tamanhos = [
    "Pequeno" => "110px",
    "Médio"   => "140px",
    "Grande"  => "180px",
];

$espacos = [
    "Normal" => "16px",
    "Grande" => "28px",
];

$tamanhoCard = $tamanhos[$paciente["tamanho_card"]] ?? "140px";
$espacoCards = $espacos[$paciente["espacamento_cards"]] ?? "16px";

$estiloPaciente =
    "<style>\n" .
    "    :root {\n" .
    "        --cor-fundo-paciente: " . e($paciente["cor_fundo_tema"]) . ";\n" .
    "        --cor-card: " . e($paciente["cor_card_tema"]) . ";\n" .
    "        --tamanho-card: " . $tamanhoCard . ";\n" .
    "        --espaco-cards: " . $espacoCards . ";\n" .
    "    }\n" .
    "</style>\n";


/* ---------- Configurações de liga/desliga viram classes ---------- */

$classes = [];

if ($paciente["nome_perfil_visual"] === "Infantil") $classes[] = "perfil-infantil";
if ($paciente["modo_escuro"])                       $classes[] = "modo-escuro";
if ($paciente["contraste"] === "Alto")              $classes[] = "alto-contraste";
if (!$paciente["mostrar_texto"])                    $classes[] = "sem-texto";

$classesPaciente = implode(" ", $classes);