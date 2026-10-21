<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prancha | Fafala</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../../CSS/style.css">
    <link rel="stylesheet" href="../../CSS/acessibilidade.css">
    <link rel="stylesheet" href="../../CSS/especifico/paciente.css">
</head>
<body>
    <header class="cabecalho-prancha">
        <a href="index.php" class="botao-voltar">
            <span aria-hidden="true"><i class="bi bi-arrow-left-circle"></i></span>
            Pranchas
        </a>

    </header>
    <main>
        <h1 class="titulo-prancha" id="titulo-prancha"></h1>

        <div class="container-palavras">
            <div class="palavra">Eu</div>
            <div class="palavra">Quero</div>
            <div class="palavra">Comer</div>
            <div class="palavra">Beber</div>
            <div class="palavra">Fazer</div>
            <div class="palavra">Sim</div>
            <div class="palavra">Não</div>
            <div class="palavra">Mãe</div>
            <div class="palavra">Pai</div>
            <div class="palavra">Dormir</div>
            <div class="palavra">Brincar</div>
            <div class="palavra">Abraçar</div>
            <div class="palavra">Assistir</div>
            <div class="palavra">Tomar</div>
            <div class="palavra">Banho</div>
        </div>

        <div class="container-pictogramas" id="container-pictogramas"></div>
    </main>

    <script src="../../JS/fafala.js"></script>
    <script>
        const categoriaId = new URLSearchParams(location.search).get("prancha");
        const container = document.getElementById("container-pictogramas");
        const titulo = document.getElementById("titulo-prancha");
        let pictogramas = [];

        function falar(texto) {
            const mensagem = new SpeechSynthesisUtterance(texto);
            mensagem.lang = "pt-BR";
            window.speechSynthesis.cancel();
            window.speechSynthesis.speak(mensagem);
        }

        function desenhar() {
            container.replaceChildren();

            pictogramas.forEach(function (p) {
                container.appendChild(Fafala.el("div", { class: "pictograma", "data-id": p.id }, [
                    Fafala.imagemOuVazio(p.imagem_id, p.nome),
                    Fafala.el("h3", { text: p.nome })
                ]));
            });
        }

        async function carregar() {
            try {
                const resp = await Fafala.api("pictogramas", { categoria_id: categoriaId });
                titulo.textContent = resp.categoria.nome;
                pictogramas = resp.pictogramas;
                desenhar();
            } catch (e) {
                titulo.textContent = "Prancha não encontrada";
                container.replaceChildren();
            }
        }

        container.addEventListener("click", function (e) {
            const card = e.target.closest(".pictograma[data-id]");
            if (!card) return;
            falar(card.querySelector("h3").textContent);
        });

        document.querySelectorAll(".palavra").forEach(function (palavra) {
            palavra.addEventListener("click", function () {
                falar(palavra.textContent.trim());
            });
        });

        carregar();
    </script>

</body>
</html>
