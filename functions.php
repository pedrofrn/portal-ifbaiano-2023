<?php
if (function_exists('register_sidebar')) {

	# Area de widgets do Banner Publicidade
	register_sidebar(
		array(
			'name' => 'Banner Publicidade',
			'id' => 'publicidade',
			'description' => 'Banner de 800x200px de publicidade temporária',
			'before_widget' => '<div class="bannerPublicidade">',
			'after_widget' => '</div>',
			'before_title' => '',
			'after_title' => '',
		)
	);

	# Area de widgets dos Avisos importantes
	register_sidebar(
		array(
			'name' => 'Avisos importantes',
			'id' => 'avisos',
			'description' => 'No topo da página inicial, cadastre até 3 avisos',
			'before_widget' => '<div class="avisoInterno fade">',
			'after_widget' => '</div>',
			'before_title' => '<h6 class="tituloAviso">',
			'after_title' => '</h6>',
		)
	);

	# Area de widgets do menu Header direito
	register_sidebar(
		array(
			'name' => 'Menu Header',
			'id' => 'menuheader',
			'description' => 'Menu localizado no cabeçalho da página, lado direito',
			'before_widget' => '',
			'after_widget' => '',
			'before_title' => '',
			'after_title' => '',
		)
	);

	# Area de widgets dos cards de cursos
	register_sidebar(
		array(
			'name' => 'Cards Públicos',
			'id' => 'cards',
			'description' => 'Cards dos Públicos: coloque até 4 imagens com dimensão de YxY pixels',
			'before_widget' => '<div class="card">',
			'after_widget' => '</div>',
			'before_title' => '<span>',
			'after_title' => '</span>',
		)
	);

	# Area de widgets do Menu Destaque
	register_sidebar(
		array(
			'name' => 'Menu Destaque',
			'description' => '',
			'before_widget' => '',
			'after_widget' => '',
			'before_title' => '<span class="displayNone">',
			'after_title' => '</span>',
		)
	);

	# Area de widgets do Menu Principal
	register_sidebar(
		array(
			'name' => 'Menu Principal',
			'description' => '',
			'before_widget' => '',
			'after_widget' => '',
			'before_title' => '<div class="TituloMenu">',
			'after_title' => '</div>',
		)
	);

	# Area de botões de cursos
	register_sidebar(
		array(
			'name' => 'Botões Cursos',
			'id' => 'cursos',
			'description' => 'Botões para cursos',
			'before_widget' => '',
			'after_widget' => '',
			'before_title' => '',
			'after_title' => '',
		)
	);

	# Area de banners laterais
	register_sidebar(
		array(
			'name' => 'Mural Banner Lateral',
			'id' => 'banner',
			'description' => 'Mural Banner Lateral',
			'before_widget' => '<div class="bannerInterno fade">',
			'after_widget' => '</div>',
			'before_title' => '',
			'after_title' => '',
		)
	);

	# Area de anúncio de eventos
	register_sidebar(
		array(
			'name' => 'Eventos importantes',
			'id' => 'eventos',
			'description' => 'Eventos importantes',
			'before_widget' => '<div class="eventoInterno fade">',
			'after_widget' => '</div>',
			'before_title' => '<h6 class="tituloEvento">',
			'after_title' => '</h6>',
		)
	);

	# Area de Acesso Rápido
	register_sidebar(
		array(
			'name' => 'Agenda do Reitor',
			'id' => 'agendareitor',
			'description' => 'Link para agenda do Reitor',
			'before_widget' => '',
			'after_widget' => '',
			'before_title' => '',
			'after_title' => '',
		)
	);

	# Area de Acesso Rápido
	register_sidebar(
		array(
			'name' => 'Acesso Rápido',
			'id' => 'acesso',
			'description' => 'Botões para acesso rápido',
			'before_widget' => '',
			'after_widget' => '',
			'before_title' => '',
			'after_title' => '',
		)
	);

	# Area de widgets do Menu do Rodapé
	register_sidebar(
		array(
			'name'          => 'Menu do Rodapé',
			'id'            => 'rodape',
			'description'   => 'Menu do Rodapé',
			'before_widget' => '<div class="menuRodapeSingle">',
			'after_widget'  => '</div>',
			'before_title'  => '<span class="tituloMenuRodape">',
			'after_title'   => '</span>',
		)
	);
}

add_filter('widget_text', 'do_shortcode');

// ícones
function registrar_pagina_opcoes_icones()
{
	add_menu_page(
		'Acesso Rápido',
		'Acesso Rápido',
		'edit_theme_options',
		'opcoes_icones',
		'pagina_opcoes_icones',
		'dashicons-admin-generic',
		30
	);
}

add_action('admin_menu', 'registrar_pagina_opcoes_icones');

function pagina_opcoes_icones()
{
?>
	<div class="wrap">
		<h1>Acesso Rápido</h1>
		<form method="post" action="options.php">
			<?php
			settings_fields('opcoes_icones');
			do_settings_sections('opcoes_icones');
			submit_button();
			?>
		</form>
	</div>
<?php
}

function registrar_opcoes_icones()
{
	register_setting('opcoes_icones', 'opcoes_icones', 'sanitize_opcoes_icones');

	add_settings_section(
		'secao_icones',
		'Configurações dos Ícones',
		'secao_icones_callback',
		'opcoes_icones'
	);

	add_settings_field(
		'opcoes_icones',
		'Ícones',
		'campo_icones_callback',
		'opcoes_icones',
		'secao_icones'
	);
}

add_action('admin_init', 'registrar_opcoes_icones');

function sanitize_opcoes_icones($input)
{
	$sanitized_input = array();

	foreach ($input as $indice => $icone) {
		if (!empty($icone['nome']) && !empty($icone['link'])) {
			$sanitized_input[$indice]['nome']   = sanitize_text_field($icone['nome']);
			$sanitized_input[$indice]['imagem'] = esc_url_raw($icone['imagem']);
			$sanitized_input[$indice]['cor']    = sanitize_text_field($icone['cor']);
			$sanitized_input[$indice]['link']   = esc_url_raw($icone['link']);
		}
	}

	return $sanitized_input;
}

function secao_icones_callback()
{
	echo '<p>Adicione, reordene, edite ou exclua ícones de acesso rápido do site.</p>';
}

function adicionar_color_picker()
{
	wp_enqueue_style('wp-color-picker');
	wp_enqueue_script('wp-color-picker');
	wp_enqueue_script('custom-color-picker', get_template_directory_uri() . '/js/custom-color-picker.js', array('wp-color-picker'), false, true);
}

add_action('admin_enqueue_scripts', 'adicionar_color_picker');

