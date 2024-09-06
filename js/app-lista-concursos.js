const cardsConcursos = document.querySelectorAll('.cardConcursos');
const concursosInscricoesAbertas = document.querySelector('.concursosInscricoesAbertas');
const concursosInscricoesBreve = document.querySelector('.concursosInscricoesBreve');
const concursosForaPeriodo = document.querySelector('.concursosForaPeriodo');
const concursosListaManual = document.querySelector('.concursosListaManual');
const listOutrosEditais = concursosListaManual.querySelectorAll('ul');

const todasUnidades = [
    'Reitoria',
    'Alagoinhas',
    'Bom Jesus da Lapa',
    'Catu',
    'Governador Mangabeira',
    'Guanambi',
    'Itaberaba',
    'Itapetinga',
    'Santa Inês',
    'Senhor do Bonfim',
    'Teixeira de Freitas',
    'Uruçuca',
    'Valença',
    'Xique-Xique'
];

document.querySelector('#tituloNoticia').insertAdjacentElement('afterend', criaInput());
if (!document.querySelector('a.nomeUnidade').textContent.includes("Campus")) geraBotoesUnidades(todasUnidades, document.querySelector('input#inputP'));

if (concursosListaManual.innerText === '') concursosListaManual.remove();

if (listOutrosEditais) {
    listOutrosEditais.forEach((element, index) => {
        if (index > 0) {
            element.classList.add('hidden');
            const h1 = element.previousElementSibling;
            h1.addEventListener('click', () => {
                h1.classList.toggle('clicked');
                element.classList.toggle('hidden');
                if (!element.classList.contains('hidden')) h1.scrollIntoView({ behavior: 'smooth', block: 'start' });
            })
        }
    })
}



const arrConcursosInscricoesAbertas = Array.from(cardsConcursos).map(element => {
    if (element.querySelector('.timestampInicioInscricoes').innerHTML.split('</script>')[1].indexOf('aberta') !== -1) return element;
}).filter(element => element);

const arrConcursosInscricoesBreve = Array.from(cardsConcursos).map(element => {
    if (element.querySelector('.timestampInicioInscricoes').innerHTML.split('</script>')[1].indexOf('breve') !== -1) return element;
}).filter(element => element);

const arrConcursosForaPeriodo = Array.from(cardsConcursos).map(element => {
    if (element.querySelector('.timestampInicioInscricoes').innerHTML.split('</script>')[1].indexOf('fechada') !== -1) return element;
}).filter(element => element);


const anosPublicacao = [...new Set(arrConcursosForaPeriodo.map((element) => {
    return parseInt(element.querySelector('.timestampInicioInscricoes').innerHTML.split('fechada')[1]);
}))];

arrConcursosInscricoesAbertas.sort(function (a, b) {
    const tsA = parseInt(a.querySelector('.timestampInicioInscricoes').innerHTML.split('</script>')[1].replace('aberta', ''));
    const tsB = parseInt(b.querySelector('.timestampInicioInscricoes').innerHTML.split('</script>')[1].replace('aberta', ''));
    return tsA - tsB;
});

for (let i in arrConcursosInscricoesAbertas) {
    i = parseInt(i);
    concursosInscricoesAbertas.appendChild(arrConcursosInscricoesAbertas[i]);
    if (i === arrConcursosInscricoesAbertas.length - 1) arrConcursosInscricoesAbertas[i].style.border = '0';
}

for (let i in arrConcursosInscricoesBreve) {
    i = parseInt(i);
    concursosInscricoesBreve.appendChild(arrConcursosInscricoesBreve[i]);
    if (i === arrConcursosInscricoesBreve.length - 1) arrConcursosInscricoesBreve[i].style.border = '0';
}

let anoFor = 0;
let divAnoAtual = null;

for (let i = 0; i < arrConcursosForaPeriodo.length; i++) {
    let ano = parseInt(arrConcursosForaPeriodo[i].querySelector('.timestampInicioInscricoes').innerHTML.split('fechada')[1]);

    if (ano !== anoFor) {
        divAnoAtual = geraAno(ano);
        concursosForaPeriodo.appendChild(divAnoAtual);
        anoFor = ano;
    }

    const divConcurso = document.createElement('div');
    divConcurso.classList.add('concursoForaPeriodo');
    divConcurso.appendChild(arrConcursosForaPeriodo[i]);

    const divAno = divAnoAtual.querySelector('.anoPublicacao');
    divAno.appendChild(divConcurso);

    if (i === arrConcursosForaPeriodo.length - 1 || ano !== parseInt(arrConcursosForaPeriodo[i + 1].querySelector('.timestampInicioInscricoes').innerHTML.split('fechada')[1])) {
        divConcurso.firstChild.style.border = '0';
    }
}

const arrH3AnosAnterioresConcursos = concursosForaPeriodo.querySelectorAll('div.anoContainer h3');

