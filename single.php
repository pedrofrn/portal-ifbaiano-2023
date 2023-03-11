<?php get_header(); ?>
	<div id = "containerMeio">
		<div id = "containerMeioEsquerda">
			<div onClick="return true" class="dropdownmenu"><div id = "MenuPrincipal">
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Menu Principal') ) : ?>
					
				<?php endif; ?>
			</div></div>
		</div>
		
		<div id = "containerMeioCentroNoticia">
			<div id="containerNoticiapost">
				<!-- INICIO DA NOTICIA -->
				<?php	 
					if ( have_posts() ){
						while ( have_posts() ) { 
						the_post(); 
						?>						
						
						
						<div id="tituloNoticia">
							<?php the_title(); ?>
						</div>
<div class="imagem-data-publicacao"></div><div class="data-de-publicacao">
Atualizado em <strong><?php the_modified_time('j \d\e F \d\e Y \à\s G:i '); ?>horas</strong> | Publicado em <strong><?php  echo '' . get_the_date('j \d\e F \d\e Y \à\s G:i ') . 'horas'; ?></strong>
</div>
<div class="subtitulo-post"><?php if ( ! has_excerpt() ) {
      echo '';
} else { 
      the_excerpt();
}
?></div>						
						<div id="textoNoticia">
							<?php the_content(); ?>
							<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Páginas:', 'twentyten' ), 'after' => '</div>' ) ); ?>
						</div>	

				<?php }
					} 
					?>

				<!-- FIM DA NOTICIA -->
			</div>
			<div id="outrasnoticias"><h2 class="outrastitulo">Outras notícias</h2>
			<?php							
					$args = array(
					'post__not_in' => array( $post->ID )
					);
					$my_posts = get_posts($args);
					$NumeroPosts = 0;
					if( $my_posts){
						foreach( $my_posts as $post ){
							setup_postdata($post);	

							foreach(get_the_category() as $cat) {
								if(($cat->cat_name=='Ultimas Noticias') && ($NumeroPosts < 3)){
									$NumeroPosts++;						?>
								<div id="NoticiasConteudoContainer">
								
					<a href="<?php the_permalink(); ?>"><div class="imagemnoticia"><?php
					if ( has_post_thumbnail() ) {
					// mostra a imagem destacada
					the_post_thumbnail();
					} else {
					// mostra outra coisa (imagem, texto, etc.)
					    echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) 
												. '/imagens/thumb-ultima-noticia.jpg" />';
					}
					?></div></a>
									<div class="infonoticia">
									<div id="NoticiasConteudoData">
										<?php the_time('d/m/Y \à\s H:i\h'); ?>
									</div>
									<div id="NoticiasConteudoTitulo">
										<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
									</div></div>
								</div>
					<?php
								}
							}
						} 
					}else{
						echo "Nada encontrado.";
					} ?>
			</div>
		</div>
	</div>
</div> <!-- FIM DA DIV TUDO -->	
<?php get_footer(); ?>