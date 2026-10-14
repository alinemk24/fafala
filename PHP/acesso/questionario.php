<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Questionário | Fafala</title>

    <!-- fonte -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">

    <!-- CSS: geral primeiro, específico por último -->
    <link rel="stylesheet" href="../../CSS/style.css">
    <link rel="stylesheet" href="../../CSS/acessibilidade.css">
    <link rel="stylesheet" href="../../CSS/especifico/acesso_dados.css">
</head>

<body>

    <main class="pagina-acesso">

        <div class="questionario">

            <header class="cabecalho-acesso">
                
                <h1>Vamos conhecer melhor você!</h1>

                <p>
                    Responda às perguntas para que o Fafala possa
                    se adaptar às necessidades de quem vai utilizá-lo.
                </p>

            </header>

            <!-- formulário (o cartão inteiro) -->
            <form id="formOnboarding" method="post" class="card card-questionario">

                <!-- barra de progresso (só aparece quando o JS liga o modo de etapas) -->
                <div class="progresso" aria-live="polite">
                    <div class="progresso-topo">
                        <span class="progresso-grupo" id="progressoGrupo">Acessibilidade</span>
                        <span id="progressoTexto">Pergunta 1 de 6</span>
                    </div>
                    <div class="progresso-barra">
                        <div class="progresso-preenchido" id="progressoPreenchido"></div>
                    </div>
                </div>

                <!-- espaço do mascote: quando o papagaio estiver pronto, colocar aqui
                     <img src="../../IMG/fafala.png" alt=""> -->
                <div class="mascote" aria-hidden="true"></div>

                <!-- GRUPO 1: ACESSIBILIDADE -->
                <section class="grupo-perguntas">

                    <h2>Acessibilidade</h2>

                    <!-- Pergunta 1 -->
                    <fieldset class="pergunta" data-grupo="Acessibilidade">

                        <legend>
                            O usuário tem dificuldade para enxergar
                            elementos pequenos?
                        </legend>

                        <div class="respostas">
                            <label class="resposta">
                                <input type="radio" name="resposta[1]" value="Sim" required>
                                Sim
                            </label>

                            <label class="resposta">
                                <input type="radio" name="resposta[1]" value="Não">
                                Não
                            </label>

                            <label class="resposta">
                                <input type="radio" name="resposta[1]" value="Não sei">
                                Não sei
                            </label>
                        </div>

                    </fieldset>

                    <!-- Pergunta 2 -->
                    <fieldset class="pergunta" data-grupo="Acessibilidade">

                        <legend>
                            O usuário tem dificuldade para tocar
                            com precisão em elementos pequenos?
                        </legend>

                        <div class="respostas">
                            <label class="resposta">
                                <input type="radio" name="resposta[2]" value="Sim" required>
                                Sim
                            </label>

                            <label class="resposta">
                                <input type="radio" name="resposta[2]" value="Não">
                                Não
                            </label>

                            <label class="resposta">
                                <input type="radio" name="resposta[2]" value="Não sei">
                                Não sei
                            </label>
                        </div>

                    </fieldset>

                    <!-- Pergunta 3 -->
                    <fieldset class="pergunta" data-grupo="Acessibilidade">

                        <legend>
                            O usuário costuma tocar acidentalmente
                            em elementos próximos?
                        </legend>

                        <div class="respostas">
                            <label class="resposta">
                                <input type="radio" name="resposta[3]" value="Sim" required>
                                Sim
                            </label>

                            <label class="resposta">
                                <input type="radio" name="resposta[3]" value="Não">
                                Não
                            </label>

                            <label class="resposta">
                                <input type="radio" name="resposta[3]" value="Não sei">
                                Não sei
                            </label>
                        </div>

                    </fieldset>

                    <!-- Pergunta 4 -->
                    <fieldset class="pergunta" data-grupo="Acessibilidade">

                        <legend>
                            O usuário se comunica melhor quando há
                            poucos elementos na tela?
                        </legend>

                        <div class="respostas">
                            <label class="resposta">
                                <input type="radio" name="resposta[4]" value="Sim" required>
                                Sim
                            </label>

                            <label class="resposta">
                                <input type="radio" name="resposta[4]" value="Não">
                                Não
                            </label>

                            <label class="resposta">
                                <input type="radio" name="resposta[4]" value="Não sei">
                                Não sei
                            </label>
                        </div>

                    </fieldset>

                    <!-- Pergunta 5 -->
                    <fieldset class="pergunta" data-grupo="Acessibilidade">

                        <legend>
                            O usuário sabe ler ou está em processo
                            de aprendizagem da leitura?
                        </legend>

                        <div class="respostas">
                            <label class="resposta">
                                <input type="radio" name="resposta[5]" value="Sim" required>
                                Sim
                            </label>

                            <label class="resposta">
                                <input type="radio" name="resposta[5]" value="Não">
                                Não
                            </label>

                            <label class="resposta">
                                <input type="radio" name="resposta[5]" value="Não sei">
                                Não sei
                            </label>
                        </div>

                    </fieldset>

                </section>

                <!-- GRUPO 2: PERFIL VISUAL -->
                <section class="grupo-perguntas">

                    <h2>Perfil visual</h2>

                    <!-- Pergunta 6 -->
                    <fieldset class="pergunta" data-grupo="Perfil visual">

                        <legend>
                            Qual tema visual é mais adequado
                            para o usuário?
                        </legend>

                        <div class="respostas">
                            <label class="resposta">
                                <input type="radio" name="resposta[6]" value="Infantil" required>
                                Infantil
                            </label>

                            <label class="resposta">
                                <input type="radio" name="resposta[6]" value="Adulto">
                                Adulto
                            </label>

                            <label class="resposta">
                                <input type="radio" name="resposta[6]" value="Personalizado">
                                Personalizado
                            </label>
                        </div>

                    </fieldset>

                </section>

                <!-- aviso quando tenta avançar sem responder -->
                <p class="mensagem-erro aviso-etapa" id="avisoEtapa" aria-live="assertive"></p>

                <!-- mensagem final (no modo de etapas, só aparece na última pergunta) -->
                <div class="mensagem-final">
                    <p>
                        Com base nas suas respostas, o Fafala definirá
                        as configurações iniciais de acessibilidade
                        e aparência. O responsável poderá alterá-las
                        posteriormente.
                    </p>
                </div>

                <!-- botões -->
                <div class="navegacao">

                    <button type="button" id="btnVoltar" class="botao botao-secundario">
                        Voltar
                    </button>

                    <button type="button" id="btnProxima" class="botao">
                        Próxima
                    </button>

                    <!-- O envio para o banco será implementado depois -->
                    <button type="button" id="btnConcluir" class="botao">
                        Concluir configuração
                    </button>

                </div>

            </form>

        </div>

    </main>

    <script src="../../JS/especifico/questionario.js"></script>

</body>

</html>