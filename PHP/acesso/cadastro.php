<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro | Fafala</title>
    <link rel="stylesheet" href="../../CSS/especifico/acesso_dados.css">
</head>


<body>
    <main class="pagina-cadastro">

        <section class="card-cadastro" aria-labelledby="titulo-cadastro">

            <!-- A LOGO FICA AQUIIIIIII (NÃO ESQUECER DE COLOCAR) -->

            <header class="cabecalho-cadastro">
                <h1 id="titulo-cadastro">Crie sua conta</h1>
                <p>Configure o Fafala para atender às necessidades do paciente.</p>
            </header>

            <form action="#" method="post" id="form-cadastro">

                <!-- DADOS DO RESPONSÁVEL -->
                <fieldset>
                    <legend>Dados do responsável</legend>

                    <div class="campo">
                        <label for="nome_usuario">Nome completo</label>
                        <input type="text" id="nome_usuario" name="nome_usuario"
                               placeholder="Ex.: Maria da Silva" maxlength="100"
                               autocomplete="name" required>
                    </div>

                    <div class="grade">
                        <div class="campo">
                            <label for="email">E-mail</label>
                            <input type="email" id="email" name="email"
                                   placeholder="exemplo@email.com" maxlength="100"
                                   autocomplete="email" required>
                        </div>

                        <div class="campo">
                            <label for="telefone">Telefone</label>
                            <input type="tel" id="telefone" name="telefone"
                                   placeholder="(00) 00000-0000" maxlength="15"
                                   inputmode="numeric" autocomplete="tel" required>
                        </div>
                    </div>

                    <div class="grade">
                        <div class="campo">
                            <label for="senha">Senha</label>
                            <div class="campo-senha">
                                <input type="password" id="senha" name="senha"
                                       placeholder="Crie uma senha" minlength="8"
                                       autocomplete="new-password" aria-describedby="dica-senha" required>
                                <button type="button" class="mostrar-senha" aria-label="Mostrar senha" aria-pressed="false" data-alvo="senha">

                                    <!-- imagem do olho -->
                                    <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7S2 12 2 12z"/><circle cx="12" cy="12" r="3"/></svg>

                                </button>
                            </div>
                            <small id="dica-senha" class="dica">Use pelo menos 8 caracteres.</small>
                        </div>

                        <div class="campo">
                            <label for="confirmar_senha">Confirmar senha</label>
                            <div class="campo-senha">
                                <input type="password" id="confirmar_senha" name="confirmar_senha"
                                       placeholder="Digite a senha novamente"
                                       autocomplete="new-password" aria-describedby="erro-senha" required>
                                <button type="button" class="mostrar-senha" aria-label="Mostrar senha" aria-pressed="false" data-alvo="confirmar_senha">

                                    <!-- imagem do olho -->
                                    <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7S2 12 2 12z"/><circle cx="12" cy="12" r="3"/></svg>
                                    
                                </button>
                            </div>
                            <small id="erro-senha" class="mensagem-erro" aria-live="polite"></small>
                        </div>
                    </div>
                </fieldset>

                <!-- DADOS DO PACIENTE -->
                <fieldset>
                    <legend>Dados do paciente</legend>

                    <div class="grade">
                        <div class="campo">
                            <label for="nome_paciente">Nome do paciente</label>
                            <input type="text" id="nome_paciente" name="nome_paciente"
                                   placeholder="Ex.: João" maxlength="100" required>
                        </div>

                        <div class="campo">
                            <label for="data_nascimento">Data de nascimento</label>
                            <input type="date" id="data_nascimento" name="data_nascimento" required>
                        </div>
                    </div>
                </fieldset>

                <button type="submit" class="botao-cadastro">
                    Criar conta e continuar
                    <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M9 6l6 6-6 6"/></svg>
                </button>

            </form>

            <footer class="rodape-cadastro">
                <p>
                    Já tem uma conta? <a href="login.php">Entrar</a>
                </p>
            </footer>

        </section>

    </main>

    <script src="../../JS/especifico/cadastro.js" defer></script>
</body>
</html>