for (let i of arrH3AnosAnterioresConcursos) {
    const conjuntoConcursosAnteriores = Array.from(i.nextElementSibling.classList).some(classe => classe.startsWith('anoPublicacao'));
    if (conjuntoConcursosAnteriores && i !== arrH3AnosAnterioresConcursos[0]) i.nextElementSibling.classList.add('hidden');
    arrH3AnosAnterioresConcursos[0].classList.add('clicked')
    i.addEventListener('click', () => {
        arrH3AnosAnterioresConcursos.forEach(element => {
            if (element !== i) {
                element.classList.remove('clicked');
                if (conjuntoConcursosAnteriores) element.nextElementSibling.classList.add('hidden');
            }
        });

        i.classList.toggle('clicked');
        if (conjuntoConcursosAnteriores) i.nextElementSibling.classList.toggle('hidden');

        if (conjuntoConcursosAnteriores && !i.nextElementSibling.classList.contains('hidden')) {
            i.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    });
}

function geraAno(ano) {
    const div = document.createElement('div');
    div.classList.add('anoContainer');
    const h3 = document.createElement('h3');
    h3.innerText = ano;
    div.appendChild(h3);
    const divAno = document.createElement('div');
    divAno.classList.add('anoPublicacao');
    div.appendChild(divAno);

    return div;
}

function geraTituloSecao(titulo, element) {
    const div = document.createElement('div');
    div.innerText = titulo;
    div.classList.add('tituloSecao')
    div.style.marginTop = '40px';
    return element.insertBefore(div, element.firstChild);
}

function titulos() {
    if (typeof concursosInscricoesAbertas === 'object') geraTituloSecao('Editais com inscrições abertas', concursosInscricoesAbertas);
    if (typeof concursosInscricoesBreve === 'object') geraTituloSecao('Editais com inscrições em breve', concursosInscricoesBreve);
    if (typeof concursosForaPeriodo === 'object') geraTituloSecao('Editais fora do período de inscrição', concursosForaPeriodo);
    if (concursosListaManual) geraTituloSecao('Outros Editais', concursosListaManual);
    return;
}

titulos();

function criaInput() {
    const input = document.createElement('input');
    input.setAttribute('id', 'inputP');
    input.setAttribute('type', 'text');
    input.setAttribute('onkeyup', 'procurarConcursos()');
    input.setAttribute('placeholder', 'O que está procurando?');
    return input;
}

function procurarConcursos() {
    const searchTerm = document.getElementById('inputP');
    const searchTermValue = searchTerm.value.toLowerCase();
    if (searchTerm.value !== '') {
        document.querySelectorAll('.cardConcursos').forEach(element => {
            const dataTitle = element.getAttribute('data-title').toLowerCase();
            if (!dataTitle.includes(searchTermValue)) element.style.display = 'none';
            else element.style.display = 'block';
        })
        concursosListaManual.querySelectorAll('li').forEach(element => {
            const data = element.innerText.toLowerCase();
            if (!data.includes(searchTermValue)) {
                element.style.display = 'none';
                if (!element.parentElement.previousElementSibling.classList.contains('tituloSecao')) element.parentElement.previousElementSibling.style.display = 'none';
            }
            else {
                element.style.display = 'block';
                element.parentElement.previousElementSibling.style.display = 'block';
            }
        })
    } else {
        document.querySelectorAll('.cardConcursos').forEach(element => {
            element.style.display = 'block';
        });
        concursosListaManual.querySelectorAll('li').forEach(element => {
            element.style.display = 'block';
            element.parentElement.previousElementSibling.style.display = 'block';
        })
    }

    let flagconcursosInscricoesAbertas = 0;
    for (let i of concursosInscricoesAbertas.querySelectorAll('.cardConcursos')) {
        if (i.style.display === 'block') flagconcursosInscricoesAbertas++;
    }
    if (flagconcursosInscricoesAbertas === 0) concursosInscricoesAbertas.style.display = 'none';
    else concursosInscricoesAbertas.style.display = 'block';

    let flagconcursosInscricoesBreve = 0;
    for (let i of concursosInscricoesBreve.querySelectorAll('.cardConcursos')) {
        if (i.style.display === 'block') flagconcursosInscricoesBreve++;
    }
    if (flagconcursosInscricoesBreve === 0) concursosInscricoesBreve.style.display = 'none';
    else concursosInscricoesBreve.style.display = 'block';

    let flagConcursosForaPeriodo = 0;
    for (let i of concursosForaPeriodo.querySelectorAll('.cardConcursos')) {
        if (i.style.display === 'block') flagConcursosForaPeriodo++;
    }
    if (flagConcursosForaPeriodo === 0) concursosForaPeriodo.style.display = 'none';
    else {
        concursosForaPeriodo.style.display = 'block';
        const anoContainers = document.querySelectorAll('.anoContainer');
        let flagAnoContainers = 0;
        for (let i of anoContainers) {
            for (let el of i.querySelectorAll('.cardConcursos')) {
                if (el.style.display === 'block') flagAnoContainers++
            }
            if (flagAnoContainers === 0) i.style.display = 'none';
            else i.style.display = 'block';
        }
    }

    let flagConcursosListaManual = 0;
    for (let i of concursosListaManual.querySelectorAll('li')) {
        if (i.style.display === 'block') flagConcursosListaManual++;
    }
    if (flagConcursosListaManual === 0) concursosListaManual.style.display = 'none';
    else concursosListaManual.style.display = 'block';
}

function geraBotoesUnidades(unidades, element) {
    const divBotoes = document.createElement('div');
    divBotoes.classList.add('botoesUnidades');
    unidades.forEach((unidade) => {
        const botao = document.createElement('button');
        botao.innerText = unidade;
        botao.classList.add('botaoUnidade');
        botao.addEventListener('click', (event) => {
            aplicarFiltro(unidade, event);
        });
        divBotoes.appendChild(botao);
    });
    return element.insertAdjacentElement('afterend', divBotoes);
}

function aplicarFiltro(unidade, event) {
    document.querySelector('input#inputP').value = '';
    const unidadeLowerCase = unidade.toLowerCase();
    const listaElementos = document.querySelectorAll('.cardConcursos');
    const listaElementosOutros = concursosListaManual.querySelectorAll('li');
    const anoPublicacaoElements = concursosForaPeriodo.querySelectorAll('.anoContainer .anoPublicacao');
    const ulElements = concursosListaManual.querySelectorAll('ul');

    const resetDisplay = () => {

        listaElementos.forEach(elemento => (elemento.style.display = 'block'));
        listaElementosOutros.forEach(elemento => (elemento.style.display = 'block'));
        anoPublicacaoElements.forEach(element => {
            const previousElement = element.previousElementSibling;
            if (!todosConcursosFechados(element)) {
                previousElement.style.display = 'block';
            }
        });

        concursosInscricoesAbertas.style.display = 'block';
        concursosInscricoesBreve.style.display = 'block';
        concursosForaPeriodo.style.display = 'block';

        ulElements.forEach(element => (element.previousElementSibling.style.display = 'block'));
    };

    const ocultarTodos = () => {
        listaElementos.forEach(elemento => (elemento.style.display = textoContemUnidade(elemento, unidadeLowerCase) ? 'block' : 'none'));
        listaElementosOutros.forEach(elemento => (elemento.style.display = textoContemUnidade(elemento, unidadeLowerCase) ? 'block' : 'none'));
        anoPublicacaoElements.forEach(element => {
            const previousElement = element.previousElementSibling;
            if (previousElement && !element.classList.contains('hidden') && !textoContemUnidade(element, unidadeLowerCase)) {
                previousElement.classList.remove('clicked');
                previousElement.style.display = 'none';
            }
            if (previousElement && element.classList.contains('hidden') && !textoContemUnidade(element, unidadeLowerCase)) {
                previousElement.classList.remove('clicked');
                previousElement.style.display = 'none';
            }
        });

        const shouldHideInscricoesAbertas = todosConcursosEscondidos(concursosInscricoesAbertas);
        const shouldHideInscricoesBreve = todosConcursosEscondidos(concursosInscricoesBreve);
        const shouldHideForaPeriodo = todosConcursosEscondidos(concursosForaPeriodo);

        concursosInscricoesAbertas.style.display = shouldHideInscricoesAbertas ? 'none' : 'block';
        concursosInscricoesBreve.style.display = shouldHideInscricoesBreve ? 'none' : 'block';
        concursosForaPeriodo.style.display = shouldHideForaPeriodo ? 'none' : 'block';

        ulElements.forEach((element, index) => {
            if (index !== 0 && todosElementosEscondidos(element.querySelectorAll('li'))) {
                element.previousElementSibling.style.display = 'none';
            }
        });
    };

    const allButtons = document.querySelectorAll('.botoesUnidades button');
    const clickedButton = event.target;

    if (clickedButton.classList.contains('clicked')) {
        resetDisplay();
        clickedButton.classList.remove('clicked');
    } else {
        resetDisplay();
        allButtons.forEach(btn => btn.classList.remove('clicked'));
        ocultarTodos();
        clickedButton.classList.add('clicked');
    }

    function todosConcursosFechados(element) {
        return Array.from(element.querySelectorAll('.cardConcursos')).every(el => el.style.display === 'none');
    }

    function textoContemUnidade(element, unidade) {
        return element.innerText.toLowerCase().includes(unidade);
    }

    function todosConcursosEscondidos(container) {
        return Array.from(container.querySelectorAll('.cardConcursos')).every(el => el.style.display === 'none');
    }

    function todosElementosEscondidos(elements) {
        return Array.from(elements).every(el => el.style.display === 'none');
    }
}
