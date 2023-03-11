<form id="form_pesquisa" method="post" action="<?php bloginfo('home'); ?>/">
	<div style="height: 27px; background-color:#FFFFFF; border:solid 1px; -moz-border-radius:3px; -webkit-border-radius:3px; border-radius:3px; width:auto;">
		<input 
			type="text" value="Digite sua pesquisa" class="caixaPesquisa" id="palavras" name="s"
			style="float:left; padding: 0 0 0 5px; font-size:0.9em; height: 27px; width: auto; border: none; color: #015210"
			onFocus="if (this.value=='Digite sua pesquisa') this.value='';"
		/>
		<input value="Buscar" class="buscar" name="imgbuscar" id="idbuscar" type="image" style="padding:4px 5px 0 25px;"
		title="buscar"
		img src="<?php bloginfo('template_url'); ?>/imagens/headers/btn_pesquisar.png" alt="buscar"/>
	</div>
</form>
