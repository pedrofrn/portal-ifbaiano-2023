<?php include 'voltar-ao-topo.php'; ?>
<div id="containerRodape">
	<div id="containerRodapeTopo">
		<div class="menuRodape">
			<?php if (is_active_sidebar('rodape')) : ?>
				<?php dynamic_sidebar('rodape'); ?>
			<?php endif; ?>
		</div>
	</div>
	<div id="containerRodapeBaixo">
		<div id="BarraInferior">
			<a href="http://www.gov.br/acessoainformacao/" alt="Acesso a Informação" title="Acesso a Informação">
				<div class="acessoInfRodape"></div>
			</a>
			<a href="http://www.brasil.gov.br/" alt="Brasil - Governo Federal">
				<div class="govFederal"></div>
			</a>
		</div>
	</div>
	<div id="containerWP">
		<div class="assWP">
			Desenvolvido com o CMS de código aberto <a href="https://br.wordpress.org/" alt="WordPress" title="WordPress">WordPress</a>
		</div>
	</div>
</div>
</div>
<?php wp_footer(); ?>
<?php include 'layout-responsivo.php'; ?>
<script type='text/javascript' defer="defer" src='https://barra.brasil.gov.br/barra_2.0.js' id='barra-brasil-js'></script>
<script type='text/javascript' src='<?php bloginfo('template_url'); ?>/js/menu.js'></script>
<script type='text/javascript' src='<?php bloginfo('template_url'); ?>/js/campus.js'></script>
<script type='text/javascript' src='<?php bloginfo('template_url'); ?>/js/banner-lateral.js'></script>
</body>
<script>
	const imgs = document.querySelectorAll('figure.wp-block-image img');
	imgs.forEach(element => {
		if (element.src.includes('localhost')) element.src = element.src.replace('localhost', '192.168.15.82')
	});
</script>

</html>