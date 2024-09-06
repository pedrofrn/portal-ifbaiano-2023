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
<script>
    (() => {
        const agendaReitor = document.querySelector('.agendaReitor');
        if (agendaReitor) {
            const text = agendaReitor.querySelector('p');
            const preLink = text.querySelector('a');
            const destaque = text.querySelector('strong');
            const fragment = document.createDocumentFragment();
            while (preLink.firstChild) {
                fragment.appendChild(preLink.firstChild);
            }
            preLink.parentNode.replaceChild(fragment, preLink);
            const link = document.createElement('a');
            link.href = preLink.href;
            link.title = text.innerText;
            link.alt = text.innerText;

            destaque.classList.add('reitor');

            if (!agendaReitor.closest('a')) {
                text.parentNode.replaceChild(link, text);
                link.appendChild(text);
            }
            text.insertBefore(document.createElement('br'), destaque);
        }
    })()
</script>
<?php wp_footer(); ?>
<?php include 'layout-responsivo.php'; ?>
<script type='text/javascript' defer="defer" src='https://barra.brasil.gov.br/barra_2.0.js' id='barra-brasil-js'></script>
<script type='text/javascript' src='<?php bloginfo('template_url'); ?>/js/menu.js'></script>
<script type='text/javascript' src='<?php bloginfo('template_url'); ?>/js/campus.js'></script>
<script type='text/javascript' src='<?php bloginfo('template_url'); ?>/js/banner-lateral.js'></script>
</body>
</html>