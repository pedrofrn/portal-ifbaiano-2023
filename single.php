<?php get_header(); ?>
<div id="containerMeio">
	<div id="containerMeioEsquerda">
		<div id="marcaCampus">
			<img src="<?php bloginfo('template_url'); ?>/imagens/marca-if-baiano.svg" alt="Marca do IF Baiano" />
		</div>
		<?php include 'menu.php'; ?>
	</div>

	<div id="containerMeioCentroNoticia">
		<div id="containerNoticiapost">
			<!-- INICIO DA NOTICIA -->
			<?php
			if (have_posts()) {
				while (have_posts()) {
					the_post();
					?>

					<div class="breadcrumb">
						<?php get_breadcrumb(); ?>
					</div>

					<div id="tituloNoticia">
						<?php the_title(); ?>
					</div>

					<?php if (!has_excerpt()) {
						echo '';
					} else { ?>
						<div class="subtitulo-post">
							<?php the_excerpt(); ?>
						</div>
					<?php } ?>

					<div class="data-publicacao">
						<div class="imagem-data-publicacao"></div>
						<div class="data">
							Última atualização: <strong>
								<?php the_modified_time('j/m/Y \à\s G\hi '); ?>
							</strong> | Publicação: <strong>
								<?php echo '' . get_the_date('j/m/Y \à\s G\hi '); ?>
							</strong>
						</div>
					</div>

					<div id="textoNoticia">
						<?php if (has_post_thumbnail()): ?>
							<div class="thumbNoticia">
								<?php the_post_thumbnail(); ?>
							</div>
						<?php endif; ?>
						<?php the_content(); ?>
					</div>
				<?php }
			}
			?>
			<!-- FIM DA NOTICIA -->
		</div>
	</div>
</div>
</div> <!-- FIM DA DIV TUDO -->
<?php get_footer(); ?>