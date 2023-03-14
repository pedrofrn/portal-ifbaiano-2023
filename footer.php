<div id="containerRodape">
	<div id="containerRodapeTopo">

		<div id="inforodape">
			<h2 class="inforodape">Instituto Federal de Educação, Ciência e Tecnologia Baiano</h2>
			<p class="inforodape"><b>Reitoria</b>: Rua do Rouxinol, nº 115, Imbuí, Salvador-BA. CEP: 41720-052. CNPJ:
				10.724.903/0001-79
				Telefone: (71) 3186-0001 | E-mail: <a style="text-decoration:none;color:#95f9ff;"
					href="mailto:gabinete@ifbaiano.edu.br">gabinete@ifbaiano.edu.br</a></p>
		</div>

	</div>
	<div id="containerRodapeBaixo">
		<div id="BarraInferior">
			<span id="BarraInferiorEsquerda">
				<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Lei da informacao')): ?>

				<?php endif; ?>
			</span>
			<span id="BarraInferiorDireita">
				<a href="http://www.acessoainformacao.gov.br/">
					Lei de Acesso a Informação
				</a>
			</span>
			<!--<span id="BarraInferiorDireitaGov">
					<a href="http://www.brasil.gov.br/" alt="Brasil - Governo Federal">
						<img src="http://ifbaiano.edu.br/governo-federal-temer.png" />
					</a>
				</span>-->
			<span id="BarraInferiorDireitaGov">
				<a href="http://www.brasil.gov.br/" alt="Brasil - Governo Federal"></a>
			</span>
		</div>
	</div>
</div>
</div>
<?php wp_footer(); ?>
<script type='text/javascript' defer="defer" src='https://barra.brasil.gov.br/barra.js' id='barra-brasil-js'></script>

<script>
	(function (i, s, o, g, r, a, m) {
		i['GoogleAnalyticsObject'] = r; i[r] = i[r] || function () {
			(i[r].q = i[r].q || []).push(arguments)
		}, i[r].l = 1 * new Date(); a = s.createElement(o),
			m = s.getElementsByTagName(o)[0]; a.async = 1; a.src = g; m.parentNode.insertBefore(a, m)
	})(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

	ga('create', 'UA-42451099-1', 'auto');
	ga('send', 'pageview');

</script>
<script type='text/javascript' src='<?php bloginfo('template_url'); ?>/js/menu.js'></script>
</body>

</html>