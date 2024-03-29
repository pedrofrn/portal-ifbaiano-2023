<?php get_header(); ?>
<div id="containerMeio">
	<?php include 'coluna-menu.php'; ?>
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

				$total_results_by_post_type = get_total_search_results_by_post_type();
				echo '<span class="numerosTotais">Filtre sua pesquisa por tipo:</span>';
				echo '<ul>';

				foreach ($total_results_by_post_type as $post_type => $total) {
					$label = isset($post_type_labels[$post_type]) ? $post_type_labels[$post_type] : ucfirst($post_type);

					echo '<li>';
					echo '<form action="' . esc_url(home_url('/')) . '" method="get">';
					echo '<input type="hidden" name="post_type_filter" value="' . esc_attr($post_type) . '">';
					echo '<input type="hidden" name="s" value="' . esc_attr(get_search_query()) . '">';
					echo '<button type="submit" style="background: none; border: none; padding: 0; font: inherit; cursor: pointer;">';
					echo $label . ': <span style="font-weight: 800; font-size:8pt;">' . $total . '</span>';
					echo '</button>';
					echo '</form>';
					echo '</li>';
				}

				echo '</ul>';

				$filtro_aplicado = isset($_GET['post_type_filter']) ? $_GET['post_type_filter'] : 'Todos';
				if ($filtro_aplicado !== 'Todos') {
					echo '<p class="filtroAplicado">Exibindo resultados por <span style="font-weight: 800;">' . $post_type_labels[$filtro_aplicado] . ':</span></p>';
				}

				?>
			</div>

			<?php
			wp_reset_query();
			$args_all = array(
				's'     => get_search_query(),
				'post_type' => 'any',
				'order' => 'DESC',
				'paged'      => $paged,
			);

			if (isset($_GET['post_type_filter']) && in_array($_GET['post_type_filter'], array('post', 'cursos', 'concursos', 'attachment', 'page'))) {
				$post_type_filter = sanitize_text_field($_GET['post_type_filter']);

				if ($post_type_filter === 'attachment') {
					$args_all['post_type'] = 'attachment';
					$args_all['post_status'] = 'inherit';
				} else {
					$args_all['post_type'] = $post_type_filter;
				}
			}

			$search_query_all = new WP_Query($args_all);

			if (!isset($_GET['post_type_filter']) || $_GET['post_type_filter'] === 'Todos') {
				$args_attachment = array(
					's'              => get_search_query(),
					'post_type'      => 'attachment',
					'post_status'    => 'inherit',
					'order'          => 'DESC',
					'paged'      => $paged,
				);

				$search_query_attachment = new WP_Query($args_attachment);

				$combined_results = array_merge($search_query_all->posts, $search_query_attachment->posts);
				usort($combined_results, function ($a, $b) {
					return strtotime($b->post_date) - strtotime($a->post_date);
				});
				$limited_results = array_slice($combined_results, 0, 10);
			} else {
				$limited_results = array_slice($search_query_all->posts, 0, 10);
			}

			if (!empty($limited_results)) :
				foreach ($limited_results as $post) : setup_postdata($post);
					$post_type    = get_post_type();
					$source_class = 'source-' . $post_type;
					$definirUnidade = get_post_meta(get_the_ID(), 'definirUnidade', true);
			?>
					<div class="noticia-lista <?php echo esc_attr($source_class); ?>">
						<?php if ($post_type === 'attachment') : ?>
							<div class="head">
								<div class="fonteSearch">DOCUMENTO</div>
								<div class="noticia-lista-data">
									<div class="imagem-data-publicacao"></div>
									<?php echo get_the_date('j \d\e F \d\e Y, \à\s G\hi'); ?>
								</div>
							</div>
							<h3><a target="_blank" href="<?php echo esc_url(wp_get_attachment_url()); ?>"><?php the_title(); ?></a></h3>
						<?php else : ?>
							<div class="head">
								<div class="fonteSearch">
									<?php
									$post_type   = get_post_type();
									$nome_fonte  = '';

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
										<a target="_blank" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
											<?php the_post_thumbnail('thumbnail'); ?>
										</a>
									</div>
								<?php else : ?>
									<div class="noticia-lista-thumbnail">
										<a target="_blank" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
											<img src="<?php echo get_template_directory_uri() . '/imagens/thumb-noticia.jpg'; ?>" alt="Imagem Padrão" />
										</a>
									</div>
								<?php endif; ?>

								<div class="noticia-lista-resumo">
									<?php if (!empty($definirUnidade)) { ?>
										<div class="unidadesHead">
											<?php
											foreach ($definirUnidade as $elemento) {
												echo '<div>' . $elemento . '</div>';
											}
											?>
										</div>
									<?php } ?>
									<h3><a target="_blank" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
									<a target="_blank" href="<?php the_permalink(); ?>"><?php the_excerpt(); ?></a>
								</div>
							</div>
						<?php endif; ?>
					</div>
				<?php endforeach; ?>

				<div class="paginacao">
					<?php
					global $wp_query;
					$big   = 999999999;
					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					echo paginate_links(array(
						'base'    => @add_query_arg('paged', '%#%'),
						'format'  => '?paged=%#%',
						'current' => max(1, $paged),
						'total'   => $search_query_all->max_num_pages,
					));
					?>
				</div>

			<?php else : ?>
				<div class="noticia-lista">
					<p style="font-weight: 800;">Nada encontrado!</p>
					<p>Nenhuma ocorrência foi encontrada com o termo '<em><?php echo esc_html(get_search_query()); ?></em>'.</p>
				</div>
			<?php endif;
			wp_reset_postdata(); ?>

		</div>
	</div>
