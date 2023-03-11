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
				<!-- INICIO DO CONTEUDO DA PAGINA -->
				<?php 
				if ( have_posts() ){
				
					while ( have_posts() ) { 
						the_post(); ?>
						
						<div id="tituloNoticia">
							<?php the_title(); ?>
						</div>
<div class="imagem-data-publicacao"></div><div class="data-de-publicacao">Última atualização: <?php the_modified_time('d/m/Y - G:i '); ?>horas | 
				<?php  echo ' Data de publicação: ' . get_the_date('d/m/Y - G:i ') . 'horas'; ?></div>
						<div id="textoNoticia">
							<?php the_content(); ?>
							<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'twentyten' ), 'after' => '</div>' ) ); ?>
						</div>
			<?php	}
				} ?>
				<!-- FIM DO CONTEUDO DA PAGINA -->
			</div>
		</div>
	</div>
</div> <!-- FIM DA DIV TUDO -->	
<?php get_footer(); ?>