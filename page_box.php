<!--?php /* Template name: Interna_Boxes */ ?-->
<?php get_header(); ?>
	<div id = "containerMeio">
		<div id = "containerMeioEsquerda">
			<div onClick="return true" class="dropdownmenu"><div id = "MenuPrincipal">
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Menu Principal') ) : ?>
					
				<?php endif; ?>
			</div></div>
		</div>
		
		<div id="containerProreitoria">
			<?php 
				if ( have_posts() ){
					the_post();
					$id_post = get_the_ID();
			?>
			<div id="containerProreitoriaTitulo">
				<?php the_title(); ?>
			</div>
			<?php 
			$conteudo =  get_the_content();
			if(!empty(trim($conteudo))){ ?>
			<div id="containerProreitoriaTopo">
				<div id="ProreitoriaTopoTitulo">
					Sobre
				</div>
				<div id="ProreitoriaTopoConteudo">
					<?php echo $conteudo; ?>
				</div>
			</div>
			<?php } ?>
		<?PHP } ?>
			<div id="containerProreitoriaMeio">
				<?php
				$array_campos_customizados;
				$index = 0;
				$custom_field_keys = get_post_custom_keys($id_post);
				foreach ( $custom_field_keys as $key => $value ) {
					$valuet = trim($value);
					
					if ( '_' == $valuet{0} )
						continue;
					//
					//echo $key . " => " . $value . "<br />";
					$valor = get_post_meta($id_post, $value, true); 
					$array_campos_customizados[$index] = $value;
					$index++;
					$array_campos_customizados[$index] = $valor;
					$index++;
				}
				$tam_Array = count($array_campos_customizados);
				?>
				<?php if($tam_Array >= 2){ ?>
				<div id="ProreitoriaMeioEsquerda">
					<div id="ProreitoriaMeioEsquerdaTitulo">
						<?php echo $array_campos_customizados[0];?>
					</div>
					<div id="ProreitoriaMeioEsquerdaConteudo">
						<?php echo $array_campos_customizados[1];?>
					</div>
					<?php } ?>
				</div>
				<?php if($tam_Array >= 4){ ?>
				<div id="ProreitoriaMeioDireita">
					<div id="ProreitoriaMeioDireitaTitulo">
						<?php echo $array_campos_customizados[2];?>
					</div>
					<div id="ProreitoriaMeioDireitaConteudo">
						<?php echo $array_campos_customizados[3];?>
					</div>
				</div>
				<?php } ?>
			</div>
			<?php if($tam_Array >= 6){ ?>
			<div id="containerProreitoriabaixo">
				<div id="ProreitoriabaixoTitulo">
					<?php echo $array_campos_customizados[4]; ?>
				</div>
				<div id="ProreitoriabaixoConteudo">
					<?php echo $array_campos_customizados[5]; ?>
				</div>
			</div>
			<?php } ?>
			<div id="containerProreitoriaRodape">
				<?php if($tam_Array >= 8){ ?>
				<div id="ProreitoriaRodapeEsquerda">
					<div id="ProreitoriaRodapeEsquerdaTitulo">
						<?php echo $array_campos_customizados[6];?>
					</div>
					<div id="ProreitoriaRodapeEsquerdaConteudo">
						<?php echo $array_campos_customizados[7];?>
					</div>
					<?php } ?>
				</div>
				<?php if($tam_Array >= 10){ ?>
				<div id="ProreitoriaRodapeDireita">
					<div id="ProreitoriaRodapeDireitaTitulo">
						<?php echo $array_campos_customizados[8];?>
					</div>
					<div id="ProreitoriaRodapeDireitaConteudo">
						<?php echo $array_campos_customizados[9];?>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div> <!-- FIM DA DIV TUDO -->	
<?php get_footer(); ?>