</div>
</div>
<script>
	const numerosTotais = document.querySelector('div.numerosTotais');
	let contador = 0;
	let contadorDoc = 0;
	for (n of numerosTotais.querySelectorAll('li')) {
		let numero = parseInt(n.innerText, 10);
		let numeroDoc = n.innerText.indexOf('Documento') !== -1 ? parseInt(n.innerText.replace('Documento:', '')) : 0;
		contador += numero;
		isNaN(numeroDoc) ? numeroDoc = 0 : contadorDoc += numeroDoc;
		if (n.innerText.indexOf('Página') !== -1) n.style.backgroundColor = '#ffa31a';
		if (n.innerText.indexOf('Curso') !== -1) n.style.backgroundColor = '#43ff2f';
		if (n.innerText.indexOf('Concurso') !== -1) {
			n.style.backgroundColor = '#ff1313';
			n.querySelector('button').style.color = '#fff';
		}
		if (n.innerText.indexOf('Notícia') !== -1) {
			n.style.backgroundColor = '#797979';
			n.querySelector('button').style.color = '#fff';
		}
		if (n.innerText.indexOf('Documento') !== -1) {
			n.style.backgroundColor = '#51b1ff';
			n.querySelector('button').style.color = '#fff';
		}
		n.style.textTransform = 'uppercase';
	}

	if (contador > 1) document.querySelector('#tituloNoticia').innerHTML += '<br><span>Mostrando os resultados mais atuais</span>';
	if (contadorDoc === 0) {
		for (n of numerosTotais.querySelectorAll('li')) {
			if (n.innerText.indexOf('Documento') !== -1) n.remove();
		}
	}
	const meioCentroFrase = document.querySelector('#containerMeioCentro .tituloNoticia');
	const noticiaLista = document.querySelectorAll('.noticia-lista');
	const msgAtuais = document.querySelector('#tituloNoticia span');

	if (msgAtuais) {
		msgAtuais.style.fontSize = '10pt';
		msgAtuais.style.fontWeight = 'normal';
		msgAtuais.style.fontStyle = 'italic';
	}

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
		if (n.innerText.indexOf('Nenhuma ocorrência foi encontrada com o termo') !== -1) numerosTotais.remove();
	}
</script>
<?php get_footer(); ?>