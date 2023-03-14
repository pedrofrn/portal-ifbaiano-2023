const meioCentro = document.querySelector('#containerMeioCentro');
const avisosBG = document.querySelector('#avisosImportantes');
const avisos = document.querySelectorAll('#avisosImportantes span.spanX');
const aXAvisos = meioCentro.querySelector('span.spanX');

if (avisos.length > 1) {
    $("#avisosImportantes > div:gt(0)").hide();

    setInterval(function () {
        $('#avisosImportantes > div:first')
            .fadeOut(00)
            .next()
            .fadeIn(1200)
            .end()
            .appendTo('#avisosImportantes');
    }, 6000);
}

if (aXAvisos) {
    aXAvisos.innerHTML = "<svg fill='none' stroke='currentColor' stroke-width='1.5' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg' aria-hidden='true'><path stroke-linecap='round' stroke-linejoin='round' d='M6 18L18 6M6 6l12 12'></path></svg >";
    aXAvisos.addEventListener('click', () => {
        avisosBG.style.display = 'none';
    });
}