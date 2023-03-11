<!--?php /* Template name: Todas os Informes */ ?-->
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
				<!-- INICIO DE TODAS A NOTICIAS -->
				<div id="tituloNoticia">
					Todos os Informes
				</div>
				
				<div id="conteudoTodasNoticias">
					<?php				
					wp_reset_query();
					wp_reset_postdata() ;
					$argumentos = array(
					'category_name'=>'informes',
					'numberposts' => -1
					);
					
					$my_posts = get_posts($argumentos);
					
					if( $my_posts){
						foreach( $my_posts as $post ){
							setup_postdata($post);	
							foreach(get_the_category() as $cat) {
								if(($cat->cat_name=='Informes')){
						?>
							<div id="InformesContainer">
								<div id="InformesdoData">
									<?php the_time('d/m/Y \à\s H:j'); ?>
								</div>
								<div id="InformesTitulo">
									<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								</div>
							</div>
					<?php
								} 
							}
						}
					}else{
						echo "Nada encontrado.";
					} ?>
					<div id="paginacao_pagefullpost">
						<?php if(function_exists("wp_pagenavi")) { wp_pagenavi(); } ?>
					</div>
				</div>
				<!-- FIM DE TODAS A NOTICIAS -->
			</div>
		</div>
	</div>
</div> <!-- FIM DA DIV TUDO -->	
<?php get_footer(); ?>