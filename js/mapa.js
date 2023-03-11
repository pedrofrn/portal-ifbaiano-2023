const mapaLegenda = document.querySelector('#mapa ul')
const listaCidades = document.querySelectorAll('.legendaMapa ul li')
const canvas = document.querySelector('canvas#canvasMapa');
canvas.width = 360
canvas.height = 360
const ctx = canvas.getContext('2d');

const cidadesCoordenadas = {
    'Alagoinhas': [289, 135, 'https://www.ifbaiano.edu.br/unidades/alagoinhas'],
    'Bom Jesus da Lapa': [153, 187, 'https://www.ifbaiano.edu.br/unidades/lapa'],
    'Catu': [294, 150, 'https://www.ifbaiano.edu.br/unidades/catu'],
    'Governador Mangabeira': [267, 159, 'https://www.ifbaiano.edu.br/unidades/gmb'],
    'Guanambi': [184, 218, 'https://www.ifbaiano.edu.br/unidades/guanambi'],
    'Itaberaba': [225, 154, 'https://www.ifbaiano.edu.br/unidades/itaberaba'],
    'Itapetinga': [230, 240, 'https://www.ifbaiano.edu.br/unidades/itapetinga'],
    'Santa Inês': [244, 180, 'https://www.ifbaiano.edu.br/unidades/santaines'],
    'Senhor do Bonfim': [234, 85, 'https://www.ifbaiano.edu.br/unidades/bonfim'],
    'Serrinha': [267, 125, 'https://www.ifbaiano.edu.br/unidades/serrinha'],
    'Teixeira de Freitas': [249, 310, 'https://www.ifbaiano.edu.br/unidades/teixeira'],
    'Uruçuca': [258, 223, 'https://www.ifbaiano.edu.br/unidades/urucuca'],
    'Valença': [267, 191, 'https://www.ifbaiano.edu.br/unidades/valenca'],
    'Xique-Xique': [158, 112, 'https://www.ifbaiano.edu.br/unidades/xique-xique'],
}

for (const c of Object.keys(cidadesCoordenadas)) {
    campusMapa(c, true)
}

canvas.onmousemove = function (e) {
    const coordenadas = [e.offsetX, e.offsetY]
    const area = [[coordenadas[0] - 5, coordenadas[0] + 5], [coordenadas[1] - 5, coordenadas[1] + 5]]
    for (const c of Object.keys(cidadesCoordenadas)) {
        if ((cidadesCoordenadas[c][0] >= area[0][0] && cidadesCoordenadas[c][0] <= area[0][1]) &&
            (cidadesCoordenadas[c][1] >= area[1][0] && cidadesCoordenadas[c][1] <= area[1][1])) {
            canvas.onclick = () => goLink(cidadesCoordenadas[c][2]);
            campusMapa(c)
        }
        else campusMapa(c, true)
    }
}

function campusMapa(cidade, out = false) {
    
    ctx.fillStyle = '#b3bbb0';
    const xpath = `//li[text()='${cidade}']`;
    let matchingElement = document.evaluate(xpath, document, null, XPathResult.FIRST_ORDERED_NODE_TYPE, null).singleNodeValue;
    
    if (!out) {
        canvas.style.cursor = 'pointer';
        ctx.fillStyle = '#c80710';
        matchingElement.classList.add('hoverLiCampus')
    }
    else {
        if (matchingElement.classList.contains('hoverLiCampus')) {
            matchingElement.classList.remove('hoverLiCampus')
            canvas.style.cursor = 'initial';
        }
    }    

    const circle = new Path2D();
    variavel = circle.arc(cidadesCoordenadas[cidade][0], cidadesCoordenadas[cidade][1], 6, 0, 5 * Math.PI);
    return ctx.fill(circle);
}

function goLink(url) {
    window.open(url, '_blank');
}

mapaLegenda.addEventListener('mouseover', (e) => {
    campusMapa(e.target.innerText)
    const campusOn = mapaLegenda.querySelector('.hoverLiCampus')
    campusOn.onclick = () => goLink(cidadesCoordenadas[campusOn.innerText][2]);
    e.target.addEventListener('mouseout', () => {
        campusMapa(e.target.innerText, true)
    })
})