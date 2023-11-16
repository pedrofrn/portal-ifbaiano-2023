<?php get_header(); ?>
<div id="containerMeio">
	<div id="containerMeioEsquerda">
		<div onClick="return true" class="dropdownmenu">
			<div id="MenuPrincipal">
				<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Menu Principal')): ?>

				<?php endif; ?>
			</div>
		</div>
	</div>

	<div id="containerMeioCentroNoticia">
		<div id="containerNoticia">
			<!-- INICIO DO RESULTADO DA PESQUISA -->
			<?php if (have_posts()): ?>
				<div class="breadcrumb">
					<?php get_breadcrumb(); ?>
				</div>
				<?php while (have_posts()) {
					the_post(); ?>

					<div id="DataNoticiaPesquisa">
						<?php the_time('j \d\e F \d\e Y') ?>
					</div>
					<div id="TituloNoticiaPesquisa">
						<a href="<?php the_permalink() ?>" rel="bookmark">
							<?php the_title(); ?>
						</a>
					</div>
					<div id="ResumoNoticiaPesquisa">
						<?php the_excerpt(); ?>
					</div>
					<hr style="border: 1px dashed #e1e1e1;">
				<?php } ?>

				<div class="navigation">
					<div class="alignleft">
						<?php next_posts_link('&laquo; Anteriores') ?>
					</div>
					<div class="alignright">
						<?php previous_posts_link('Próximas &raquo;') ?>
					</div>
					<p> </p>
				</div>
			<?php else: ?>
				<div class="item entry">
					<div class="tituloNoticiaDestaque">Nada encontrado!</div>
					<p>Nenhuma ocorr&ecirc;ncia foi encontrada com o termo &#8216;
						<?php the_search_query(); ?>&#8217;.
					</p>
				</div>

			<?php endif; ?>
			<!-- FIM DO RESULTADO DA PESQUISA -->
		</div>
	</div>
</div>
</div> <!-- FIM DA DIV TUDO -->
<?php get_footer(); ?>