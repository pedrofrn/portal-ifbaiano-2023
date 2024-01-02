const localMarca = document.querySelector('#marcaCampus');
const nomeUnidade = document.querySelector('a.nomeUnidade');
const rodapeH2 = document.querySelector('h2.inforodape');
const rodapeP = document.querySelector('p.inforodape');
const localMapa = document.querySelector('#mapaCampus');
const tituloDocentes = document.querySelector('h3.cardsDocentes');
const corpoDocente = document.querySelector('div#corpoDocente');
if (corpoDocente) {
    corpoDocente.style.display = 'none';
    const expandir = tituloDocentes.appendChild(criaSpanExpand());
    document.querySelector('div#secaoCD').addEventListener('click', () => {
        if (corpoDocente.style.display === 'flex') {
            expandir.classList.remove('up');
            expandir.classList.add('down');
            return corpoDocente.style.display = 'none';
        }
        else {
            expandir.classList.remove('down');
            expandir.classList.add('up');
            return corpoDocente.style.display = 'flex';
        }
    })
    
}

function selecionaMarca() {
    if (nomeUnidade.innerText === 'IF Baiano' || nomeUnidade.innerText === 'Instituto Federal Baiano') {
        const marca = localMarca.appendChild(criaImg());
        document.querySelector('div.irPortal').innerHTML = '';
        return marca.setAttribute('src', `${templateUrl}/imagens/marca-if-baiano.svg`);
    }
    if (nomeUnidade.innerText === 'Campus Alagoinhas') {
        const marca = localMarca.appendChild(criaImg());
        marca.setAttribute('src', `${templateUrl}/imagens/marca-if-baiano-alagoinhas.svg`);
        rodapeH2.innerText = `Instituto Federal de Educação, Ciência e Tecnologia Baiano - ${nomeUnidade.innerText}`;
        rodapeP.innerText = `Rua Manoel Romão, 150, Alagoinhas Velha – Alagoinhas/BA. CEP: 48030-530, E-mail: gabinete@alagoinhas.ifbaiano.edu.br, Telefone: (75) 3422-6122 | (75) 3421-4511`;
        const marcaRodape = rodapeH2.parentElement.insertBefore(criaImg(), rodapeH2.parentElement.firstChild);
        marcaRodape.setAttribute('src', `${templateUrl}/imagens/marca-if-baiano-alagoinhas-horizontal.svg`);
        marcaRodape.setAttribute('class', 'marcaRodape');
        localMapa.innerHTML = `<div class="tituloSecao">Localização do ${nomeUnidade.innerText}</div>`;
        const mapa = localMapa.appendChild(criaMapa());
        mapa.setAttribute('src', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3900.5010535286583!2d-38.405459184752196!3d-12.146252791401047!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x716bdd4a5b84925%3A0x3669af8a3e7a95a0!2sIF%20Baiano%20-%20Campus%20Alagoinhas!5e0!3m2!1spt-BR!2sbr!4v1638813745972!5m2!1spt-BR!2sbr');
        return;
    }
    if (nomeUnidade.innerText === 'Campus Bom Jesus da Lapa') {
        const marca = localMarca.appendChild(criaImg());
        marca.setAttribute('src', `${templateUrl}/imagens/marca-if-baiano-bom-jesus-da-lapa.svg`);
        rodapeH2.innerText = `Instituto Federal de Educação, Ciência e Tecnologia Baiano - ${nomeUnidade.innerText}`;
        rodapeP.innerText = `BR 349, Km 14 - Zona Rural, Bom Jesus da Lapa - Bahia, CEP: 47600-000, Telefones: (77) 3481-2521 / (77) 3481-4513, E-mail: gabinete@lapa.ifbaiano.edu.br`;
        const marcaRodape = rodapeH2.parentElement.insertBefore(criaImg(), rodapeH2.parentElement.firstChild);
        marcaRodape.setAttribute('src', `${templateUrl}/imagens/marca-if-baiano-bom-jesus-da-lapa-horizontal.svg`);
        marcaRodape.setAttribute('class', 'marcaRodape');
        localMapa.innerHTML = `<div class="tituloSecao">Localização do ${nomeUnidade.innerText}</div>`;
        const mapa = localMapa.appendChild(criaMapa());
        mapa.setAttribute('src', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3883.4038108316972!2d-43.54911938474244!3d-13.262687090665374!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x75c0a3a234c7c6b%3A0xb58bf78fffd01a3!2sInstituto%20Federal%20de%20Educa%C3%A7%C3%A3o%2C%20Ci%C3%AAncia%20e%20Tecnologia%20Baiano%2C%20Campus%20Bom%20Jesus%20da%20Lapa!5e0!3m2!1spt-BR!2sbr!4v1638813880066!5m2!1spt-BR!2sbr');
        return;
    }
    if (nomeUnidade.innerText === 'Campus Catu') {
        const marca = localMarca.appendChild(criaImg());
        marca.setAttribute('src', `${templateUrl}/imagens/marca-if-baiano-catu.svg`);
        rodapeH2.innerText = `Instituto Federal de Educação, Ciência e Tecnologia Baiano - ${nomeUnidade.innerText}`;
        rodapeP.innerText = `Rua Barão de Camaçari, 118 – Centro - CEP 48110-000, E-mail: gabinete@catu.ifbaiano.edu.br, Telefone: (71) 3641-7901 / 7909`;
        const marcaRodape = rodapeH2.parentElement.insertBefore(criaImg(), rodapeH2.parentElement.firstChild);
        marcaRodape.setAttribute('src', `${templateUrl}/imagens/marca-if-baiano-catu-horizontal.svg`);
        marcaRodape.setAttribute('class', 'marcaRodape');
        localMapa.innerHTML = `<div class="tituloSecao">Localização do ${nomeUnidade.innerText}</div>`;
        const mapa = localMapa.appendChild(criaMapa());
        mapa.setAttribute('src', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3897.3795741726026!2d-38.3783976847503!3d-12.357487491260873!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x7168decb1bb3b49%3A0x9a9eaf8aa0cdad26!2sIF%20Baiano%20Campus%20Catu!5e0!3m2!1spt-BR!2sbr!4v1638812380630!5m2!1spt-BR!2sbr');
        return;
    }
    if (nomeUnidade.innerText === 'Campus Governador Mangabeira') {
        const marca = localMarca.appendChild(criaImg());
        marca.setAttribute('src', `${templateUrl}/imagens/marca-if-baiano-governador-mangabeira.svg`);
        rodapeH2.innerText = `Instituto Federal de Educação, Ciência e Tecnologia Baiano - ${nomeUnidade.innerText}`;
        rodapeP.innerText = `Rua Waldemar Mascarenhas, s/n – Portão (Estrada Velha da Chesf) - CEP 44350-000, E-mail: gabinete@gm.ifbaiano.edu.br, Telefones: (75) 3638-2012 / 3638-2081`;
        const marcaRodape = rodapeH2.parentElement.insertBefore(criaImg(), rodapeH2.parentElement.firstChild);
        marcaRodape.setAttribute('src', `${templateUrl}/imagens/marca-if-baiano-governador-mangabeira-horizontal.svg`);
        marcaRodape.setAttribute('class', 'marcaRodape');
        localMapa.innerHTML = `<div class="tituloSecao">Localização do ${nomeUnidade.innerText}</div>`;
        const mapa = localMapa.appendChild(criaMapa());
        mapa.setAttribute('src', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3893.6053067291564!2d-39.03290838474843!3d-12.608243891095034!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x715b92ab5be3a5d%3A0x675ed73f8a5a8cc3!2sInstituto%20Federal%20Baiano%20Governador%20Mangabeira!5e0!3m2!1spt-BR!2sbr!4v1638813927970!5m2!1spt-BR!2sbr');
        return;
    }
    if (nomeUnidade.innerText === 'Campus Guanambi') {
        const marca = localMarca.appendChild(criaImg());
        marca.setAttribute('src', `${templateUrl}/imagens/marca-if-baiano-guanambi.svg`);
        rodapeH2.innerText = `Instituto Federal de Educação, Ciência e Tecnologia Baiano - ${nomeUnidade.innerText}`;
        rodapeP.innerText = `Zona Rural - Distrito de Ceraíma, Bahia - CEP: 46430-000, Tel.: (77) 3493-2100, E-mail: diretor@guanambi.ifbaiano.edu.br`;
        const marcaRodape = rodapeH2.parentElement.insertBefore(criaImg(), rodapeH2.parentElement.firstChild);
        marcaRodape.setAttribute('src', `${templateUrl}/imagens/marca-if-baiano-guanambi-horizontal.svg`);
        marcaRodape.setAttribute('class', 'marcaRodape');
        localMapa.innerHTML = `<div class="tituloSecao">Localização do ${nomeUnidade.innerText}</div>`;
        const mapa = localMapa.appendChild(criaMapa());
        mapa.setAttribute('src', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3866.1690298489666!2d-42.69588058473275!3d-14.301609689993478!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x75ac88e01cf19d5%3A0x3eeac85e6070b24b!2sInstituto%20Federal%20de%20Educa%C3%A7%C3%A3o%2C%20Ci%C3%AAncia%20e%20Tecnologia%20Baiano%2C%20Campus%20Guanambi!5e0!3m2!1spt-BR!2sbr!4v1638813960762!5m2!1spt-BR!2sbr');
        return;
    }
    if (nomeUnidade.innerText === 'Campus Itaberaba') {
        const marca = localMarca.appendChild(criaImg());
        marca.setAttribute('src', `${templateUrl}/imagens/marca-if-baiano-itaberaba.svg`);
        rodapeH2.innerText = `Instituto Federal de Educação, Ciência e Tecnologia Baiano - ${nomeUnidade.innerText}`;
        rodapeP.innerText = `Rodovia BA-233, Km 04, Itaberaba – BA, CEP 46880-000, Caixa Postal 22, E-mail: gabinete@itaberaba.ifbaiano.edu.br, Telefone: (75) 98302-6658 | (71) 98141-5536`;
        const marcaRodape = rodapeH2.parentElement.insertBefore(criaImg(), rodapeH2.parentElement.firstChild);
        marcaRodape.setAttribute('src', `${templateUrl}/imagens/marca-if-baiano-itaberaba-horizontal.svg`);
        marcaRodape.setAttribute('class', 'marcaRodape');
        localMapa.innerHTML = `<div class="tituloSecao">Localização do ${nomeUnidade.innerText}</div>`;
        const mapa = localMapa.appendChild(criaMapa());
        mapa.setAttribute('src', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3895.1751362663413!2d-40.25229058474908!3d-12.504547991163445!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x76abe06dd35a6cd%3A0x542ee266877cb697!2sInstituto%20Federal%20de%20Educa%C3%A7%C3%A3o%2C%20Ci%C3%AAncia%20e%20Tecnologia%20Baiano%20Campus%20Itaberaba!5e0!3m2!1spt-BR!2sbr!4v1638813991810!5m2!1spt-BR!2sbr');
        return;
    }
    if (nomeUnidade.innerText === 'Campus Itapetinga') {
        const marca = localMarca.appendChild(criaImg());
        marca.setAttribute('src', `${templateUrl}/imagens/marca-if-baiano-itapetinga.svg`);
        rodapeH2.innerText = `Instituto Federal de Educação, Ciência e Tecnologia Baiano - ${nomeUnidade.innerText}`;
        rodapeP.innerText = `Km 02 - Clerolandia, Itapetinga-Bahia, CEP: 45700-000, Tel.: (77) 3261-2213, E-mail: gabinete@itapetinga.ifbaiano.edu.br`;
        const marcaRodape = rodapeH2.parentElement.insertBefore(criaImg(), rodapeH2.parentElement.firstChild);
        marcaRodape.setAttribute('src', `${templateUrl}/imagens/marca-if-baiano-itapetinga-horizontal.svg`);
        marcaRodape.setAttribute('class', 'marcaRodape');
        localMapa.innerHTML = `<div class="tituloSecao">Localização do ${nomeUnidade.innerText}</div>`;
        const mapa = localMapa.appendChild(criaMapa());
        mapa.setAttribute('src', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3849.4099761186812!2d-40.23048578472343!3d-15.245422189394368!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x7480be1dbfb78b5%3A0x6aec9f1f2b41b2d0!2sInstituto%20Federal%20de%20Educa%C3%A7%C3%A3o%2C%20Ci%C3%AAncia%20e%20Tecnologia%20Baiano%2C%20Campus%20Itapetinga!5e0!3m2!1spt-BR!2sbr!4v1638814015706!5m2!1spt-BR!2sbr');
        return;
    }
    if (nomeUnidade.innerText === 'Campus Santa Inês') {
        const marca = localMarca.appendChild(criaImg());
        marca.setAttribute('src', `${templateUrl}/imagens/marca-if-baiano-santa-ines.svg`);
        rodapeH2.innerText = `Instituto Federal de Educação, Ciência e Tecnologia Baiano - ${nomeUnidade.innerText}`;
        rodapeP.innerText = `BR 420 (Rodovia Santa Inês – Ubaíra), Zona Rural, Bahia - CEP: 45320-000, Tel.:(73) 3536-1213 | (73) 3536-1214 | (73) 3536-1210, E-mail: gabinete@si.ifbaiano.edu.br`;
        const marcaRodape = rodapeH2.parentElement.insertBefore(criaImg(), rodapeH2.parentElement.firstChild);
        marcaRodape.setAttribute('src', `${templateUrl}/imagens/marca-if-baiano-santa-ines-horizontal.svg`);
        marcaRodape.setAttribute('class', 'marcaRodape');
        localMapa.innerHTML = `<div class="tituloSecao">Localização do ${nomeUnidade.innerText}</div>`;
        const mapa = localMapa.appendChild(criaMapa());
        mapa.setAttribute('src', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3883.1699820868075!2d-39.80967038474237!3d-13.277315890655816!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x73f9022d85340db%3A0xd7598a5335b1feb0!2sIF%20Baiano%20Campus%20Santa%20In%C3%AAs!5e0!3m2!1spt-BR!2sbr!4v1638814042536!5m2!1spt-BR!2sbr');
        return;
    }
    if (nomeUnidade.innerText === 'Campus Senhor do Bonfim') {
        const marca = localMarca.appendChild(criaImg());
        marca.setAttribute('src', `${templateUrl}/imagens/marca-if-baiano-senhor-do-bonfim.svg`);
        rodapeH2.innerText = `Instituto Federal de Educação, Ciência e Tecnologia Baiano - ${nomeUnidade.innerText}`;
        rodapeP.innerText = `Estrada da Igara, s/n - Zona Rural, Senhor do Bonfim - Bahia, CEP: 48970-000, Tel.: (74) 3542-4000, E-mail: gabinete@bonfim.ifbaiano.edu.br`;
        const marcaRodape = rodapeH2.parentElement.insertBefore(criaImg(), rodapeH2.parentElement.firstChild);
        marcaRodape.setAttribute('src', `${templateUrl}/imagens/marca-if-baiano-senhor-do-bonfim-horizontal.svg`);
        marcaRodape.setAttribute('class', 'marcaRodape');
        localMapa.innerHTML = `<div class="tituloSecao">Localização do ${nomeUnidade.innerText}</div>`;
        const mapa = localMapa.appendChild(criaMapa());
        mapa.setAttribute('src', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3923.699352685952!2d-40.149135284765336!3d-10.445414792546662!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x76d5853b7d6672d%3A0x59f8cd6f00ec8510!2sInstituto%20Federal%20de%20Educa%C3%A7%C3%A3o%2C%20Ci%C3%AAncia%20e%20Tecnologia%2C%20Campus%20Senhor%20do%20Bonfim!5e0!3m2!1spt-BR!2sbr!4v1638814069960!5m2!1spt-BR!2sbr');
        return;
    }
    if (nomeUnidade.innerText === 'Campus Serrinha') {
        const marca = localMarca.appendChild(criaImg());
        marca.setAttribute('src', `${templateUrl}/imagens/marca-if-baiano-serrinha.svg`);
        rodapeH2.innerText = `Instituto Federal de Educação, Ciência e Tecnologia Baiano - ${nomeUnidade.innerText}`;
        rodapeP.innerText = `Estrada Vicinal de Aparecida, s/n, Bairro Aparecida, Serrinha - Bahia, CEP: 48700-000, E-mail: gabinete@serrinha.ifbaiano.edu.br, Telefone: (71)3186-0021`;
        const marcaRodape = rodapeH2.parentElement.insertBefore(criaImg(), rodapeH2.parentElement.firstChild);
        marcaRodape.setAttribute('src', `${templateUrl}/imagens/marca-if-baiano-serrinha-horizontal.svg`);
        marcaRodape.setAttribute('class', 'marcaRodape');
        localMapa.innerHTML = `<div class="tituloSecao">Localização do ${nomeUnidade.innerText}</div>`;
        const mapa = localMapa.appendChild(criaMapa());
        mapa.setAttribute('src', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3907.1969584670637!2d-38.98611588475602!3d-11.680449491711979!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x713f32a6baaa35f%3A0x89abd5c04df7a877!2sIF%20Baiano%20-%20Campus%20Serrinha!5e0!3m2!1spt-BR!2sbr!4v1638814105431!5m2!1spt-BR!2sbr');
        return;
    }
    if (nomeUnidade.innerText === 'Campus Teixeira de Freitas') {
        const marca = localMarca.appendChild(criaImg());
        marca.setAttribute('src', `${templateUrl}/imagens/marca-if-baiano-teixeira-de-freitas.svg`);
        rodapeH2.innerText = `Instituto Federal de Educação, Ciência e Tecnologia Baiano - ${nomeUnidade.innerText}`;
        rodapeP.innerText = `Rodovia BR 101, Km 882, s/n, CEP. 45.985-970, Caixa Postal 66, Tel.: (73) 3665 -1031/1032, E-mail: gabinete@teixeira.ifbaiano.edu.br`;
        const marcaRodape = rodapeH2.parentElement.insertBefore(criaImg(), rodapeH2.parentElement.firstChild);
        marcaRodape.setAttribute('src', `${templateUrl}/imagens/marca-if-baiano-teixeira-de-freitas-horizontal.svg`);
        marcaRodape.setAttribute('class', 'marcaRodape');
        localMapa.innerHTML = `<div class="tituloSecao">Localização do ${nomeUnidade.innerText}</div>`;
        const mapa = localMapa.appendChild(criaMapa());
        mapa.setAttribute('src', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3803.6028517023033!2d-39.7342443846976!3d-17.57408528796691!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xa3e2180c777a9eb2!2sIF%20-%20Instituto%20Federal%20de%20Educa%C3%A7%C3%A3o%2C%20Ci%C3%AAncia%20e%20Tecnologia%20Baiano%2C%20Campus%20Teixeira%20de%20Freitas!5e0!3m2!1spt-BR!2sbr!4v1638814140271!5m2!1spt-BR!2sbr');
        return;
    }
    if (nomeUnidade.innerText === 'Campus Uruçuca') {
        const marca = localMarca.appendChild(criaImg());
        marca.setAttribute('src', `${templateUrl}/imagens/marca-if-baiano-urucuca.svg`);
        rodapeH2.innerText = `Instituto Federal de Educação, Ciência e Tecnologia Baiano - ${nomeUnidade.innerText}`;
        rodapeP.innerText = `Rua Dr. João Nascimento – S/N – Centro, Uruçuca-Bahia, CEP: 45680-000, Tel.: (73) 3239-6500, E-mail: gabinete@urucuca.ifbaiano.edu.br`;
        const marcaRodape = rodapeH2.parentElement.insertBefore(criaImg(), rodapeH2.parentElement.firstChild);
        marcaRodape.setAttribute('src', `${templateUrl}/imagens/marca-if-baiano-urucuca-horizontal.svg`);
        marcaRodape.setAttribute('class', 'marcaRodape');
        localMapa.innerHTML = `<div class="tituloSecao">Localização do ${nomeUnidade.innerText}</div>`;
        const mapa = localMapa.appendChild(criaMapa());
        mapa.setAttribute('src', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3861.0896599979656!2d-39.28450058472994!3d-14.593966589806673!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x7391d1f6fd418df%3A0xb3fa190c8429fc82!2sIF%20Baiano%20Campus%20Uru%C3%A7uca!5e0!3m2!1spt-BR!2sbr!4v1638814170732!5m2!1spt-BR!2sbr');
        return;
    }
    if (nomeUnidade.innerText === 'Campus Valença') {
        const marca = localMarca.appendChild(criaImg());
        marca.setAttribute('src', `${templateUrl}/imagens/marca-if-baiano-valenca.svg`);
        rodapeH2.innerText = `Instituto Federal de Educação, Ciência e Tecnologia Baiano - ${nomeUnidade.innerText}`;
        rodapeP.innerText = `Rua Glicério Tavares, S/N, Bate Quente, Valença-Ba, CEP: 45400-000, Tel.: (75) 3641-5270 / 3641-4686 / 3641-2053, E-mail: gabinete@valenca.ifbaiano.edu.br`;
        const marcaRodape = rodapeH2.parentElement.insertBefore(criaImg(), rodapeH2.parentElement.firstChild);
        marcaRodape.setAttribute('src', `${templateUrl}/imagens/marca-if-baiano-valenca-horizontal.svg`);
        marcaRodape.setAttribute('class', 'marcaRodape');
        localMapa.innerHTML = `<div class="tituloSecao">Localização do ${nomeUnidade.innerText}</div>`;
        const mapa = localMapa.appendChild(criaMapa());
        mapa.setAttribute('src', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5489.534230580554!2d-39.08114433994508!3d-13.369735727521086!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x73e4406639b5f79%3A0xc35f422ceb51b6d2!2sIF%20-%20Baiano!5e0!3m2!1spt-BR!2sbr!4v1638814200653!5m2!1spt-BR!2sbr');
        return;
    }
    if (nomeUnidade.innerText === 'Campus Xique-Xique') {
        const marca = localMarca.appendChild(criaImg());
        marca.setAttribute('src', `${templateUrl}/imagens/marca-if-baiano-xique-xique.svg`);
        rodapeH2.innerText = `Instituto Federal de Educação, Ciência e Tecnologia Baiano - ${nomeUnidade.innerText}`;
        rodapeP.innerText = `Rodovia BA 052, Km 468, s/n – Zona Rural, Xique-Xique, Bahia, CEP: 47.400-000, Telefone: (74) 3664-3500, E-mail: gabinete@xique-xique.ifbaiano.edu.br`;
        const marcaRodape = rodapeH2.parentElement.insertBefore(criaImg(), rodapeH2.parentElement.firstChild);
        marcaRodape.setAttribute('src', `${templateUrl}/imagens/marca-if-baiano-xique-xique-horizontal.svg`);
        marcaRodape.setAttribute('class', 'marcaRodape');
        localMapa.innerHTML = `<div class="tituloSecao">Localização do ${nomeUnidade.innerText}</div>`;
        const mapa = localMapa.appendChild(criaMapa());
        mapa.setAttribute('src', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.8303897533815!2d-42.690860784762414!3d-10.824288592288973!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x7658de9d30137a5%3A0xdf44d26c77f405e0!2sIF%20Baiano%2C%20Campus%20Xique%20Xique%20Ba!5e0!3m2!1spt-BR!2sbr!4v1638814233404!5m2!1spt-BR!2sbr');
        return;
    }
}

function criaMapa() {
    const iframe = document.createElement('iframe');
    iframe.setAttribute('width', '100%');
    iframe.setAttribute('height', '250px');
    iframe.setAttribute('loading', 'lazy');
    iframe.setAttribute('style', 'border:0');
    iframe.setAttribute('allowfullscreen', '');
    return iframe;
}

function criaImg() {
    const img = document.createElement('img');
    return img;
}

function criaSpanExpand() {
    const span = document.createElement('span');
    span.classList.add('arrow', 'down');
    return span;
}

if (!localMarca.querySelector('img')) selecionaMarca();