function campo_icones_callback()
{ ?>
	<style>
		div.icone-item {
			display: flex;
			gap: 15px;
			margin-bottom: 15px;
			align-items: flex-start;
		}

		div.icone-item div button {
			margin: 0 !important;
			min-height: 30px;
		}

		div.wp-picker-holder {
			position: absolute;
		}
	</style>
<?php
	$opcoes_icones = get_option('opcoes_icones', array());

	echo '<div id="icones-container" class="sortable">';

	if (empty($opcoes_icones)) {
		$opcoes_icones[] = array('nome' => '', 'imagem' => '', 'cor' => '', 'link' => '');
	}

	foreach ($opcoes_icones as $indice => $icone) {
		echo '<div class="icone-item">';

		echo '<div style="display:grid;"><label for="opcoes_icones[' . $indice . '][nome]">Nome</label>';
		echo '<input type="text" name="opcoes_icones[' . $indice . '][nome]" placeholder="Nome do ícone" value="' . esc_attr($icone['nome']) . '"></div>';

		echo '<div style="display:grid;"><label for="opcoes_icones[' . $indice . '][imagem]">URL da imagem</label>';
		echo '<input type="text" name="opcoes_icones[' . $indice . '][imagem]" placeholder="Endereço da imagem" value="' . esc_url($icone['imagem']) . '"></div>';

		echo '<div style="display:grid;"><label for="opcoes_icones[' . $indice . '][cor]">Cor do ícone</label>';
		echo '<input type="text" class="cor-input" name="opcoes_icones[' . $indice . '][cor]" value="' . esc_attr($icone['cor']) . '" data-wp-color-picker></div>';

		echo '<div style="display:grid;"><label for="opcoes_icones[' . $indice . '][link]">Link de destino</label>';
		echo '<input type="text" name="opcoes_icones[' . $indice . '][link]" placeholder="URL a ser acessada" value="' . esc_url($icone['link']) . '"></div>';

		echo '<div style="align-self:end;"><button type="button" class="remover_icone" data-indice="' . $indice . '">Remover</button></div>';

		echo '</div>';
	}

	echo '</div>';

	echo '<button type="button" id="adicionar_icone">Adicionar Ícone</button>';
	echo '<script>
            document.addEventListener("DOMContentLoaded", function() {
                const botaoAdicionar = document.getElementById("adicionar_icone");
                const containerIcones = document.getElementById("icones-container");

                botaoAdicionar.addEventListener("click", function() {
                    const novoIndice = containerIcones.childElementCount;
                    const novoIcone = document.createElement("div");
					novoIcone.classList.add("icone-item");

                    novoIcone.innerHTML = 
                        \'<div style="display:grid;"><label for="opcoes_icones[\' + novoIndice + \'][nome]">Nome:</label>\' +
                        \'<input type="text" name="opcoes_icones[\' + novoIndice + \'][nome]" value=""></div>\' +
                        \'<div style="display:grid;"><label for="opcoes_icones[\' + novoIndice + \'][imagem]">Imagem URL:</label>\' +
                        \'<input type="text" name="opcoes_icones[\' + novoIndice + \'][imagem]" value=""></div>\' +
                        \'<div style="display:grid;"><label for="opcoes_icones[\' + novoIndice + \'][cor]">Cor:</label>\' +
                        \'<input type="text" class="cor-input" name="opcoes_icones[\' + novoIndice + \'][cor]" value=""></div>\' +
                        \'<div style="display:grid;"><label for="opcoes_icones[\' + novoIndice + \'][link]">Link:</label>\' +
                        \'<input type="text" name="opcoes_icones[\' + novoIndice + \'][link]" value=""></div>\' +
                        \'<div style="align-self:end;"><button type="button" class="remover_icone" data-indice="\' + novoIndice + \'">Remover</button></div>\';

                    containerIcones.appendChild(novoIcone);
					jQuery(novoIcone).find(".cor-input").wpColorPicker();
                });
				
                jQuery("#icones-container.sortable").sortable({
                    update: function(event, ui) {
                        jQuery("#icones-container .icone-item").each(function(indice) {
                            jQuery(this).find("input[type=text]").each(function(el) {
                                const nomeAntigo = jQuery(this).attr("name");
                                const novoNome = nomeAntigo.replace(/\[(\d+)\]/, "[" + indice + "]");
                                jQuery(this).attr("name", novoNome);
                            });
                        });
                    }
                });
                jQuery("#icones-container.sortable").disableSelection();

            });
			document.querySelectorAll("button.remover_icone").forEach(btn => {
				btn.addEventListener("click", event => {
					event.target.parentElement.parentElement.remove();
					jQuery("#icones-container .icone-item").each(function(indice) {
						jQuery(this).find("input[type=text]").each(function() {
							const nomeAntigo = jQuery(this).attr("name");
							const novoNome = nomeAntigo.replace(/\[(\d+)\]/, "[" + indice + "]");
							jQuery(this).attr("name", novoNome);
						});
				});
				})
			})			
          </script>';
}

function adicionar_jquery_ui()
{
	wp_enqueue_script('jquery-ui-sortable');
}

add_action('admin_enqueue_scripts', 'adicionar_jquery_ui');

function obter_icones_salvos()
{
	return get_option('opcoes_icones', array());
}

function exibir_icones_frontend()
{
	$icones = obter_icones_salvos();

	if (!empty($icones)) {
		echo '<div id="acessoRapido" class="scrollAnimation">
                 <div class="tituloSecao">Acesso rápido</div>
                 <div class="icones-container">';

		foreach ($icones as $indice => $icone) {
			$cor = !empty($icone['cor']) ? $icone['cor'] : '#000';
			echo '<div class="icone" style="background-color: ' . esc_attr($cor) . '; border-radius: 5px;">';
			echo '<a title="' . esc_html($icone['nome']) . '" href="' . esc_url($icone['link']) . '" target="_blank"></a>';
			echo '';
			echo '<div class="nome-icone">' . esc_html($icone['nome']) . '</div>
			<script>
            function isBackgroundColorLight(rgbColor) {
				const hexColor = rgbToHex(rgbColor);
                const r = parseInt(hexColor.slice(1, 3), 16);
                const g = parseInt(hexColor.slice(3, 5), 16);
                const b = parseInt(hexColor.slice(5, 7), 16);
                const brightness = (r * 299 + g * 587 + b * 114) / 1000;
                return brightness > 128;
            }
			function rgbToHex(rgbColor) {
				const rgbArray = rgbColor.match(/\d+/g);
				const hex = rgbArray.map(value => {
					const hexValue = parseInt(value).toString(16);
					return hexValue.length === 1 ? "0" + hexValue : hexValue;
				});
			
				return "#" + hex.join("");
			}
			Array.from(document.querySelectorAll(".nome-icone")).forEach(element => {
				element.style.color = isBackgroundColorLight(element.parentElement.style.backgroundColor) ? "#000000" : "#ffffff";	
			})
        	</script>';

			if (!empty($icone['imagem'])) {
				echo '<img src="' . esc_url($icone['imagem']) . '" alt="' . esc_attr($icone['nome']) . '">';
			}
			echo '</div>';
		}
		echo '</div></div>';
	}
}
// fim ícones

function lazy_load_images($content)
{
	return preg_replace('/<img(.*?)src=([\'"])(.+?)\\2(.*?)>/i', '<img$1loading="lazy" src=$2$3$2$4>', $content);
}

add_filter('the_content', 'lazy_load_images');
add_filter('post_thumbnail_html', 'lazy_load_images');

function fix_search_pagination($query)
{
	if (is_search() && $query->is_main_query()) {
		if ($query->is_search()) {
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$query->set('paged', $paged);
		}
	}
}
add_action('pre_get_posts', 'fix_search_pagination');

function incluir_tipos_na_pesquisa($query)
{
	if (!is_admin() && $query->is_search && $query->is_main_query()) {
		$query->set('post_type', array('post', 'page', 'concursos', 'cursos', 'attachment'));
		$query->set('post_status', array('publish', 'inherit'));

		add_filter('posts_join', 'filtro_por_tipo_de_arquivo_join');
		add_filter('posts_where', 'filtro_por_tipo_de_arquivo_where');
	}
	return $query;
}

function filtro_por_tipo_de_arquivo_join($join)
{
	global $wpdb;
	$join .= " LEFT JOIN $wpdb->postmeta ON ($wpdb->posts.ID = $wpdb->postmeta.post_id AND $wpdb->postmeta.meta_key = '_wp_attached_file')";
	return $join;
}

function filtro_por_tipo_de_arquivo_where($where)
{
	global $wpdb;
	$allowed_extensions = array('doc', 'docx', 'odt', 'pps', 'ppsx', 'pdf');
	$where .= " AND (
        $wpdb->posts.post_type != 'attachment' OR
        (
            $wpdb->postmeta.meta_value IS NOT NULL AND $wpdb->postmeta.meta_value != '' AND
            SUBSTRING($wpdb->postmeta.meta_value, -3) IN ('" . implode("', '", $allowed_extensions) . "')
        )
    )";
	return $where;
}

add_filter('pre_get_posts', 'incluir_tipos_na_pesquisa');

function get_total_search_results_by_post_type()
{
	$args = array(
		's'              => get_search_query(),
		'posts_per_page' => -1,
	);

	$query = new WP_Query($args);

	$total_results_by_post_type = array();

	if ($query->have_posts()) {
		while ($query->have_posts()) {
			$query->the_post();
			$post_type = get_post_type();

			if (!isset($total_results_by_post_type[$post_type])) {
				$total_results_by_post_type[$post_type] = 0;
			}

			$total_results_by_post_type[$post_type]++;
		}
	}

	$attachments_count = count_attachments_in_search();
	$total_results_by_post_type['attachment'] = $attachments_count;

	wp_reset_postdata();
	return $total_results_by_post_type;
}

