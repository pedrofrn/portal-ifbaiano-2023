<?php get_header(); ?>
	<div id = "containerMeio">
		<div id = "containerMeioEsquerda">
			<div onClick="return true" class="dropdownmenu"><div id = "MenuPrincipal">
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Menu Principal') ) : ?>
					
				<?php endif; ?>
			</div></div>
		</div>
		
		<div id = "containerMeioCentroNoticia">
			<div id="containerNoticia">
				
				<!-- INICIO DA NOTICIA -->
				<p>Publicações relacionadas com o termo: <span style="color:#396c30;"><strong><?php single_tag_title(); ?></strong></span></p>
<?php
//for use in the loop, list 5 post titles related to first tag on current post
$tags = wp_get_post_tags($post->ID);
if ($tags) {
echo '';
$first_tag = $tags[0]->term_id;
$args=array(
'tag__in' => array($first_tag),
'post__not_in' => array($post->ID),
'posts_per_page'=>5,
'caller_get_posts'=>1
);
$my_query = new WP_Query($args);
if( $my_query->have_posts() ) {
while ($my_query->have_posts()) : $my_query->the_post(); ?>
<li><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>


<?php
endwhile;
}
wp_reset_query();
}
?>
<!-- FIM DA NOTICIA -->
			</div>
		</div>
	</div>
</div> <!-- FIM DA DIV TUDO -->	
<?php get_footer(); ?>