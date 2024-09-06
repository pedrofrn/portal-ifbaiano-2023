<div id="NavegacaoInterno">
	<nav>
		<a href="#containerMeio">Ir para o conteúdo <span>1</span></a>
		<a href="#MenuPrincipal">Ir para o menu <span>2</span></a></li>
		<a href="#Busca">Ir para a busca <span>3</span></a></li>
		<a href="#containerRodape">Ir para o rodapé <span>4</span></a>
		<?php if (is_home()) { ?>
			<a href="#acessoRapido">Acesso Rápido <span>5</span></a>
		<?php } ?>
	</nav>
</div>

<script>
	document.querySelectorAll('a[href^="#"]').forEach(anchor => {
		anchor.addEventListener('click', function (e) {
			e.preventDefault();

			document.querySelector(this.getAttribute('href')).scrollIntoView({
				behavior: 'smooth'
			});
			if (e.target.innerText.indexOf('busca') !== -1) {
				document.querySelector('input.caixaPesquisa').focus();
			}
		});
	});
</script>