function count_attachments_in_search()
{
	global $wpdb;
	$search_query = get_search_query();

	$attachments_count = $wpdb->get_var(
		$wpdb->prepare(
			"SELECT COUNT(p.ID) 
            FROM {$wpdb->posts} p
            LEFT JOIN {$wpdb->postmeta} pm ON p.ID = pm.post_id AND pm.meta_key = '_wp_attached_file'
            WHERE p.post_type = %s
            AND p.post_status = 'inherit'
            AND (
                p.post_title LIKE %s
                OR p.post_content LIKE %s
                OR pm.meta_value LIKE %s
            )
            AND (
                RIGHT(pm.meta_value, 3) IN ('doc', 'ocx', 'odt', 'pps', 'psx', 'pdf')
            )",
			'attachment',
			'%' . $wpdb->esc_like($search_query) . '%',
			'%' . $wpdb->esc_like($search_query) . '%',
			'%' . $wpdb->esc_like($search_query) . '%'
		)
	);

	return $attachments_count;
}


function filter_search_results($query)
{
	if ($query->is_search && !is_admin() && $query->is_main_query()) {
		$post_type_filter = isset($_GET['post_type_filter']) ? sanitize_text_field($_GET['post_type_filter']) : '';

		if ($post_type_filter) {
			$query->set('post_type', $post_type_filter);
		}
	}
}

add_action('pre_get_posts', 'filter_search_results');


function post_word_count()
{
	$count = 0;
	$posts = get_posts(
		array(
			'numberposts' => -1,
			'post_type' => array('post', 'page')
		)
	);

	foreach ($posts as $post) {
		$count += str_word_count(strip_tags(get_post_field('post_content', $post->ID)));
	}

	$num = number_format_i18n($count);
	$text = _n('Word', 'Words', $num);

	echo "<tr><td class='first b'>{$num}</td><td class='t'>{$text}</td></tr>";
	echo '<p>This blog contains a total of <strong>' . $num . '</strong> published words!</p>';
}

add_action('right_now_content_table_end', 'post_word_count');
add_action('activity_box_end', 'post_word_count');


function adicionar_campo_instagram()
{
	add_settings_field(
		'campo_instagram',
		'Link do Instagram',
		'callback_campo_instagram',
		'general',
		'default'
	);

	register_setting('general', 'campo_instagram');
}
add_action('admin_init', 'adicionar_campo_instagram');

function callback_campo_instagram()
{
	$valor_atual = get_option('campo_instagram');
	echo '<input type="text" id="campo_instagram" name="campo_instagram" value="' . esc_attr($valor_atual) . '" placeholder="Insira o link do Instagram">';
}

function adicionar_campo_facebook()
{
	add_settings_field(
		'campo_facebook',
		'Link do Facebook',
		'callback_campo_facebook',
		'general',
		'default'
	);

	register_setting('general', 'campo_facebook');
}
add_action('admin_init', 'adicionar_campo_facebook');

function callback_campo_facebook()
{
	$valor_atual = get_option('campo_facebook');
	echo '<input type="text" id="campo_facebook" name="campo_facebook" value="' . esc_attr($valor_atual) . '" placeholder="Insira o link do Facebook">';
}

function adicionar_campo_youtube()
{
	add_settings_field(
		'campo_youtube',
		'Link do YouTube',
		'callback_campo_youtube',
		'general',
		'default'
	);

	register_setting('general', 'campo_youtube');
}
add_action('admin_init', 'adicionar_campo_youtube');

function callback_campo_youtube()
{
	$valor_atual = get_option('campo_youtube');
	echo '<input type="text" id="campo_youtube" name="campo_youtube" value="' . esc_attr($valor_atual) . '" placeholder="Insira o link do YouTube">';
}

function wt_get_category_count($input = '')
{
	global $wpdb;

	if ($input === '') {
		$category = get_the_category();
		return isset($category[0]) ? $category[0]->category_count : 0;
	} elseif (is_numeric($input)) {
		$SQL = $wpdb->prepare("SELECT $wpdb->term_taxonomy.count FROM $wpdb->terms, $wpdb->term_taxonomy WHERE $wpdb->terms.term_id = $wpdb->term_taxonomy.term_id AND $wpdb->term_taxonomy.term_id = %d", $input);
		return $wpdb->get_var($SQL);
	} else {
		$SQL = $wpdb->prepare("SELECT $wpdb->term_taxonomy.count FROM $wpdb->terms, $wpdb->term_taxonomy WHERE $wpdb->terms.term_id = $wpdb->term_taxonomy.term_id AND $wpdb->terms.slug = %s", $input);
		return $wpdb->get_var($SQL);
	}
}

function __popular_posts($no_posts = 6, $before = "<li>", $after = "</li>", $show_pass_post = false, $duration = "")
{
	global $wpdb;
	$request = "SELECT ID, post_title, COUNT($wpdb->comments.comment_post_ID) AS \"comment_count\" FROM $wpdb->posts, $wpdb->comments";
	$request .= " WHERE comment_approved=\"1\" AND $wpdb->posts.ID=$wpdb->comments.comment_post_ID AND post_status=\"publish\"";
	if (!$show_pass_post)
		$request .= " AND post_password =\"\"";
	if ($duration != "") {
		$request .= " AND DATE_SUB(CURDATE(),INTERVAL " . $duration . " DAY) < post_date ";
	}
	$request .= " GROUP BY $wpdb->comments.comment_post_ID ORDER BY comment_count DESC LIMIT $no_posts";
	$posts = $wpdb->get_results($request);
	$output = "";
	if ($posts) {
		foreach ($posts as $post) {
			$post_title = stripslashes($post->post_title);
			$comment_count = $post->comment_count;
			$permalink = get_permalink($post->ID);
			$output .= $before . " <a href=\"" . $permalink . "\" title=\"" . $post_title . "\">" . $post_title . "</a> " . $after;
		}
	} else {
		$output .= $before . "None found" . $after;
	}
	return $output;
}

function get_breadcrumb()
{
	echo '<div class="breadcrumbs">Você está aqui &nbsp;&nbsp;»&nbsp;&nbsp; <a href="' . home_url() . '">Página Inicial</a>';

	if (is_search()) {
		echo " &nbsp;&nbsp;&#187;&nbsp;&nbsp; ";
		echo 'Pesquisa sobre... "<em>' . get_search_query() . '</em>"';
	} elseif (is_category() || is_single()) {
		echo " &nbsp;&nbsp;&#187;&nbsp;&nbsp; ";

		$categories = get_the_category();
		if ($categories && !is_single()) {
			$category = $categories[0];
			echo '<a href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a> &nbsp;&nbsp;&#187;&nbsp;&nbsp; ';
		}

		if (is_single()) {
			$tags = get_the_tags();
			if ($tags) {
				foreach ($tags as $tag) {
					echo '<a href="' . esc_url(get_tag_link($tag->term_id)) . '">' . esc_html($tag->name) . '</a> &nbsp;&nbsp;&#187;&nbsp;&nbsp; ';
				}
			}
			the_title();
		}
	} elseif (is_page()) {
		global $post;
		$ancestors = get_post_ancestors($post->ID);

		foreach ($ancestors as $ancestor) {
			echo ' &nbsp;&nbsp;&#187;&nbsp;&nbsp; ';
			echo '<a href="' . get_permalink($ancestor) . '">' . get_the_title($ancestor) . '</a>';
		}

		echo " &nbsp;&nbsp;&#187;&nbsp;&nbsp; ";
		echo the_title();
	} elseif (is_archive()) {
		echo " &nbsp;&nbsp;&#187;&nbsp;&nbsp; ";

		if (is_date()) {
			echo '<a href="' . get_month_link(get_query_var('year'), get_query_var('monthnum')) . '">';
			echo get_the_date('F Y');
			echo '</a>';
		} elseif (is_category()) {
			single_cat_title();
		} elseif (is_tag()) {
			single_tag_title();
		}
	}

	echo '</div>';
}



function get_the_post_thumbnail_src($img)
{
	return (preg_match('~\bsrc="([^"]++)"~', $img, $matches)) ? $matches[1] : '';
}

if (function_exists('add_theme_support')) {
	add_image_size('admin-thumb', 100, 999999);
}

