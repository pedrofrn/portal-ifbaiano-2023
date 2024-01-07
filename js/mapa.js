if (document.querySelector('#mapa')) {
    const mapaLegenda = document.querySelector('#mapa ul')
    const listaCidades = document.querySelectorAll('.legendaMapa ul li')
    const canvas = document.querySelector('canvas#canvasMapa');

    const scale = window.innerWidth < 960 ? (window.innerWidth - 20) / 360 : 1;
    canvas.width = scale === 1 ? 360 * scale : 340 * scale;
    canvas.height = scale === 1 ? 360 * scale : 340 * scale;


    const ctx = canvas.getContext('2d');

    const cidadesCoordenadas = {
        'Alagoinhas': [289 * scale, 135 * scale, 'https://www.ifbaiano.edu.br/unidades/alagoinhas'],
        'Bom Jesus da Lapa': [153 * scale, 187 * scale, 'https://www.ifbaiano.edu.br/unidades/lapa'],
        'Catu': [294 * scale, 150 * scale, 'https://www.ifbaiano.edu.br/unidades/catu'],
        'Governador Mangabeira': [267 * scale, 159 * scale, 'https://www.ifbaiano.edu.br/unidades/gmb'],
        'Guanambi': [184 * scale, 218 * scale, 'https://www.ifbaiano.edu.br/unidades/guanambi'],
        'Itaberaba': [225 * scale, 154 * scale, 'https://www.ifbaiano.edu.br/unidades/itaberaba'],
        'Itapetinga': [230 * scale, 240 * scale, 'https://www.ifbaiano.edu.br/unidades/itapetinga'],
        'Santa Inês': [244 * scale, 180 * scale, 'https://www.ifbaiano.edu.br/unidades/santaines'],
        'Senhor do Bonfim': [234 * scale, 85 * scale, 'https://www.ifbaiano.edu.br/unidades/bonfim'],
        'Serrinha': [267 * scale, 125 * scale, 'https://www.ifbaiano.edu.br/unidades/serrinha'],
        'Teixeira de Freitas': [249 * scale, 310 * scale, 'https://www.ifbaiano.edu.br/unidades/teixeira'],
        'Uruçuca': [258 * scale, 223 * scale, 'https://www.ifbaiano.edu.br/unidades/urucuca'],
        'Valença': [267 * scale, 191 * scale, 'https://www.ifbaiano.edu.br/unidades/valenca'],
        'Xique-Xique': [158 * scale, 112 * scale, 'https://www.ifbaiano.edu.br/unidades/xique-xique'],
    }

    for (const c of Object.keys(cidadesCoordenadas)) {
        campusMapa(c, true)
    }
    let ultimaCidade;
    canvas.onmousemove = function (e) {
        const coordenadas = [e.offsetX, e.offsetY];
        const area = [
            [coordenadas[0] - 5, coordenadas[0] + 5],
            [coordenadas[1] - 5, coordenadas[1] + 5]
        ];
        let cidadeEncontrada = null;

        for (const c of Object.keys(cidadesCoordenadas)) {
            if (
                cidadesCoordenadas[c][0] >= area[0][0] &&
                cidadesCoordenadas[c][0] <= area[0][1] &&
                cidadesCoordenadas[c][1] >= area[1][0] &&
                cidadesCoordenadas[c][1] <= area[1][1]
            ) {
                cidadeEncontrada = c;
                canvas.onclick = () => goLink(cidadesCoordenadas[c][2]);
            }
        }

        if (cidadeEncontrada) {
            mostrarNomeCidade(cidadeEncontrada);
            campusMapa(cidadeEncontrada)
            ultimaCidade = cidadeEncontrada

        } else {
            ocultarNomeCidade();
            campusMapa(ultimaCidade, true)
        }
    };

    canvas.onmouseout = function () {
        ocultarNomeCidade();
    };

    function mostrarNomeCidade(cidade) {
        ctx.font = '12px Arial';
        ctx.fillStyle = '#000000';

        const x = 10;
        const y = canvas.height - 10;

        ctx.clearRect(x, y - 15, ctx.measureText(cidade).width + 20, 20);
        ctx.fillText(cidade, x, y);
    }

    function ocultarNomeCidade() {
        ctx.clearRect(0, canvas.height - 25, canvas.width, 25);
    }

    function campusMapa(cidade, out = false) {

        ctx.fillStyle = '#369837';
        const xpath = `//li[text()='${cidade}']`;
        let matchingElement = document.evaluate(xpath, document, null, XPathResult.FIRST_ORDERED_NODE_TYPE, null).singleNodeValue;

        if (!out) {
            canvas.style.cursor = 'pointer';
            ctx.fillStyle = '#c80710';
            matchingElement.classList.add('hoverLiCampus');
        }
        else {
            if (matchingElement && matchingElement.classList.contains('hoverLiCampus')) {
                matchingElement.classList.remove('hoverLiCampus')
                canvas.style.cursor = 'initial';
            }
        }

        const circle = new Path2D();
        variavel = cidadesCoordenadas[cidade] === undefined ? '' : circle.arc(cidadesCoordenadas[cidade][0], cidadesCoordenadas[cidade][1], 5, 0, 5 * Math.PI);
        return ctx.fill(circle);
    }

    function goLink(url) {
        setTimeout(() => window.open(url, '_blank'), 3000);
    }

    mapaLegenda.addEventListener('mouseover', (e) => {
        campusMapa(e.target.innerText)
        const campusOn = mapaLegenda.querySelector('.hoverLiCampus')
        campusOn.onclick = () => goLink(cidadesCoordenadas[campusOn.innerText][2]);
        e.target.addEventListener('mouseout', () => {
            campusMapa(e.target.innerText, true)
        })
    })
}
