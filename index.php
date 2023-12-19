<?php get_header(); ?>
<div id="containerMeio">
	<div id="containerMeioEsquerda">
		<div id="marcaCampus"></div>
		<?php include 'menu.php'; ?>
	</div>
	<div id="containerMeioCentro">
		<?php if (is_active_sidebar('avisos')): ?>
			<div id="avisosImportantes">
				<span class="spanX"></span>
				<?php dynamic_sidebar('avisos'); ?>
			</div>
		<?php endif; ?>

		<?php include 'cards-publicos.php'; ?>

		<?php include 'noticias.php'; ?>

		<?php include 'mapa.php'; ?>

		<?php if (is_active_sidebar('acesso')): ?>
			<?php include 'acesso-rapido.php'; ?>
		<?php endif; ?>

		<?php include 'editais-pagina-inicial.php'; ?>

		<div style="margin:20px;"></div>
		<div style="background-color:#D6DCD7;padding:30px 10px;min-height:200px;font-size:20pt;">Calendário de eventos
		</div>
		<div style="margin:20px;"></div>
		<div style="background-color:#D6DCD7;padding:30px 10px;min-height:200px;font-size:20pt;">Projetos</div>
		<div style="margin:20px;"></div>
		<div style="background-color:#D6DCD7;padding:30px 10px;min-height:200px;font-size:20pt;">Agenda do Reitor</div>
		<div style="margin:20px;"></div>

	</div>
</div>

</div> <!-- FIM DA DIV TUDO -->
<script type='text/javascript' src='<?php bloginfo('template_url'); ?>/js/avisos-importantes.js'></script>
<script type='text/javascript' src='<?php bloginfo('template_url'); ?>/js/mapa.js'></script>
<?php get_footer(); ?>