add_filter('manage_posts_columns', 'posts_columns', 5);
add_action('manage_posts_custom_column', 'posts_custom_columns', 5, 2);

function posts_columns($defaults)
{
	$defaults['my_post_thumbs'] = __('Imagem');
	return $defaults;
}

function posts_custom_columns($column_name, $id)
{
	if ($column_name === 'my_post_thumbs') {
		echo the_post_thumbnail('admin-thumb');
	}
}
add_theme_support('post-thumbnails', array('post', 'concursos', 'cursos'));
?>

<?php

add_action('add_meta_boxes', 'edital_add_custom_box');
add_action('save_post', 'edital_save_postdata');


function edital_add_custom_box()
{
	$screens = array('concursos');
	foreach ($screens as $screen) {
		add_meta_box(
			'edital_sectionid',
			__('Número e data do Edital', 'edital_textdomain'),
			'edital_inner_custom_box',
			$screen
		);
	}
}

function edital_inner_custom_box($post)
{
	wp_nonce_field(plugin_basename(__FILE__), 'edital_noncename');

	$numero_edital = get_post_meta($post->ID, 'numero_edital', true);
	$data_lancamento = get_post_meta($post->ID, 'data_lancamento', true);

	echo '<div style="display:flex;gap:5px;align-items:center;"><label for="numero_edital">';
	_e("Número do Edital:", 'edital_textdomain');
	echo '</label> ';
	echo '<input style="width:70px;" type="number" id="numero_edital" name="numero_edital" value="' . esc_attr($numero_edital) . '" /><br>';

	echo '<label for="data_lancamento">';
	_e("Data de Lançamento:", 'edital_textdomain');
	echo '</label> ';
	echo '<input type="date" id="data_lancamento" name="data_lancamento" value="' . esc_attr($data_lancamento) . '" /></div>';
}

function edital_save_postdata($post_id)
{
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

	if (!isset($_POST['post_type'])) return;

	if ('page' == $_POST['post_type']) {
		if (!current_user_can('edit_page', $post_id)) return;
	} else {
		if (!current_user_can('edit_post', $post_id)) return;
	}

	if (!isset($_POST['edital_noncename']) || !wp_verify_nonce($_POST['edital_noncename'], plugin_basename(__FILE__))) return;

	if (isset($_POST['numero_edital'])) {
		$numero_edital = sanitize_text_field($_POST['numero_edital']);
		update_post_meta($post_id, 'numero_edital', $numero_edital);
	}

	if (isset($_POST['data_lancamento'])) {
		$data_lancamento = sanitize_text_field($_POST['data_lancamento']);
		update_post_meta($post_id, 'data_lancamento', $data_lancamento);
	}

	if (isset($_POST['nEdital'])) {
		$nEdital = sanitize_text_field($_POST['nEdital']);
		update_post_meta($post_id, 'edital', $nEdital);
	}
}

add_action('add_meta_boxes', 'inicioInscricoes_add_custom_box');
add_action('save_post', 'inicioInscricoes_save_postdata');

function inicioInscricoes_add_custom_box()
{
	$screens = array('concursos');
	foreach ($screens as $screen) {
		add_meta_box(
			'inicioInscricoes_sectionid',
			__('Período de inscrições', 'inicioInscricoes_textdomain'),
			'inicioInscricoes_inner_custom_box',
			$screen
		);
	}
}

function inicioInscricoes_inner_custom_box($post)
{
	wp_nonce_field(plugin_basename(__FILE__), 'inicioInscricoes_noncename');
	$inicio = get_post_meta($post->ID, 'inicio_inscricoes', true);
	$fim = get_post_meta($post->ID, 'final_inscricoes', true);
	$horaInicial = get_post_meta($post->ID, 'inicio_hora_inscricoes', true);
	$horaFinal = get_post_meta($post->ID, 'final_hora_inscricoes', true);
	echo '<label for="dataInicial">';
	_e("", 'inicioInscricoes_textdomain');
	echo '</label> ';
	echo 'De <input type="date"  id="dataInicial" name="dataInicial" value="' . esc_attr($inicio) . '" /> às <input type="time"  id="horaInicial" name="horaInicial" value="' . esc_attr($horaInicial) . '" />';
	echo ' Até <input type="date"  id="dataFinal" name="dataFinal" value="' . esc_attr($fim) . '" /> às <input type="time"  id="horaFinal" name="horaFinal" value="' . esc_attr($horaFinal) . '" />';
}

function inicioInscricoes_save_postdata($post_id)
{
	if (!isset($_POST['post_type'])) return;

	if ('page' == $_POST['post_type']) {
		if (!current_user_can('edit_page', $post_id))
			return;
	} else {
		if (!current_user_can('edit_post', $post_id))
			return;
	}

	if (!isset($_POST['inicioInscricoes_noncename']) || !wp_verify_nonce($_POST['inicioInscricoes_noncename'], plugin_basename(__FILE__)))
		return;

	$post_ID = $_POST['post_ID'];

	$iniciodata = isset($_POST['dataInicial']) ? sanitize_text_field($_POST['dataInicial']) : '';
	$finaldata = isset($_POST['dataFinal']) ? sanitize_text_field($_POST['dataFinal']) : '';
	$iniciohora = isset($_POST['horaInicial']) ? sanitize_text_field($_POST['horaInicial']) : '';
	$finalhora = isset($_POST['horaFinal']) ? sanitize_text_field($_POST['horaFinal']) : '';

	update_post_meta($post_ID, 'inicio_inscricoes', $iniciodata);
	update_post_meta($post_ID, 'final_inscricoes', $finaldata);
	update_post_meta($post_ID, 'inicio_hora_inscricoes', $iniciohora);
	update_post_meta($post_ID, 'final_hora_inscricoes', $finalhora);
}


add_action('add_meta_boxes', 'txtInscricoes_add_custom_box');
add_action('save_post', 'txtInscricoes_save_postdata');

function txtInscricoes_add_custom_box()
{
	$screens = array('concursos');
	foreach ($screens as $screen) {
		add_meta_box(
			'txtInscricoes_sectionid',
			__('Texto sobre as inscrições', 'txtInscricoes_textdomain'),
			'txtInscricoes_inner_custom_box',
			$screen
		);
	}
}

function txtInscricoes_inner_custom_box($post)
{
	wp_nonce_field(plugin_basename(__FILE__), 'txtInscricoes_noncename');
	$txtInscricoes = get_post_meta($post->ID, 'txtInscricoes', true);

	echo '<label for="txtInscricoes">';
	_e("", 'txtInscricoes_textdomain');
	echo '</label> ';
	echo '<textarea placeholder="Ex.: https://www.link.com" id="txtInscricoes" name="txtInscricoes" rows="4" cols="60">' . esc_attr($txtInscricoes) . '</textarea>';
}

function txtInscricoes_save_postdata($post_id)
{
	if (!isset($_POST['post_type'])) return;

	if ('page' == $_POST['post_type']) {
		if (!current_user_can('edit_page', $post_id))
			return;
	} else {
		if (!current_user_can('edit_post', $post_id))
			return;
	}

	if (!isset($_POST['txtInscricoes_noncename']) || !wp_verify_nonce($_POST['txtInscricoes_noncename'], plugin_basename(__FILE__)))
		return;

	$post_ID = $_POST['post_ID'];

	$tInscricoes = isset($_POST['txtInscricoes']) ? sanitize_text_field($_POST['txtInscricoes']) : '';

	update_post_meta($post_ID, 'txtInscricoes', $tInscricoes);
}

function definirUnidade_add_custom_box()
{
	$screens = array('cursos', 'concursos');
	foreach ($screens as $screen) {
		add_meta_box(
			'definirUnidade_sectionid',
			__('Escolha a(s) unidade(s)', 'definirUnidade_textdomain'),
			'definirUnidade_inner_custom_box',
			$screen,
			'normal',
			'high'
		);
	}
}

