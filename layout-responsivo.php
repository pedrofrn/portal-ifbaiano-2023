<script>
window.addEventListener('load', verificarLarguraDaTela);
window.addEventListener('resize', verificarLarguraDaTela);
const urlHome ='<?php echo home_url(); ?>';
function verificarLarguraDaTela() {
    if (screen.width < 960) layoutResponsivo();
    else return;
}

function insereApos(ref, element) {
    return ref.parentNode.insertBefore(element, ref.nextSibling);
}

function layoutResponsivo() {
    const containerEsquerda = document.querySelector('div#containerMeioEsquerda');
    if (window.location.href === urlHome || window.location.href === `${urlHome}/`) {
        const mural = containerEsquerda.querySelector('div#bannerLatSecao');
        const btnEditais = containerEsquerda.querySelector('a.btnEditais');
        const informes = containerEsquerda.querySelector('div.informesSecao');
        informes ? informes.style.marginTop = '50px' : null;
        btnEditais ? insereApos(document.querySelector('#Noticias'), btnEditais) : null;
        mural ? insereApos(document.querySelector('#Noticias'), mural) : null;
        informes ? insereApos(document.querySelector('div.cursosMapa'), informes) : null;
    }
    containerEsquerda.remove();
}
</script>