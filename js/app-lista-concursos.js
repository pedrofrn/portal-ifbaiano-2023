let inscricoesAbertas = '';
let timestampInicioInscricoes = '';
const cardsConcursos = document.querySelectorAll('.cardConcursos');

const concursosInscricoesAbertas = document.querySelector('.concursosInscricoesAbertas');
const concursosForaPeriodo = document.querySelector('.concursosForaPeriodo');

const arrConcursosInscricoesAbertas = Array.from(cardsConcursos).map(element => {
    if (parseInt(element.querySelector('.timestampInicioInscricoes').innerHTML.split('</script>')[1]) !== 0) return element;
}).filter(element => element);

const arrConcursosForaPeriodo = Array.from(cardsConcursos).map(element => {
    if (parseInt(element.querySelector('.timestampInicioInscricoes').innerHTML.split('</script>')[1]) === 0) return element;
}).filter(element => element);

arrConcursosInscricoesAbertas.sort(function (a, b) {
    const tsA = parseInt(a.querySelector('.timestampInicioInscricoes').innerHTML.split('</script>')[1]);
    const tsB = parseInt(b.querySelector('.timestampInicioInscricoes').innerHTML.split('</script>')[1]);
    return tsB - tsA;
});

for (let i in arrConcursosInscricoesAbertas) {
    concursosInscricoesAbertas.appendChild(arrConcursosInscricoesAbertas[i]);
}

for (let i in arrConcursosForaPeriodo) {
    concursosForaPeriodo.appendChild(arrConcursosForaPeriodo[i]);
}

function geraTituloSecao(titulo, element) {
    const h2 = document.createElement('h2');
    h2.innerText = titulo;
    return element.insertBefore(h2, element.firstChild);
}

function titulos() {
    if (typeof concursosInscricoesAbertas === 'object') geraTituloSecao('Editais com inscrições abertas', concursosInscricoesAbertas);
    if (typeof concursosForaPeriodo === 'object') geraTituloSecao('Editais fora do período de inscrição', concursosForaPeriodo);
    return;
}

titulos();