function definirUnidade_inner_custom_box($post)
{
	wp_nonce_field(plugin_basename(__FILE__), 'definirUnidade_noncename');
	$definirUnidade = get_post_meta($post->ID, 'definirUnidade', true);

	$unidades = array(
		'Reitoria',
		'Alagoinhas',
		'Bom Jesus da Lapa',
		'Catu',
		'Governador Mangabeira',
		'Guanambi',
		'Itaberaba',
		'Itapetinga',
		'Santa Inês',
		'Senhor do Bonfim',
		'Teixeira de Freitas',
		'Uruçuca',
		'Valença',
		'Xique-Xique'
	);

	echo '<div class="checkboxUnidades">';
	foreach ($unidades as $unidade) {
		$definirUnidade = is_array($definirUnidade) ? $definirUnidade : array();
		$checked = in_array($unidade, $definirUnidade) ? 'checked' : '';
		echo '<div><input type="checkbox" name="definirUnidade[]" value="' . esc_attr($unidade) . '" ' . $checked . '>';
		echo '<label>' . esc_html($unidade) . '</label></div>';
	}
	echo '<div><input type="checkbox" id="definirUnidadeTodas" value="Todas as unidades">';
	echo '<label for="definirUnidadeTodas">Todas as unidades</label></div>';
?>
	<style>
		div.checkboxUnidades {
			display: flex;
			flex-flow: wrap;
			line-height: 2;
		}

		div.checkboxUnidades label {
			margin-right: 15px;
		}
	</style>
	<script>
		document.addEventListener('DOMContentLoaded', function() {
			const todasCheckbox = document.getElementById('definirUnidadeTodas');
			const checkboxes = document.querySelectorAll('[name="definirUnidade[]"]');

			todasCheckbox.addEventListener('change', function() {
				checkboxes.forEach(function(checkbox) {
					checkbox.checked = todasCheckbox.checked;
				});
			});

			checkboxes.forEach(function(checkbox) {
				checkbox.addEventListener('change', function() {
					todasCheckbox.checked = checkboxes.every(function(cb) {
						return cb.checked;
					});
				});
			});
		});
	</script>
<?php
}


function definirUnidade_save_postdata($post_id)
{
	if (!isset($_POST['post_type']) || !isset($_POST['definirUnidade_noncename'])) {
		return;
	}

	if (!wp_verify_nonce($_POST['definirUnidade_noncename'], plugin_basename(__FILE__))) {
		return;
	}

	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return;
	}

	if ('page' == $_POST['post_type']) {
		if (!current_user_can('edit_page', $post_id)) {
			return;
		}
	} else {
		if (!current_user_can('edit_post', $post_id)) {
			return;
		}
	}

	$definirUnidade = isset($_POST['definirUnidade']) ? array_map('sanitize_text_field', $_POST['definirUnidade']) : '';

	update_post_meta($post_id, 'definirUnidade', $definirUnidade);
}

add_action('add_meta_boxes', 'definirUnidade_add_custom_box');
add_action('save_post', 'definirUnidade_save_postdata');



add_action('add_meta_boxes', 'linkEdital_add_custom_box');
add_action('save_post', 'linkEdital_save_postdata');

function linkEdital_add_custom_box()
{
	$screens = array('concursos');
	foreach ($screens as $screen) {
		add_meta_box(
			'linkEdital_sectionid',
			__('Link de inscrição', 'linkEdital_textdomain'),
			'linkEdital_inner_custom_box',
			$screen
		);
	}
}

function linkEdital_inner_custom_box($post)
{
	wp_nonce_field(plugin_basename(__FILE__), 'linkEdital_noncename');
	$linkEdital = get_post_meta($post->ID, 'linkEdital', true);

	echo '<label for="linkEdital">';
	_e("", 'linkEdital_textdomain');
	echo '</label> ';
	echo '<input type="text" placeholder="Ex.: https://www.link.com" id="linkEdital" name="linkEdital" size="40" value="' . esc_attr($linkEdital) . '" />';
}

function linkEdital_save_postdata($post_id)
{
	if (!isset($_POST['post_type'])) return;

	if ('page' == $_POST['post_type']) {
		if (!current_user_can('edit_page', $post_id))
			return;
	} else {
		if (!current_user_can('edit_post', $post_id))
			return;
	}

	if (!isset($_POST['linkEdital_noncename']) || !wp_verify_nonce($_POST['linkEdital_noncename'], plugin_basename(__FILE__)))
		return;

	$post_ID = $_POST['post_ID'];

	$lEdital = isset($_POST['linkEdital']) ? sanitize_text_field($_POST['linkEdital']) : '';

	update_post_meta($post_ID, 'linkEdital', $lEdital);
}



add_action('add_meta_boxes', 'infoCurso_add_custom_box');
add_action('save_post', 'infoCurso_save_postdata');

function infoCurso_add_custom_box()
{
	$screens = array('cursos');
	foreach ($screens as $screen) {
		add_meta_box(
			'infoCurso_sectionid',
			__('Informações gerais', 'infoCurso_textdomain'),
			'infoCurso_inner_custom_box',
			$screen
		);
	}
}

function infoCurso_inner_custom_box($post)
{
	wp_nonce_field(plugin_basename(__FILE__), 'infoCurso_noncename');

	$denominacao = get_post_meta($post->ID, 'denominacao_curso', true);
	$ato = get_post_meta($post->ID, 'ato_autorizativo_curso', true);
	$area = get_post_meta($post->ID, 'area_curso', true);
	$modalidade = get_post_meta($post->ID, 'modalidade_curso', true);
	$tipo = get_post_meta($post->ID, 'tipo_curso', true);
	$vagas = get_post_meta($post->ID, 'vagas_curso', true);
	$turno = get_post_meta($post->ID, 'turno_curso', true);
	$periodicidade = get_post_meta($post->ID, 'periodicidade_curso', true);
	$carga = get_post_meta($post->ID, 'carga_curso', true);
	$ingresso = get_post_meta($post->ID, 'ingresso_curso', true);
	echo '<label for="denominacao">';
	_e("", 'infoCurso_textdomain');
	echo '</label> ';
	echo 'Denominação do Curso: <input type="text"  id="denominacao" name="denominacao" value="' . esc_attr($denominacao) . '" size="65"/> ';
	echo 'Ato Autorizativo: <input type="text" placeholder="Link do PPC do curso" id="ato" name="ato" value="' . esc_attr($ato) . '" size="20"/><br><br>';
	echo 'Área do conhecimento (CAPES): <input type="text" id="area" name="area" value="' . esc_attr($area) . '" size="20"/> ';
	echo 'Modalidade de ensino: <input type="text" id="modalidade" name="modalidade" value="' . esc_attr($modalidade) . '" size="10"/> ';
	echo 'Tipo: <input type="text" id="tipo" name="tipo" value="' . esc_attr($tipo) . '" size="30"/><br><br>';
	echo 'Número de vagas: <input type="number" id="vagas" name="vagas" value="' . esc_attr($vagas) . '" min="0" max="5000"/> ';
	echo 'Turno de funcionamento: <input type="text" id="turno" name="turno" value="' . esc_attr($turno) . '" size="9"/> ';
	echo 'Periodicidade da oferta: <input type="text" id="periodicidade" name="periodicidade" value="' . esc_attr($periodicidade) . '" size="10"/> ';
	echo 'Carga horária: <input type="number" id="carga" name="carga" value="' . esc_attr($carga) . '" min="0" max="5000"/><br><br>';
	echo 'Forma de ingresso: <input type="text" id="ingresso" name="ingresso" value="' . esc_attr($ingresso) . '" size="60"/> ';
}

