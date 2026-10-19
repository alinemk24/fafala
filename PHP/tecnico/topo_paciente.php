<?php

$paginaAtual = $paginaAtual ?? '';
?>

<header class="topo-paciente">

    <a href="/fafala/PHP/paciente/inicio.php" class="marca" aria-label="Fafala, ir para o início">
        <!-- NÃO ESQUECER DE COLOCAR O PAPAGAIO AQUIIIIIIIIII -->
        <span class="marca-ponto" aria-hidden="true"></span>
        <span class="marca-nome">Fafala</span>
    </a>

    <nav class="nav-paciente" aria-label="Navegação principal">

        <!-- Início -->
        <a href="/fafala/PHP/paciente/inicio.php"
           class="nav-item"
           aria-label="Início"
           <?= $paginaAtual === 'inicio' ? 'aria-current="page"' : '' ?>>
            <svg viewBox="0 0 24 24" aria-hidden="true">
                <path d="M3 10.5 12 3l9 7.5V20a1 1 0 0 1-1 1h-5v-6h-6v6H4a1 1 0 0 1-1-1z"/>
            </svg>
        </a>

        <!-- Configurações -->
        <a href="/fafala/PHP/acesso/login.php?destino=configuracoes"
           class="nav-item nav-item-responsavel"
           aria-label="Configurações (área do responsável, pede login)">
            <svg viewBox="0 0 24 24" aria-hidden="true">
                <circle cx="12" cy="12" r="3"/>
                <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 1 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 1 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 1 1-2.83-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 1 1 0-4h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 1 1 2.83-2.83l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 1 1 4 0v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 1 1 2.83 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 1 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1z"/>
            </svg>
        </a>

    </nav>

</header>