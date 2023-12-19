<form id="form_pesquisa" method="post" action="<?php bloginfo('home'); ?>/">
	<input type="text"  placeholder="Buscar no portal" class="caixaPesquisa" id="palavras" name="s" />
	<img class="search-icon" src="<?php bloginfo('template_url'); ?>/imagens/headers/btn_pesquisar.png"
		onclick="submitForm()">
</form>

<script>
	function submitForm() {
		document.getElementById('form_pesquisa').submit();
	}
</script>