function infoCurso_save_postdata($post_id)
{
	if (!isset($_POST['post_type'])) return;

	if ('page' == $_POST['post_type']) {
		if (!current_user_can('edit_page', $post_id))
			return;
	} else {
		if (!current_user_can('edit_post', $post_id))
			return;
	}

	if (!isset($_POST['infoCurso_noncename']) || !wp_verify_nonce($_POST['infoCurso_noncename'], plugin_basename(__FILE__)))
		return;

	$post_ID = $_POST['post_ID'];

	$denominacaoSAN = isset($_POST['denominacao']) ? sanitize_text_field($_POST['denominacao']) : '';
	$atoSAN = isset($_POST['ato']) ? sanitize_text_field($_POST['ato']) : '';
	$areaSAN = isset($_POST['area']) ? sanitize_text_field($_POST['area']) : '';
	$modalidadeSAN = isset($_POST['modalidade']) ? sanitize_text_field($_POST['modalidade']) : '';
	$tipoSAN = isset($_POST['tipo']) ? sanitize_text_field($_POST['tipo']) : '';
	$vagasSAN = isset($_POST['vagas']) ? sanitize_text_field($_POST['vagas']) : '';
	$turnoSAN = isset($_POST['turno']) ? sanitize_text_field($_POST['turno']) : '';
	$periodicidadeSAN = isset($_POST['periodicidade']) ? sanitize_text_field($_POST['periodicidade']) : '';
	$cargaSAN = isset($_POST['carga']) ? sanitize_text_field($_POST['carga']) : '';
	$ingressoSAN = isset($_POST['ingresso']) ? sanitize_text_field($_POST['ingresso']) : '';

	update_post_meta($post_ID, 'denominacao_curso', $denominacaoSAN);
	update_post_meta($post_ID, 'ato_autorizativo_curso', $atoSAN);
	update_post_meta($post_ID, 'area_curso', $areaSAN);
	update_post_meta($post_ID, 'modalidade_curso', $modalidadeSAN);
	update_post_meta($post_ID, 'tipo_curso', $tipoSAN);
	update_post_meta($post_ID, 'vagas_curso', $vagasSAN);
	update_post_meta($post_ID, 'turno_curso', $turnoSAN);
	update_post_meta($post_ID, 'periodicidade_curso', $periodicidadeSAN);
	update_post_meta($post_ID, 'carga_curso', $cargaSAN);
	update_post_meta($post_ID, 'ingresso_curso', $ingressoSAN);
}


function create_posttype()
{
	register_post_type(
		'concursos',
		array(
			'labels' => array(
				'name' => __('Concursos'),
				'singular_name' => __('Concurso')
			),
			'description' => 'Página de concursos do IF Baiano',
			'public' => true,
			'has_archive' => true,
			'supports' => array('title', 'editor', 'excerpt', 'thumbnail'),
			'taxonomies' => array('categorias_concursos', 'tags_concursos'),
			'rewrite' => array('slug' => 'concursos'),
			'show_in_rest' => true,
		)
	);

	register_taxonomy(
		'categorias_concursos',
		'concursos',
		array(
			'label' => __('Categorias de Concursos'),
			'hierarchical' => true,
			'show_ui' => true,
			'show_in_rest' => true,
			'rewrite' => array('slug' => 'categorias_concursos'),
		)
	);

	register_taxonomy(
		'tags_concursos',
		'concursos',
		array(
			'label' => __('Tags de Concursos'),
			'hierarchical' => false,
			'show_ui' => true,
			'show_in_rest' => true,
			'rewrite' => array('slug' => 'tags_concursos'),
		)
	);

	register_post_type(
		'cursos',
		array(
			'labels' => array(
				'name' => __('Cursos'),
				'singular_name' => __('Curso')
			),
			'description' => 'Página de cursos do IF Baiano',
			'public' => true,
			'has_archive' => true,
			'supports' => array('thumbnail', 'title', 'thumbnail', 'editor'),
			'taxonomies' => array('categorias_cursos', 'tags_cursos'),
			'rewrite' => array('slug' => 'cursos'),
			'show_in_rest' => true,
		)
	);

	register_taxonomy(
		'categorias_cursos',
		'cursos',
		array(
			'label' => __('Categorias de Cursos'),
			'hierarchical' => true,
			'show_ui' => true,
			'show_in_rest' => true,
			'rewrite' => array('slug' => 'categorias_cursos'),
		)
	);

	register_taxonomy(
		'tags_cursos',
		'cursos',
		array(
			'label' => __('Tags de Cursos'),
			'hierarchical' => false,
			'show_ui' => true,
			'show_in_rest' => true,
			'rewrite' => array('slug' => 'tags_cursos'),
		)
	);
}

add_action('init', 'create_posttype');

function multi_media_uploader_meta_box()
{
	add_meta_box('my-post-box-post', 'Documentos da página', 'multi_media_uploader_meta_box_func', 'post', 'normal', 'high');
	add_meta_box('my-post-box-page', 'Documentos da página', 'multi_media_uploader_meta_box_func', 'page', 'normal', 'high');
	add_meta_box('my-post-box-concursos', 'Documentos da página', 'multi_media_uploader_meta_box_func', 'concursos', 'normal', 'high');
	add_meta_box('my-post-box-cursos', 'Documentos da página', 'multi_media_uploader_meta_box_func', 'cursos', 'normal', 'high');
}

add_action('add_meta_boxes', 'multi_media_uploader_meta_box');

function multi_media_uploader_meta_box_func($post)
{
	wp_nonce_field('post_doc_upload', 'post_doc_upload_nonce');
	$doc_upload = get_post_meta($post->ID, 'post_doc_upload', true);
?>
	<style type="text/css">
		.multi-upload-medias ul li .delete-img {
			margin: 0 10px;
			background: red;
			border-radius: 50%;
			cursor: pointer;
			text-decoration: none;
			line-height: 20px;
			color: white;
		}

		.multi-upload-medias ul li {
			width: 100%;
			vertical-align: middle;
			position: relative;
			list-style: inside;
			color: #9a9a9a;
		}

		.multi-upload-medias ul li img {
			width: 100%;
		}
	</style>

	<table style="width:100%;">
		<tr>
			<td style="font-style:italic;padding:0;font-size:small;border-bottom:1px dashed #e1e1e1;">Lista de arquivos
				publicados</td>
		</tr>

		<tr>
			<td>
				<?php echo multi_media_uploader_field('post_doc_upload', $doc_upload); ?>
			</td>
		</tr>
	</table>

	<script type="text/javascript">
		jQuery(function($) {

			$('body').on('click', '.wc_multi_upload_image_button', function(e) {
				e.preventDefault();

				var button = $(this),
					custom_uploader = wp.media({
						title: 'Inserir documento',
						button: {
							text: 'Aplicar'
						},
						multiple: true
					}).on('select', function() {
						var attech_ids = '';
						attachments
						var attachments = custom_uploader.state().get('selection'),
							attachment_ids = new Array(),
							i = 0;
						attachments.each(function(attachment) {
							attachment_ids[i] = attachment['id'];
							attech_ids += ',' + attachment['id'];
							if (attachment.attributes.type == 'application/pdf') {
								$(button).siblings('ul').append('<li data-attechment-id="' + attachment['id'] + '"><a href="' + attachment.attributes.url + '" target="_blank"><img class="true_pre_image" src="' + attachment.attributes.url + '" /></a><i class=" dashicons dashicons-no delete-img"></i></li>');
							} else {
								$(button).siblings('ul').append('<li data-attechment-id="' + attachment['id'] + '"><a href="' + attachment.attributes.url + '" target="_blank"</a><i class=" dashicons dashicons-no delete-img"></i>' + attachment.attributes.title + '</li>');
							}

							i++;
						});

						var ids = $(button).siblings('.attechments-ids').attr('value');
						if (ids) {
							var ids = ids + attech_ids;
							$(button).siblings('.attechments-ids').attr('value', ids);
						} else {
							$(button).siblings('.attechments-ids').attr('value', attachment_ids);
						}
						$(button).siblings('.wc_multi_remove_image_button').show();
					})
					.open();
			});

			$('body').on('click', '.wc_multi_remove_image_button', function() {
				$(this).hide().prev().val('').prev().addClass('button').html('Add Media');
				$(this).parent().find('ul').empty();
				return false;
			});

		});

		jQuery(document).ready(function() {
			jQuery(document).on('click', '.multi-upload-medias ul li i.delete-img', function() {
				var ids = [];
				var this_c = jQuery(this);
				jQuery(this).parent().remove();
				jQuery('.multi-upload-medias ul li').each(function() {
					ids.push(jQuery(this).attr('data-attechment-id'));
				});
				jQuery('.multi-upload-medias').find('input[type="hidden"]').attr('value', ids);
			});
		})
	</script>
<?php
}

