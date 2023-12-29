<?php get_header(); ?>
<div id="containerMeio">
	<div id="containerMeioEsquerda">
		<div id="marcaCampus"></div>
		<?php include 'menu.php'; ?>
		<?php include 'banner-lateral.php'; ?>
		<a href="#" class="btnEditais" title="Editais do IF Baiano" alt="Acesse os Editais do IF Baiano">
			<div class="btnEditais">
				Editais<br>
				<div class="btnCentralEditais">Central de Seleção</div>
			</div>
		</a>
		<?php include 'informes.php'; ?>
	</div>
	<div id="containerMeioCentro">
		<?php if (is_active_sidebar('avisos')) : ?>
			<div id="avisosImportantes">
				<span class="spanX"></span>
				<?php dynamic_sidebar('avisos'); ?>
			</div>
		<?php endif; ?>

		<?php include 'cards-publicos.php'; ?>

		<?php include 'noticias.php'; ?>

		<?php include 'agenda-eventos.php'; ?>

		<div class="cursosMapa">
			<?php include 'botoes-cursos.php'; ?>
			<?php include 'mapa.php'; ?>
		</div>

		<?php if (is_active_sidebar('acesso')) : ?>
			<?php include 'acesso-rapido.php'; ?>
		<?php endif; ?>
	</div>
</div>

</div> <!-- FIM DA DIV TUDO -->
<script type='text/javascript' src='<?php bloginfo('template_url'); ?>/js/avisos-importantes.js'></script>
<script type='text/javascript' src='<?php bloginfo('template_url'); ?>/js/mapa.js'></script>
<script type='text/javascript' src='<?php bloginfo('template_url'); ?>/js/banner-lateral.js'></script>
<script type='text/javascript' src='<?php bloginfo('template_url'); ?>/js/eventos-importantes.js'></script>
<?php get_footer(); ?>