<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minhas pranchas</title>
    <link rel="stylesheet" href="paciente.css?v=12">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="paciente.css?v=12">
</head>
<body>
    <div class="cabecalho-pesquisar">
        <h1></i><i class="bi bi-clipboard-heart-fill"> </i>Minhas pranchas</h1>
        
        <div class="cabecalho-acoes">
            <input type="search" id="pesquisar" placeholder="Pesquisar...">
            <button type="button" id="botao-editar" class="botao-editar" aria-pressed="false">Editar</button>
        </div>
    </div>
    <p class="aviso-edicao">Toque na prancha que deseja editar.</p>

    <main>
        <div class="container-cards" id="container-cards"></div>
    </main>

    <script src="fafala.js?v=1"></script>
    <script>
        const container = document.getElementById("container-cards");
        const pesquisa = document.getElementById("pesquisar");
        let categorias = [];

        function normalizar(t) {
            return t.toLowerCase().normalize("NFD").replace(/[̀-ͯ]/g, "").trim();
        }

        function desenhar() {
            container.replaceChildren();

            categorias.forEach(function (c) {
                const card = Fafala.el("div", { class: "card", "data-id": c.id }, [
                    Fafala.el("a", { href: "prancha.php?prancha=" + c.id }, [
                        Fafala.imagemOuVazio(c.imagem_id, c.nome),
                        Fafala.el("h3", { text: c.nome })
                    ])
                ]);
                container.appendChild(card);
            });

            container.appendChild(Fafala.blocoAdicionar("card", "Nova prancha", novaCategoria));
            filtrar();
        }

        function filtrar() {
            const texto = normalizar(pesquisa.value);
            container.querySelectorAll(".card[data-id]").forEach(function (card) {
                const nome = normalizar(card.querySelector("h3").textContent);
                card.style.display = nome.includes(texto) ? "" : "none";
            });
        }

        async function carregar() {
            try {
                categorias = await Fafala.api("categorias");
                desenhar();
            } catch (e) {
                container.textContent = e.message;
            }
        }

        function novaCategoria() {
            Fafala.abrirFormulario({
                titulo: "Nova prancha",
                aoSalvar: async function (dados) {
                    await Fafala.api("salvar_categoria", {}, dados);
                    await carregar();
                }
            });
        }

        function editarCategoria(id) {
            const c = categorias.find(function (x) { return x.id == id; });
            Fafala.abrirFormulario({
                titulo: "Editar prancha",
                nome: c.nome,
                imagemId: c.imagem_id,
                mensagemExcluir: 'Excluir a prancha "' + c.nome + '" e TODOS os pictogramas dentro dela?',
                aoSalvar: async function (dados) {
                    dados.append("id", c.id);
                    await Fafala.api("salvar_categoria", {}, dados);
                    await carregar();
                },
                aoExcluir: async function () {
                    const dados = new FormData();
                    dados.append("id", c.id);
                    await Fafala.api("excluir_categoria", {}, dados);
                    await carregar();
                }
            });
        }

        container.addEventListener("click", function (e) {
            const card = e.target.closest(".card[data-id]");
            if (card && Fafala.emEdicao()) {
                e.preventDefault();
                editarCategoria(card.dataset.id);
            }
        });

        pesquisa.addEventListener("input", filtrar);
        Fafala.iniciarBotaoEditar();
        carregar();
    </script>

</body>
</html>
