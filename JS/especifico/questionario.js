const form = document.getElementById('formOnboarding');
const perguntas = form.querySelectorAll('.pergunta');

const progressoGrupo = document.getElementById('progressoGrupo');
const progressoTexto = document.getElementById('progressoTexto');
const progressoPreenchido = document.getElementById('progressoPreenchido');
const avisoEtapa = document.getElementById('avisoEtapa');

const btnVoltar = document.getElementById('btnVoltar');
const btnProxima = document.getElementById('btnProxima');
const btnConcluir = document.getElementById('btnConcluir');

let atual = 0;

// liga o modo "uma pergunta por vez"
form.classList.add('em-etapas');


// Mostra a pergunta de número "indice" e atualiza o resto da tela
function mostrarPergunta(indice, moverFoco) {
    perguntas.forEach(function (pergunta, i) {
        pergunta.classList.toggle('ativa', i === indice);
    });

    const pergunta = perguntas[indice];
    const total = perguntas.length;
    const ultima = indice === total - 1;

    // barra de progresso
    progressoGrupo.textContent = pergunta.dataset.grupo;
    progressoTexto.textContent = 'Pergunta ' + (indice + 1) + ' de ' + total;
    progressoPreenchido.style.width = ((indice + 1) / total * 100) + '%';

    // botões
    btnVoltar.hidden = indice === 0;
    btnProxima.hidden = ultima;
    btnConcluir.hidden = !ultima;
    form.classList.toggle('ultima-etapa', ultima);

    avisoEtapa.textContent = '';

    // leva o leitor de tela para a nova pergunta
    if (moverFoco) {
        const legend = pergunta.querySelector('legend');
        legend.setAttribute('tabindex', '-1');
        legend.focus();
    }
}


// Confere se a pergunta atual foi respondida
function respondida(indice) {
    return perguntas[indice].querySelector('input:checked') !== null;
}

function avisarSemResposta() {
    avisoEtapa.textContent = 'Escolha uma opção para continuar.';
}


btnProxima.addEventListener('click', function () {
    if (!respondida(atual)) {
        avisarSemResposta();
        return;
    }
    atual++;
    mostrarPergunta(atual, true);
});

btnVoltar.addEventListener('click', function () {
    atual--;
    mostrarPergunta(atual, true);
});

// ao escolher uma opção, some o aviso de erro
form.addEventListener('change', function () {
    avisoEtapa.textContent = '';
});

// ao concluir, só deixa enviar se a última pergunta foi respondida
// (as anteriores já foram conferidas no botão "Próxima")
form.addEventListener('submit', function (evento) {
    if (!respondida(atual)) {
        evento.preventDefault();
        avisarSemResposta();
    }
});


// começa na primeira pergunta
mostrarPergunta(0, false);