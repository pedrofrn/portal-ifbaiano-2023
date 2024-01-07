<?php get_header(); ?>
<div id="containerMeio">
	<?php include 'coluna-menu.php'; ?>
	<div id="containerMeioCentro">
		<?php include 'banner-publicidade.php'; ?>

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

		<?php include 'acesso-rapido.php'; ?>
	</div>
</div>

</div>
<script type='text/javascript' src='<?php bloginfo('template_url'); ?>/js/avisos-importantes.js'></script>
<script type='text/javascript' src='<?php bloginfo('template_url'); ?>/js/mapa.js'></script>
<script type='text/javascript' src='<?php bloginfo('template_url'); ?>/js/eventos-importantes.js'></script>
<?php get_footer(); ?>