function multi_media_uploader_field($name, $value = '')
{
	$image = '">Adicionar documento';
	$image_str = '';
	$image_size = 'full';
	$display = 'none';
	$value = explode(',', $value);

	if (!empty($value)) {
		foreach ($value as $values) {
			if ($image_attributes = wp_get_attachment_url($values, $image_size)) {
				$attachment_title = get_the_title($values);
				$attachment_time = get_the_time('d/m/Y \à\s H\hi', $values);
				$image_str .= '<li data-attechment-id=' . $values . '><a href="' . $image_attributes . '" target="_blank"><strong>' . $attachment_title . '</strong></a> - ' . $attachment_time . '<i class="dashicons dashicons-no delete-img"></i></li>';
			}
		}
	}

	if ($image_str) {
		$display = 'inline-block';
	}

	$listaDocs = '<div class="multi-upload-medias"><ul>' . $image_str . '</ul><a href="#" class="wc_multi_upload_image_button button' . $image . '</a><input type="hidden" class="attechments-ids ' . $name . '" name="' . $name . '" id="' . $name . '" value="' . esc_attr(implode(',', $value)) . '" /><!--<a href="#" class="wc_multi_remove_image_button button" style="color: #ffffff;border-color: #0b5777;background: #0071a1;margin-left:10px;display:inline-block;display:' . $display . '">Excluir todos os documentos</a>--></div>';


	return $listaDocs;
}

function wc_meta_box_save($post_id)
{
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return;
	}

	if (!current_user_can('edit_post', $post_id)) {
		return;
	}

	if (isset($_POST['post_doc_upload_nonce']) && wp_verify_nonce($_POST['post_doc_upload_nonce'], 'post_doc_upload')) {
		if (isset($_POST['post_doc_upload'])) {
			update_post_meta($post_id, 'post_doc_upload', sanitize_text_field($_POST['post_doc_upload']));
		} else {
			delete_post_meta($post_id, 'post_doc_upload');
		}
	}
}

add_action('save_post', 'wc_meta_box_save');

function single_repeater_meta_boxes()
{
	add_meta_box('single-repeater-data', 'Corpo Docente', 'single_repeatable_meta_box_callback', 'cursos', 'normal', 'default');
}

add_action('admin_init', 'single_repeater_meta_boxes', 2);

function single_repeatable_meta_box_callback($post)
{

	$single_repeter_group = get_post_meta($post->ID, 'single_repeter_group', true);
	$doc_upload = get_post_meta($post->ID, 'post_doc_upload', true);

	wp_nonce_field('repeterBox', 'formType');
?>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$('#add-row').on('click', function() {
				var row = $('.empty-row.custom-repeter-text').clone(true);
				row.removeClass('empty-row custom-repeter-text').css('display', 'table-row');
				row.insertBefore('#repeatable-fieldset-one tbody>tr:last');
				return false;
			});

			$('.remove-row').on('click', function() {
				$(this).parents('tr').remove();
				return false;
			});
		});
	</script>

	<table id="repeatable-fieldset-one" width="100%">
		<tbody>
			<?php
			if ($single_repeter_group) :
				foreach ($single_repeter_group as $field) {
			?>
					<tr>
						<td><input type="text" style="width:98%;" name="nome[]" value="<?php if ($field['nome'] != '')
																							echo esc_attr($field['nome']); ?>" placeholder="Nome do(a) docente" /></td>
						<td><input type="text" style="width:98%;" name="titulacao[]" value="<?php if ($field['titulacao'] != '')
																								echo esc_attr($field['titulacao']); ?>" placeholder="Titulação" /></td>
						<td><input type="text" style="width:98%;" name="email[]" value="<?php if ($field['email'] != '')
																							echo esc_attr($field['email']); ?>" placeholder="docente@ifbaiano.edu.br" /></td>
						<td><input type="text" style="width:98%;" name="lattes[]" value="<?php if ($field['lattes'] != '')
																								echo esc_attr($field['lattes']); ?>" placeholder="http://lattes.cnpq.br/docente" /></td>
						<td><a class="button remove-row" href="#1">Remover</a></td>
					</tr>
				<?php
				}
			else :
				?>
				<tr>
					<td><input type="text" style="width:98%;" name="nome[]" placeholder="Nome do(a) docente" /></td>
					<td><input type="text" style="width:98%;" name="titulacao[]" placeholder="Titulação" /></td>
					<td><input type="text" style="width:98%;" name="email[]" placeholder="docente@ifbaiano.edu.br" /></td>
					<td><input type="text" style="width:98%;" name="lattes[]" placeholder="http://lattes.cnpq.br/docente" />
					</td>
					<td><a class="button  cmb-remove-row-button button-disabled" href="#">Remover</a></td>
				</tr>

			<?php endif; ?>
			<tr class="empty-row custom-repeter-text" style="display: none">
				<td><input type="text" style="width:98%;" name="nome[]" placeholder="Nome do(a) docente" /></td>
				<td><input type="text" style="width:98%;" name="titulacao[]" placeholder="Titulação" /></td>
				<td><input type="text" style="width:98%;" name="email[]" placeholder="docente@ifbaiano.edu.br" /></td>
				<td><input type="text" style="width:98%;" name="lattes[]" placeholder="http://lattes.cnpq.br/docente" />
				</td>
				<td><a class="button remove-row" href="#">Remover</a></td>
			</tr>

		</tbody>
	</table>
	<p><a id="add-row" class="button" href="#">Adicionar</a></p>
<?php
}

function single_repeatable_meta_box_save($post_id)
{
	if (!isset($_POST['formType']) || !wp_verify_nonce($_POST['formType'], 'repeterBox'))
		return;

	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
		return;

	if (!current_user_can('edit_post', $post_id))
		return;

	$old = get_post_meta($post_id, 'single_repeter_group', true);

	$new = array();
	$nomes = $_POST['nome'];
	$titulacaos = $_POST['titulacao'];
	$emails = $_POST['email'];
	$lattess = $_POST['lattes'];
	$coordenacaos = $_POST['coordenacao'];
	$count = count($nomes);
	for ($i = 0; $i < $count; $i++) {
		if ($nomes[$i] != '') {
			$new[$i]['nome'] = stripslashes(strip_tags($nomes[$i]));
			$new[$i]['titulacao'] = stripslashes($titulacaos[$i]);
			$new[$i]['email'] = stripslashes($emails[$i]);
			$new[$i]['lattes'] = stripslashes($lattess[$i]);
			$new[$i]['coordenacao'] = stripslashes($coordenacaos[$i]);
		}
	}

	if (!empty($new) && $new != $old) {
		update_post_meta($post_id, 'single_repeter_group', $new);
	} elseif (empty($new) && $old) {
		delete_post_meta($post_id, 'single_repeter_group', $old);
	}
	$repeter_status = $_REQUEST['repeter_status'];
	update_post_meta($post_id, 'repeter_status', $repeter_status);
}

add_action('save_post', 'single_repeatable_meta_box_save');

function coordenacao_add_custom_box()
{
	$screens = array('cursos');
	foreach ($screens as $screen) {
		add_meta_box(
			'coordenacao_sectionid',
			__('Coordenação do curso', 'coordenacao_textdomain'),
			'coordenacao_inner_custom_box',
			$screen
		);
	}
}

add_action('add_meta_boxes', 'coordenacao_add_custom_box', 1);

function coordenacao_inner_custom_box($post)
{
	wp_nonce_field(plugin_basename(__FILE__), 'coordenacao_noncename');
	$nomeCoo = get_post_meta($post->ID, 'coordenacao_nome', true);
	$titulacaoCoo = get_post_meta($post->ID, 'coordenacao_titulacao', true);
	$emailCoo = get_post_meta($post->ID, 'coordenacao_email', true);
	$lattesCoo = get_post_meta($post->ID, 'coordenacao_lattes', true);

	echo '<label for="tableCoo">';
	_e("", 'coordenacao_textdomain');
	echo '</label><table width="100%"><tbody><tr>';
	echo '<td><input id="tableCoo" style="width:98% "type="text" name="nome_coordenador" placeholder="Nome do(a) coordenador(a)" value="' . esc_attr($nomeCoo) . '"/></td>';
	echo '<td><input style="width:98%" type="text" name="titulacao_coordenador" placeholder="Titulação" value="' . esc_attr($titulacaoCoo) . '"/></td>';
	echo '<td><input style="width:98%" type="text" name="email_coordenador" placeholder="E-mail" value="' . esc_attr($emailCoo) . '"/></td>';
	echo '<td><input style="width:98%" type="text" name="lattes_coordenador" placeholder="Currículo Lattes" value="' . esc_attr($lattesCoo) . '"/></td>';
	echo '</tr></tbody></table>';
}

