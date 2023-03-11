<!--?php /* Template name: Todas as notícias */ ?-->
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
					Todas as Not&iacute;cias
				</div>
				
			
				<div id="conteudoTodasNoticias"><?php get_search_form(); ?>
					<?php

					// Declare some helper vars
					$previous_year = $year = 0;
					$previous_month = $month = 0;
					$ul_open = false;
					 
					// Get the posts
					$myposts = query_posts('numberposts=-1&orderby=post_date&order=DESC&posts_per_page=-1');
					$data;
					while(have_posts()) {
						the_post();
					 
						// Setup the post variables
						setup_postdata($post);
					 
						$year = mysql2date('Y', the_post_post_date);
						$month = mysql2date('n', the_post_post_date);
						$day = mysql2date('j', the_post_post_date);
						
						if($year != $previous_year || $month != $previous_month) { 
							if($ul_open == true) { ?>
								</ul>
					<?php 	} ?>
						 
							
					 
							<?php $ul_open = true; 
						} 

						$previous_year = $year; $previous_month = $month;
						?>
						
						<div id="todasnoticiassecao">
									<div id="imagemtodasnoticias"><a href="<?php the_permalink(); ?>"><?php
					if ( has_post_thumbnail() ) {
					// mostra a imagem destacada
					the_post_thumbnail();
					} else {
					// mostra outra coisa (imagem, texto, etc.)
					    echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) 
												. '/imagens/thumb-noticia.png" />';
					}
					?></a>			</div>
									<div id="datatodasnoticias">
										<?php the_time('d/m/Y \à\s H:i\h'); ?>
									</div>
									<div id="titulotodasnoticias">
										<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
									</div>
									<div id="resumotodasnoticias">
										<a href="<?php the_permalink(); ?>"><?php the_excerpt(); ?></a>
									</div>
						</div>
				 
					<?php } ?>
						
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