<?php get_header(); ?>

<div id="containerMeio">
	<div id="containerMeioEsquerda">
		<div id="marcaCampus"></div>
		<?php include 'menu.php'; ?>
	</div>

	<div id="containerMeioCentro">
		<div id="tituloNoticia">
			<?php printf('Resultados da Pesquisa: <em>%s</em>', esc_html(get_search_query())); ?>
			<br><span>Mostrando os resultados mais atuais</span>
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
				// Adicione a linha informativa após os botões
				$filtro_aplicado = isset($_GET['post_type_filter']) ? $_GET['post_type_filter'] : 'Todos';
				if ($filtro_aplicado !== 'Todos') {
					echo '<p>Exibindo resultados por <span style="font-weight: 800;">' . $post_type_labels[$filtro_aplicado] . '</span></p>';
				}

				?>
			</div>

			<?php
// Consulta para todos os tipos de postagem
$args_all = array(
	's'     => get_search_query(),
	'post_type' => 'any',
	'order' => 'DESC', // Ordenar por data decrescente (mais recente primeiro)
);

// Se um filtro está acionado, ajustar o tipo de postagem
if (isset($_GET['post_type_filter']) && in_array($_GET['post_type_filter'], array('post', 'cursos', 'concursos', 'attachment', 'page'))) {
	$post_type_filter = sanitize_text_field($_GET['post_type_filter']);

	if ($post_type_filter === 'attachment') {
		$args_all['post_type'] = 'attachment';
		$args_all['post_status'] = 'inherit';
	} else {
		$args_all['post_type'] = $post_type_filter;
	}
}

// Inicializar consulta para todos os tipos de postagem
$search_query_all = new WP_Query($args_all);

// Inicializar consulta para anexos (attachments) somente se não houver filtro
if (!isset($_GET['post_type_filter']) || $_GET['post_type_filter'] === 'Todos') {
	$args_attachment = array(
		's'              => get_search_query(),
		'post_type'      => 'attachment',
		'posts_per_page' => -1,
		'post_status'    => 'inherit',
		'order'          => 'DESC', // Ordenar por data decrescente (mais recente primeiro)
	);

	$search_query_attachment = new WP_Query($args_attachment);

	// Combinar resultados
	$combined_results = array_merge($search_query_all->posts, $search_query_attachment->posts);
	usort($combined_results, function ($a, $b) {
		return strtotime($b->post_date) - strtotime($a->post_date);
	});
} else {
	// Se houver um filtro acionado, usar apenas os resultados da consulta principal
	$combined_results = $search_query_all->posts;
}

if (!empty($combined_results)) :
	foreach ($combined_results as $post) : setup_postdata($post);
		$post_type    = get_post_type();
		$source_class = 'source-' . $post_type;
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
			'total'   => $wp_query->max_num_pages,
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
	for (n of numerosTotais.querySelectorAll('li')) {
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

	const noticiaLista = document.querySelectorAll('.noticia-lista');
	const msgAtuais = document.querySelector('#tituloNoticia span');

	msgAtuais.style.fontSize = '10pt';
	msgAtuais.style.fontWeight = 'normal';
	msgAtuais.style.fontStyle = 'italic';

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
		if (n.innerText.indexOf('Nenhuma ocorrência foi encontrada com o termo') !== -1) {
			numerosTotais.remove();
			msgAtuais.remove();
		}
	}
</script>

<?php get_footer(); ?>