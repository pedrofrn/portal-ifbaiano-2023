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

		<div class="tituloSecao">
			O IF Baiano possui campus em 14 municípios
		</div>
		<div id="mapa">
			<div style="display:grid">
				<img src="<?php bloginfo('template_url'); ?>/imagens/mapa-bahia-500x500px.svg" alt="Mapa da Bahia" />
				<canvas id="canvasMapa"></canvas>
			</div>
			<div class="legendaMapa">
				<ul>
					<li>Alagoinhas</li>
					<li>Bom Jesus da Lapa</li>
					<li>Catu</li>
					<li>Governador Mangabeira</li>
					<li>Guanambi</li>
					<li>Itaberaba</li>
					<li>Itapetinga</li>
					<li>Santa Inês</li>
					<li>Senhor do Bonfim</li>
					<li>Serrinha</li>
					<li>Teixeira de Freitas</li>
					<li>Uruçuca</li>
					<li>Valença</li>
					<li>Xique-Xique</li>
				</ul>
			</div>
		</div>

		<div class="tituloSecao">
			Últimas notícias
		</div>
		<div id="Noticias">
			<div id="NoticiasConteudo">
				<div class='container'>
					<div class="ism-slider" data-transition_type="fade" data-play_type="loop" data-image_fx="zoomrotate"
						id="my-slider">
						<ol>
							<?php
							$destaque = get_posts(
								array(
									'posts_per_page' => 5,
									'category_name' => 'destaque'
								)
							);
							foreach ($destaque as $post) {
								setup_postdata($post);

								?>
								<li>
									<a href="<?php the_permalink(); ?>">
										<div class="imagemnoticiadestaque">
											<?php
											if (has_post_thumbnail()) {
												// mostra a imagem destacada
												the_post_thumbnail();
											} else {
												// mostra outra coisa (imagem, texto, etc.)
												echo '<img src="' . get_bloginfo('stylesheet_directory')
													. '/imagens/thumb-noticia.jpg" />';
											}
											?>
											<div class="ism-caption ism-caption-0">
												<?php the_time('d/m/Y \à\s H\hi'); ?>
											</div>

										</div>
										<div id="titulonoticiadestaque">
											<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
										</div>
								</li>

							<?php } ?>
						</ol>
					</div>
				</div>


			</div>
			<div id="NoticiasMaisNoticias">
				<a href="<?php echo get_option('home'); ?>/page_fullposts" alt="Todas as notícias">Acessar mais
					notícias<img src="<?php bloginfo('template_url'); ?>/imagens/icone-link-externo.png"
						style="width: 14px;margin-left: 5px;"></a>
			</div>
		</div>
		<p style="background:red;color:white;padding:15px;text-align:center;">nesta seção, colocar sanfona para editais
			vigentes e cursos oferecidos</p>



		<div id="Fotos">
			<div id="FotosConteudo">
				<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Fotos')): ?>

				<?php endif; ?>
			</div>

		</div>

	</div>

	<div id="containerMeioDireita">

		<div id="Mural">
			<div id="MuralTitulo">
				Comunicados
			</div>
			<div id="MuralConteudo">
				<?php
				wp_reset_query();
				wp_reset_postdata();
				$argumentos = array(
					'category_name' => 'informes',
					'numberposts' => 5
				);

				$my_posts = get_posts($argumentos);

				if ($my_posts) {
					foreach ($my_posts as $post) {
						setup_postdata($post);
						foreach (get_the_category() as $cat) {
							if (($cat->cat_name == 'Informes')) {
								?>
								<div id="InformesContainer">
									<div id="InformesdoData">
										<?php the_time('d/m/Y \à\s H\hi'); ?>
									</div>
									<div id="InformesTitulo">
										<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
									</div>
								</div>
								<?php
							}
						}
					}
				} else {
					echo "Não há comunicado a exibir.";
				} ?>
				<div id="maisComunicados">
					<a href="<?php echo get_option('home'); ?>/page_fullinfos" alt="Todos os Comunicados">Mais
						comunicados<img src="<?php bloginfo('template_url'); ?>/imagens/icone-link-externo.png"
							style="width: 14px;margin-left: 5px;"></a>
				</div>
			</div>
		</div>
		<div id="Facebook">
			<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Facebook')): ?>

			<?php endif; ?>
		</div>
	</div>
</div>

</div> <!-- FIM DA DIV TUDO -->
<?php get_footer(); ?>