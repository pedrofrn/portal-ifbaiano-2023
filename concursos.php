<!--?php /* Template name: Concursos */ ?-->
<?php get_header(); ?>
<div id="containerMeio">
	<div id="containerMeioEsquerda">
		<div id="marcaCampus"></div>
		<?php include 'menu.php'; ?>
	</div>

	<div id="containerMeioCentroNoticia">
		<div id="containerNoticiapost">
			<div id="tituloNoticia">
				<?php the_title(); ?>
			</div>

			<div class="concursosInscricoesAbertas"></div>
			<div class="concursosInscricoesBreve"></div>
			<div class="concursosForaPeriodo"></div>

			<?php
			while (have_posts()) {
				the_post(); ?>
				<div class="concursosListaManual">
					<?php the_content(); ?>
				</div>
			<?php }
			$args = array(
				'post_type' => 'concursos',
				'posts_per_page' => -1,
			);
			$posts = get_posts($args);

			foreach ($posts as $post) {
				setup_postdata($post);
				cardConcursos();
			}

			wp_reset_postdata();
			?>
		</div>
	</div>
</div>
</div>
<script type='text/javascript' src='<?php bloginfo('template_url'); ?>/js/app-lista-concursos.js'></script>
<?php get_footer(); ?>