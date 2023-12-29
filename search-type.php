<?php
// Inclua o cabeçalho do WordPress
get_header();
?>

<div id="containerMeio">
	<div id="containerMeioEsquerda">
		<div id="marcaCampus"></div>
		<?php include 'menu.php'; ?>
	</div>

	<div id="containerMeioCentro">
		<div id="tituloNoticia">
			<?php printf('Resultados da Pesquisa: <em>%s</em>', esc_html(get_search_query())); ?>
		</div>

		<div id="textoNoticia">
			<div class="numerosTotais">
				<?php
				$post_type_labels = array(
					'page'       => 'Página',
					'post'       => 'Notícia',
					'cursos'     => 'Curso',
					'concursos'  => 'Concurso',
					'attachment' => 'Documento',
				);

				echo '<span class="numerosTotais">Resultados exibidos pelos mais recentes</span>';
				echo '<ul>';
				foreach ($post_type_labels as $post_type_slug => $label) {
					$link = add_query_arg('post_type', $post_type_slug, home_url('/search-type.php'));
					echo '<li><a href="' . esc_url($link) . '">' . esc_html($label) . '</a></li>';
				}
				echo '</ul>';
				?>
			</div>

			<?php
			if (have_posts()) :
				while (have_posts()) : the_post();
					$post_type = get_post_type();
					$source_class = 'source-' . $post_type;

					if ($post_type === 'attachment') { ?>
						<div class="noticia-lista <?php echo esc_attr($source_class); ?>">
							<div class="head">
								<div class="fonteSearch">DOCUMENTO</div>
								<div class="noticia-lista-data">
									<div class="imagem-data-publicacao"></div>
									<?php echo get_the_date('j \d\e F \d\e Y, \à\s G\hi'); ?>
								</div>
							</div>
							<h3><a target="_blank" href="<?php echo esc_url(wp_get_attachment_url()); ?>"><?php the_title(); ?></a></h3>
						</div>
					<?php } else { ?>
						<div class="noticia-lista <?php echo esc_attr($source_class); ?>">
							<div class="head">
								<div class="fonteSearch">
									<?php
									$post_type = get_post_type();
									$nome_fonte = '';

									switch ($post_type) {
										case 'post':
											$nome_fonte = 'Notícia';
											break;
										case 'concursos':
											$nome_fonte = 'Concurso';
											break;
										case 'cursos':
											$nome_fonte = 'Curso';
											break;
										case 'page':
											$nome_fonte = 'Página';
											break;
									}

									echo esc_html($nome_fonte);
									?>
								</div>
								<div class="noticia-lista-data">
									<div class="imagem-data-publicacao"></div>
									<?php echo get_the_date('j \d\e F \d\e Y, \à\s G\hi'); ?>
								</div>
							</div>

							<div class="noticia-lista-inner">
								<?php if (has_post_thumbnail()) : ?>
									<div class="noticia-lista-thumbnail">
										<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
											<?php the_post_thumbnail('thumbnail'); ?>
										</a>
									</div>
								<?php else : ?>
									<div class="noticia-lista-thumbnail">
										<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
											<img src="<?php echo get_template_directory_uri() . '/imagens/thumb-noticia.jpg'; ?>" alt="Imagem Padrão" />
										</a>
									</div>
								<?php endif; ?>

								<div class="noticia-lista-resumo">
									<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
									<a href="<?php the_permalink(); ?>"><?php the_excerpt(); ?></a>
								</div>
							</div>
						</div>
					<?php } ?>
				<?php endwhile; ?>

				<div class="paginacao">
					<?php
					global $wp_query;
					$big = 999999999;
					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					echo paginate_links(array(
						'base'    => @add_query_arg('paged', '%#%'),
						'format'  => '?paged=%#%',
						'current' => max(1, $paged),
						'total'   => $wp_query->max_num_pages,
					));
					?>
				</div>

			<?php else : ?>
				<div class="noticia-lista">
					<p style="font-weight: 800;">Nada encontrado!</p>
					<p>Nenhuma ocorrência foi encontrada com o termo '<em><?php echo esc_html(get_search_query()); ?></em>'.</p>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>
</div>
<script>
	const numerosTotais = document.querySelector('div.numerosTotais');
	for (n of numerosTotais.querySelectorAll('li')) {
		if (n.innerText.indexOf('Página') !== -1) n.style.backgroundColor = '#ffa31a';
		if (n.innerText.indexOf('Curso') !== -1) n.style.backgroundColor = '#43ff2f';
		if (n.innerText.indexOf('Concurso') !== -1) {
			n.style.backgroundColor = '#ff1313';
			n.style.color = '#fff'
		}
		if (n.innerText.indexOf('Notícia') !== -1) {
			n.style.backgroundColor = '#797979';
			n.style.color = '#fff'
		}
		if (n.innerText.indexOf('Documento') !== -1) {
			n.style.backgroundColor = '#51b1ff';
			n.style.color = '#fff'
		}
		n.style.textTransform = 'uppercase';
	}

	const noticiaLista = document.querySelectorAll('.noticia-lista');
	for (n of noticiaLista) {
		if (n.classList.contains('source-attachment')) {
			n.style.padding = '30px 20px';
			n.style.marginBottom = '10px';
			const link = n.querySelector('h3 a');
			link.innerHTML = link.innerText + '<span style="font-weight:normal;font-size:small;">' + link.href.slice(-4) + '</span>';
		}
		if (n.classList.contains('source-page')) n.querySelector('div.fonteSearch').style.borderLeft = '5px solid #ffa31a';
		if (n.classList.contains('source-cursos')) n.querySelector('div.fonteSearch').style.borderLeft = '5px solid #43ff2f';
		if (n.classList.contains('source-concursos')) n.querySelector('div.fonteSearch').style.borderLeft = '5px solid #ff1313';
		if (n.classList.contains('source-post')) n.querySelector('div.fonteSearch').style.borderLeft = '5px solid #797979';
	}
</script>

<?php
// Inclua o rodapé do WordPress
get_footer();
?>
