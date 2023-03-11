<!-- 
Importação do arquivo css da barra de acessibilidade
-->
<link href="<?php bloginfo('stylesheet_directory'); ?>/css/barra_navegacao.css" type="text/css" rel="stylesheet" media="screen" />

<!-- 
Script para expansão do menu de alto contraste
-->
<script type="text/javascript">
function menuItem(element){
	var sub = element.parentNode.getElementsByTagName('ul').item(0);
	var shown = false;
	element.onclick = function(){
		if(shown){
			sub.style.display = 'none';
			shown = false;
		}
		else {
			sub.style.display = 'block';
			shown = true;
		}
		return false;
	}
}
</script> 

<!-- 
HTML da Barra de navegação
-->
<div id="NavegacaoInterno">
	<ul id="atalhos">
		<li><a href="#iniciodoconteudo">Ir para o conte&uacute;do [1]</a></li>
		<li><a href="#iniciodomenu">Ir para o menu [2]</a></li>
		<li><a href="#palavras">Ir para a busca [3]</a></li>
		<li><a href="<?php echo get_option('home'); ?>">Ir para o rodapé [4]</a></li>
	</ul>
</div>