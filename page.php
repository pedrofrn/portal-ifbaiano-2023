<?php get_header(); ?>
<div id="containerMeio">
	<div id="containerMeioEsquerda">
		<div id="marcaCampus"></div>
		<?php include 'menu.php'; ?>
	</div>

	<div id="containerMeioCentroNoticia">
		<div id="containerNoticiapost">

			<?php
			if (have_posts()) {
				while (have_posts()) {
					the_post();
			?>

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

					<div id="textoNoticia">
						<?php if (has_post_thumbnail()) : ?>
							<div class="thumbNoticia">
								<?php the_post_thumbnail(); ?>
							</div>
						<?php endif; ?>
						<?php the_content(); ?>
					</div>
					<?php include 'table-documents.php'; ?>
			<?php }
			}
			?>
		</div>
	</div>
</div>
</div>
<?php get_footer(); ?>