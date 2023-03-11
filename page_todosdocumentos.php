<!--?php /* Template name: Todos os documentos */ ?-->
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
					Todos os documentos
				</div>
				<p>Abaixo, lista de documentos publicados pelo IF Baiano - <?php bloginfo('name'); ?>:
			
				<div id="conteudoTodasNoticias">
					<?php				
				wp_reset_query();
				wp_reset_postdata() ;
				$args = array( 'post_type' => 'attachment', 
					'numberposts' => -1, 
					'post_status' => null, 
					'post_parent' => null, 
					'post_mime_type' => 'application/pdf, application/vnd.oasis.opendocument.text, 
						application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document, 
						application/rar, application/zip' 
				);
				$my_posts = get_posts( $args );
				
				if( $my_posts){
					foreach( $my_posts as $post ){
						setup_postdata($post);	
						$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); 
						$resumo = substr(get_the_excerpt(), 0, 300);
						$titulo = substr(get_the_title(), 0 , 75);
				?>
				  <div id="ListaDestaques">
					<div id="ImagemNoticiaDestaque">
						<?php if(!empty($image)){?>
							<img src="<?php echo $image[0]; ?>" alt="Imagem da noticia destacada com miniatura para a pagina principal 1"/>
						<?php
						}else{
						?>
							<img style="opacity: 0.2;float: left;margin-right: 10px;width:20px;" src="<?php bloginfo('template_url'); ?>/imagens/icone-arquivo.png" />
						<?php
						}
						?>
					</div>
					<div id="DocumentosTitulo">
						<a target="_blank" href="<?php echo wp_get_attachment_url(); ?>"><?php echo $titulo; ?></a>
					</div>
					<div id="DocumentosData">
										<a target="_blank" href="<?php echo wp_get_attachment_url(); ?>"> 
											<?php  echo '' . get_the_date('d/m/Y - G:i ') . 'horas'; ?>
										</a>
									</div>
				</div>
				 <?php 
						}
					}
				 ?>
				</div>
				<!-- FIM DE TODAS A NOTICIAS -->
			</div>
		</div>
	</div>
</div> <!-- FIM DA DIV TUDO -->	
<?php get_footer(); ?>