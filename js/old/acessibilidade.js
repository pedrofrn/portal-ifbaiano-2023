var publicCor = "0";
var acao = "d";
function trocaCorTexto(cor){
    document.body.style.color = cor;
    tag = document.getElementsByTagName('*');
    for (x = 0; tag.length > x; x++) {
        tag[x].style.color = cor;
    }
    acao = "Fonte";
    publicCor = cor;
}

function trocaCorFundo(cor){
    document.body.style.backgroundColor = cor;
    tag = document.getElementsByTagName('*');
    for (x = 0; tag.length > x; x++) {
        tag[x].style.background = cor;
        tag[x].style.backgroundColor = cor;
    }
    document.body.className = "AltoContraste";
    acao = "Fundo";
    publicCor = cor;
}

function verificaOpcoes(){
    corFonte = getCookie("corFonte");
    tamanhoFonte = getCookie("tamanhoFonte");
    if (corFonte != '') {
        trocaCorTexto(corFonte);
    }
    if (tamanhoFonte != '') {
        setarTamanho(tamanhoFonte);
    }
}

function setarTamanho(tam){
    var central = document.getElementById("containerMeio");
    var rodape = document.getElementById("containerRodapeExterno");
    var topo = document.getElementById("containerCabecalhoExterno");
	
    central.style.fontSize = tam + "px";
    rodape.style.fontSize = tam + "px";
    topo.style.fontSize = tam + "px";
	
    setCookie("tamanhoFonte", tam);
}

function alterarTamanho(sinal){
    var tamanho = 13;
    var tamanhoCookie = getCookie("tamanhoFonte");
    if (tamanhoCookie != ""){
        setarTamanho(tamanhoCookie);
        tamanho = parseInt(tamanhoCookie);
    }
	
        if (sinal == "mais" && tamanho < 20) { //Tamanho maximo para o aumento da fonte
            tamanho += 1;
        }
        else  if (sinal == "menos" && tamanho > 12) { //Tamanho minimo da fonte
            tamanho -= 1;
        }
        else if (sinal == "igual") { //Tamanho padrão da fonte
            tamanho = 13;
        }
		
		setarTamanho(tamanho);
}

$(document).ready(function(){
    var tamanho = 13;
    var tamanhoCookie = getCookie("tamanhoFonte");
    if (tamanhoCookie != ""){
        setarTamanho(tamanhoCookie);
        tamanho = parseInt(tamanhoCookie);
    }else{
		setarTamanho(13);
    }

    $("#aumentar_fonte").click(function(){alterarTamanho("mais")});
    $("#diminuir_fonte").click(function(){alterarTamanho("menos")});
    $("#tamanho_original").click(function(){alterarTamanho("igual")});
});


function setCookie(nome, valor){
    var hoje = new Date();
    var expira = new Date(hoje.getTime() + 999 * 24 * 60 * 60 * 1000);
    expira = expira.toGMTString();
	
    document.cookie = nome + "=" + valor + ";expires=" + expira + ";path=/";

}

// Função para ler o cookie.
function getCookie(strCookie){
    var strNomeIgual = strCookie + "=";
    var arrCookies = document.cookie.split(';');
    for (var i = 0; i < arrCookies.length; i++) {
        var strValorCookie = arrCookies[i];
        while (strValorCookie.charAt(0) == ' ') {
            strValorCookie = strValorCookie.substring(1, strValorCookie.length);
        }
        if (strValorCookie.indexOf(strNomeIgual) == 0) {
            return strValorCookie.substring(strNomeIgual.length, strValorCookie.length);
        }
    }
    return '';
}

// Função para excluir o cookie desejado.
function unsetCookie(nome){
    document.cookie = nome + "='';expires=Thu, 01-Jan-1970 00:00:01 GMT";
}

/*
 * Recebe uma classe que contem regras css para alterar o estilo do alto contraste.
 * @param {String} classe
 */
function modificarContraste(classe){
    if(classe == ""){
     $("body").removeAttr("class");
    } else {
        document.body.className = classe;
    }
    setCookie("AltoContraste", classe);
}

/*
 * Verifica se o cookie para utilizar o alto contraste
 */
function verificaContrasteCookie(){
    var altoContraste = getCookie("AltoContraste");
    if(altoContraste != ""){
        modificarContraste(altoContraste);
        verificaOpcoes();
    }
}

//mapeamento para os atalhos funcionarem em todos os navegadores com jquery
$(document).bind('keydown', 'Alt+1',function (){$('#iniciodoconteudo').focus();});
$(document).bind('keydown', 'Alt+Shift+1',function (){$('#iniciodoconteudo').focus();});
$(document).bind('keydown', 'Alt+2',function (){$('#iniciodomenu').focus();});
$(document).bind('keydown', 'Alt+Shift+2',function (){$('#iniciodomenu').focus();});
$(document).bind('keydown', 'Alt+3',function (){$('input[name=palavras]').focus();});
$(document).bind('keydown', 'Alt+Shift+3',function (){$('input[name=palavras]').focus();});
$(document).bind('keydown', 'Alt+4',function (){$('#tudo').focus();});
$(document).bind('keydown', 'Alt+Shift+4',function (){$('#tudo').focus();});
$(document).ready(function(){
    $("#palavra").focus(function(){if(this.value=='Pesquise aqui')this.value='';});
    $("#palavra").blur(function(){if(this.value=='') this.value='Pesquise aqui';});

    // Verifica se existe configuracoes de alto contraste
    verificaContrasteCookie();

    // Configura as classes para Alto Contraste
    $("#c_preto").click(function(){modificarContraste("c_preto");});
    $("#c_azul").click(function(){modificarContraste("c_azul");});
    $("#c_verde").click(function(){modificarContraste("c_verde");});
    $("#c_original").click(function(){modificarContraste("");});

    // Funcoes para ativar/desativar o menu
    $("#alto_contraste").attr('title', "Mostrar Opções de Alto Contraste");
    $("#alto_contraste").click(function() {
        if(this.title == "Mostrar Opções de Alto Contraste"){
            $(this).attr('title', "Ocultar Opções de Alto Contraste");
        } else{
            $(this).attr('title', "Mostrar Opções de Alto Contraste");
        }
        $(this).next().slideToggle(300);
        return false;
    });

    //voltar
    $("#voltar").click( function(){
        history.back();
        return (false);
    });

    $(".print").click(function (){
        $("body").removeClass('c_preto');
        $("body").removeClass('c_azul');
        $("body").removeClass('c_verde');
        /*$("#barra_governo").hide();
        $("#acessibilidade").hide();
        $("#topo").hide();
        $("#borda_fundo").hide();
        $("#menu").hide();
        $("#rodape").hide();
        $("#infoPagina").hide();
        $("#logo_principal").hide();
        $(".aba").hide();
        $(".imagens").hide();
        $(".audios").hide();
        $(".videos").hide();
        $(".documentos").hide();
        $("#modulo_outras_noticias").hide();*/
        $("img").hide();
        //$("#links_banners").hide();			Por Daniel Mota | Não é utilizado no Wordpress
        $("body *").css('background', '#fff');
        $("body *").css('color', '#000');
        $("body").css('background', '#fff');
    });
});

$(document).ready(function(){try{$("a[rel^='prettyPhoto']").prettyPhoto();}catch(e){}});
