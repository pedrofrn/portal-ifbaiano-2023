<?php get_header(); ?>
<div id="containerMeio">
	<div id="containerMeioEsquerda">
		<div id="marcaCampus">
			<img src="<?php bloginfo('template_url'); ?>/imagens/marca-if-baiano.svg" alt="Marca do IF Baiano" />
		</div>
		<?php include 'menu.php'; ?>
	</div>
	<div id="containerMeioCentro">
		<?php if (is_active_sidebar('avisos')): ?>
			<div id="avisosImportantes">
				<span class="spanX"></span>
				<?php dynamic_sidebar('avisos'); ?>
			</div>
		<?php endif; ?>

		<?php if (is_active_sidebar('cards')): ?>
			<div class="tituloSecao">
				Ensino público, gratuito e de qualidade. Conheça nossos cursos
			</div>
			<div id="cardsCursos">
				<?php dynamic_sidebar('cards'); ?>
			</div>
		<?php endif; ?>

		<?php include 'mapa.php'; ?>

		<?php include 'slideshow-noticias.php'; ?>

	</div>

	<div id="containerMeioDireita">
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
<script type='text/javascript' src='<?php bloginfo('template_url'); ?>/js/app-pagina-inicial.js'></script>
<script type='text/javascript' src='<?php bloginfo('template_url'); ?>/js/mapa.js'></script>
<?php get_footer(); ?>