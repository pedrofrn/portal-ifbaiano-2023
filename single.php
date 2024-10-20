<?php get_header(); ?>
<div id="containerMeio">
	<?php include 'coluna-menu.php'; ?>
	<div id="containerMeioCentroNoticia">
		<div id="containerNoticiapost">
			<?php include 'banner-publicidade.php'; ?>
			<?php
			if (have_posts()) {
				while (have_posts()) {
					the_post();
					?>

					<h1 id="tituloNoticia">
						<?php the_title(); ?>
					</h1>

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
							Última modificação: <strong>
								<?php the_modified_time('j/m/Y \à\s G\hi '); ?>
							</strong> | Publicação: <strong>
								<?php echo '' . get_the_date('j/m/Y \à\s G\hi '); ?>
							</strong>
						</div>
					</div>

					<div id="textoNoticia">
						<?php include 'post-thumbnail.php'; ?>
						<?php the_content(); ?>
					</div>
					<?php include 'table-documents.php'; ?>

				<?php }
			}
			?>
			<!-- FIM DA NOTICIA -->
		</div>
	</div>
</div>
</div> <!-- FIM DA DIV TUDO -->
<?php get_footer(); ?>