function coordenacao_save_postdata($post_id)
{
	if (!isset($_POST['post_type'])) return;

	if ('page' == $_POST['post_type']) {
		if (!current_user_can('edit_page', $post_id))
			return;
	} else {
		if (!current_user_can('edit_post', $post_id))
			return;
	}

	if (!isset($_POST['coordenacao_noncename']) || !wp_verify_nonce($_POST['coordenacao_noncename'], plugin_basename(__FILE__)))
		return;

	$post_ID = $_POST['post_ID'];

	$coordenacaoSAN = isset($_POST['nome_coordenador']) ? sanitize_text_field($_POST['nome_coordenador']) : '';
	$tcoordenacaoSAN = isset($_POST['titulacao_coordenador']) ? sanitize_text_field($_POST['titulacao_coordenador']) : '';
	$ecoordenacaoSAN = isset($_POST['email_coordenador']) ? sanitize_text_field($_POST['email_coordenador']) : '';
	$lcoordenacaoSAN = isset($_POST['lattes_coordenador']) ? sanitize_text_field($_POST['lattes_coordenador']) : '';

	update_post_meta($post_ID, 'coordenacao_nome', $coordenacaoSAN);
	update_post_meta($post_ID, 'coordenacao_titulacao', $tcoordenacaoSAN);
	update_post_meta($post_ID, 'coordenacao_email', $ecoordenacaoSAN);
	update_post_meta($post_ID, 'coordenacao_lattes', $lcoordenacaoSAN);
}

add_action('save_post', 'coordenacao_save_postdata');

function cardConcursos()
{
	$numero_edital = get_post_meta(get_the_ID(), 'numero_edital', true);
	$data_lancamento = get_post_meta(get_the_ID(), 'data_lancamento', true);
	$data_lancamento_formatada = date_i18n('d \d\e F \d\e Y', strtotime($data_lancamento));
	$documentos = get_post_meta(get_the_ID(), 'post_doc_upload', true);
	if (!empty($documentos)) {
		$documentos_array = explode(',', $documentos);
		$ultimo_documento_id = end($documentos_array);
		$ultimo_documento = get_the_title($ultimo_documento_id);
		$data_upload = new DateTime(get_post_field('post_date', $ultimo_documento_id, 'raw'));
		$data_formatada = $data_upload->format('H\hi') . ' de ' . $data_upload->format('d/m/Y');
	}
	$dataini = get_post_meta(get_the_ID(), 'inicio_inscricoes', true);
	$datafim = date("d/m/Y", strtotime(get_post_meta(get_the_ID(), 'final_inscricoes', true)));
	$horaini = get_post_meta(get_the_ID(), 'inicio_hora_inscricoes', true);
	$horafim = get_post_meta(get_the_ID(), 'final_hora_inscricoes', true);
	$datainiecho = date("d/m/Y", strtotime($dataini));
	$horainiecho = date("H", strtotime($horaini));
	$horafimecho = date("H", strtotime($horafim));
	$anoPublicacao = get_the_time('Y');
	$definirUnidade = get_post_meta(get_the_ID(), 'definirUnidade', true);
	echo '<div class="cardConcursos" data-title="' . get_the_title() . '"><a href="' . get_permalink() . '"><div class="imagemCardConcursos">';

	if (has_post_thumbnail())
		echo the_post_thumbnail();
	else
		echo '<img src="https://ifbaiano.edu.br/portal/wp-content/uploads/2021/04/imagem-marca-site-concursos-2021.png" alt="Concurso IF Baiano" />';

	echo '</div><div class="infoCardConcursos"><span class="titulo">' . get_the_title() . '</span>';
?>
	<script>
		(() => {
			const dataAtual = new Date();
			const dataAtualParse = Date.parse(dataAtual);
			const horaFinal = '<?php echo $horafim; ?>'.split(":");
			const inicioInscricoes = '<?php echo $datainiecho; ?>'.split("/");
			const inicioData = Date.parse(new Date(inicioInscricoes[2], inicioInscricoes[1] - 1, inicioInscricoes[0]));
			const fimInscricoes = '<?php echo $datafim; ?>'.split("/");
			const fimData = Date.parse(new Date(fimInscricoes[2], fimInscricoes[1] - 1, fimInscricoes[0]));
			const fimParseData = new Date(fimData).setHours(horaFinal[0]);
			const horaInicial = '<?php echo $horaini; ?>'.split(":");
			const horaIni = horaInicial[0] * 3600;
			let anoPublicacao = '<?php echo $anoPublicacao; ?>';

			if (dataAtualParse >= inicioData + horaIni && dataAtualParse <= fimParseData) {
				timestampInicioInscricoes = fimParseData + 'aberta';
			} else if (dataAtualParse < inicioData + horaIni) {
				timestampInicioInscricoes = inicioData + 'breve';
			} else {
				timestampInicioInscricoes = fimParseData + 'fechada' + anoPublicacao;
			}

		})();
	</script>
	<?php
	echo '<div class="avisoInscricoes" style="width:100%"><span class="timestampInicioInscricoes" style="display:none"><script>document.write(timestampInicioInscricoes)</script></span><div class="unidadeInscricoesRow">';
	if (!empty($definirUnidade)) { ?>
		<div class="unidadesHead">
			<?php
			foreach ($definirUnidade as $elemento) {
				echo '<div>' . $elemento . '</div>';
			}
			?>
		</div>
<?php }
	if ($dataini && $datafim && $horaini && $horafim) {
		$timezone = new DateTimeZone('America/Sao_Paulo');
		$dataAtual = date("d/m/Y");
		$horaAtual = (new DateTime('now', $timezone))->format('H:i');
		$dataIniTimestamp = strtotime($dataini . ' ' . $horaini);
		$dataFimTimestamp = strtotime(DateTime::createFromFormat('d/m/Y', $datafim)->format('Y-m-d') . ' ' . $horafim);
		$dataAtualTimestamp = strtotime(DateTime::createFromFormat('d/m/Y', $dataAtual)->format('Y-m-d') . ' ' . $horaAtual);
		if ($dataAtualTimestamp > $dataIniTimestamp && $dataAtualTimestamp < $dataFimTimestamp) {
			echo "<div class='prazoInscricoesConcurso'><span style='color:#72d38f;font-size:7pt;'>&#10148;</span> Inscrições até " . $datafim . "</div>";
		} elseif ($dataAtualTimestamp < $dataIniTimestamp) {
			echo "<div class='prazoInscricoesConcurso'><span style='color:#72d38f;font-size:7pt;'>&#10148;</span> Inscrições a partir de " . (DateTime::createFromFormat('Y-m-d', $dataini)->format('d/m/Y')) . "</div>";
		}
	}
	echo '</div><div class="ultimoDocConcurso">Último documento adicionado:<br>';
	echo '<span class="ultimoDocConcurso">' . $ultimo_documento . '</span> <span class="ultimoDocDataConcurso">- às ' . $data_formatada . '</span></div>';
	echo '</div></div></a></div>';
}

// Remove a aba "Comentários" do painel de administração
function remove_comments_menu() {
    remove_menu_page('edit-comments.php');
}
add_action('admin_menu', 'remove_comments_menu');

// Remove suporte a comentários em postagens e páginas
function disable_comments_support() {
    remove_post_type_support('post', 'comments');
    remove_post_type_support('page', 'comments');
}
add_action('init', 'disable_comments_support');

// Fecha os comentários na tela de edição de postagem
function close_comments() {
    $post_types = get_post_types();
    foreach ($post_types as $post_type) {
        if (post_type_supports($post_type, 'comments')) {
            remove_post_type_support($post_type, 'comments');
            remove_post_type_support($post_type, 'trackbacks');
        }
    }
}
add_action('admin_init', 'close_comments');

// Remove links de comentários do painel de administração
function remove_comment_links() {
    remove_filter('comment_row_actions', 'wp_comment_row_actions', 10, 2);
    remove_filter('page_row_actions', 'wp_comment_row_actions', 10, 2);
}
add_action('admin_init', 'remove_comment_links');

?>