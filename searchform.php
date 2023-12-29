<form role="search" method="get" id="form_pesquisa" action="<?php echo esc_url(home_url('/')); ?>">
    <input type="text" placeholder="Buscar no portal" class="caixaPesquisa" id="palavras" name="s" />
    <button type="submit" class="search-icon" aria-label="Pesquisar"></button>
</form>



<script>
	function submitForm() {
		document.getElementById('form_pesquisa').submit();
	}
</script>