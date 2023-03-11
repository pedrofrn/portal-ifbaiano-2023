<?php get_header(); ?>
	<div id = "containerMeio">
		<div id = "containerMeioEsquerda">
		<div id="marcaCampus"></div>
								
		<?php include 'menu.php'; ?>
		</div>
		
		<div id = "containerMeioCentroNoticia">
			<div id="containerNoticiapost">
				<!-- INICIO DA NOTICIA -->
				<?php	 
					if ( have_posts() ){
						while ( have_posts() ) { 
						the_post(); 
						?>
						<div class="data-de-publicacao">
Atualizado em <strong><?php the_modified_time('j \d\e F \d\e Y \à\s G\hi '); ?>horas</strong> | Página criada em <strong><?php  echo '' . get_the_date('j \d\e F \d\e Y \à\s G\hi ') . 'horas'; ?></strong>
</div>
						<div id="head">
						<div id="nomeEdital">
						<h2>
						<?php $tipo = get_post_meta( get_the_ID(), 'tipo_curso', true );
						echo $tipo; ?>
						</h2>
						<div id="tituloNoticia">
							<?php the_title(); ?>
						</div>
						<p>
						<?php
						if ( has_excerpt() ) { ?>
						<?php the_excerpt(); ?>
						<?php } else {
						
						}
						?>	
						</p>
						</div>
												
						</div>
						
						<div id="editalContent">
							<div id="editalApresentacao">
							<h3 id="docsLista">Apresentação</h3>			
								<div id="textoNoticia">
									<?php the_content(); ?>
									
								</div>
							</div>
							<div id="editalInscricoes" style="flex:5;">
							<h3 id="docsLista">Informações Gerais</h3>
							<!-- inscrições -->
							<div id="periodoInscricoes">
							<?php 
							$denominacao = get_post_meta( get_the_ID(), 'denominacao_curso', true );
							$ato = get_post_meta( get_the_ID(), 'ato_autorizativo_curso', true );
							$area = get_post_meta( get_the_ID(), 'area_curso', true );
							$modalidade = get_post_meta( get_the_ID(), 'modalidade_curso', true );
							$vagas = get_post_meta( get_the_ID(), 'vagas_curso', true );
							$turno = get_post_meta( get_the_ID(), 'turno_curso', true );
							$periodicidade = get_post_meta( get_the_ID(), 'periodicidade_curso', true );
							$carga = get_post_meta( get_the_ID(), 'carga_curso', true );
							$ingresso = get_post_meta( get_the_ID(), 'ingresso_curso', true );
							?>
							<table id="infoCursoTabela">
								<tr>
									<td class="infoCursoTitulo">Denominação do curso</td>
									<td class="infoCursoResposta"><?php echo $denominacao; ?></td>
								</tr>
								<tr>
									<td class="infoCursoTitulo">Ato Autorizativo</td>
									<td class="infoCursoResposta"><a href="<?php echo $ato; ?>" target="_blank">PPC do curso</a></td>
								</tr>
								<tr>
									<td class="infoCursoTitulo">Área do conhecimento (CAPES)</td>
									<td class="infoCursoResposta"><?php echo $area; ?></td>
								</tr>
								<tr>
									<td class="infoCursoTitulo">Modalidade de ensino</td>
									<td class="infoCursoResposta"><?php echo $modalidade; ?></td>
								</tr>
								<tr>
									<td class="infoCursoTitulo">Tipo</td>
									<td class="infoCursoResposta"><?php echo $tipo; ?></td>
								</tr>
								<tr>
									<td class="infoCursoTitulo">Número de vagas</td>
									<td class="infoCursoResposta"><?php echo $vagas; ?> vagas</td>
								</tr>
								<tr>
									<td class="infoCursoTitulo">Turno de funcionamento</td>
									<td class="infoCursoResposta"><?php echo $turno; ?></td>
								</tr>
								<tr>
									<td class="infoCursoTitulo">Periodicidade da oferta</td>
									<td class="infoCursoResposta"><?php echo $periodicidade; ?></td>
								</tr>
								<tr>
									<td class="infoCursoTitulo">Carga horária</td>
									<td class="infoCursoResposta"><?php echo $carga; ?> horas</td>
								</tr>
								<tr>
									<td class="infoCursoTitulo">Forma de ingresso</td>
									<td class="infoCursoResposta"><?php echo $ingresso; ?></td>
								</tr>
							</table>
							</div>
			<!-- inscrições -->
							</div>
						</div>

<!-- entrada do print do corpo docente -->
<?php

// Use below code to show metabox values from anywhere
$id = get_the_ID();
$nomeCoo = get_post_meta( get_the_ID(), 'coordenacao_nome', true );
$titulacaoCoo = get_post_meta( get_the_ID(), 'coordenacao_titulacao', true );
$emailCoo = get_post_meta( get_the_ID(), 'coordenacao_email', true );
$lattesCoo = get_post_meta( get_the_ID(), 'coordenacao_lattes', true );
$feture_template = get_post_meta($id, 'single_repeter_group', true);
if(!empty($feture_template)) {
	?>
	<div id="secaoCD">
		<h3 id="docsLista" class="cardsDocentes">Corpo docente</h3>
		<div id="corpoDocente" class="displayNone">
					<div class="docente coordenador">
						<h4 class="docenteNome"><?php echo $nomeCoo; ?></h4>
						<p class="docenteTitulacao"><?php echo $titulacaoCoo; ?></p>
						<div class="docenteEmail"><a href="mailto:<?php echo $emailCoo; ?>"><?php echo $emailCoo;?></a></div>
						<div class="docenteLattes"><a href="<?php echo $lattesCoo; ?>" target="_blank">Currículo Lattes</a></div>
					</div>
				
				<?php  foreach ($feture_template as $item) { ?>
					<div class="docente">
						<h4 class="docenteNome"><?php echo $item['nome']; ?></h4>
						<p class="docenteTitulacao"><?php echo $item['titulacao']; ?></p>
						<div class="docenteEmail"><a href="mailto:<?php echo $item['email']; ?>"><?php echo $item['email']; ?></a></div>
						<div class="docenteLattes"><a href="<?php echo $item['lattes']; ?>" target="_blank">Currículo Lattes</a></div>
					</div>
				<?php } ?>
			
		</div>
	</div>
	<?php
}
?>
<!-- fim do print do corpo docente -->

						<?php if ( get_post_meta($post->ID, 'post_banner_img', true) ) : ?>
							
						
<!-- tabela documentos -->	<h3 id="docsLista">Lista de documentos</h3>			
			<?php
// Use below code to show metabox values from anywhere
	$id = get_the_ID();
	$banner_img = get_post_meta($id, 'post_banner_img', true);	
	$banner_img = explode(',', $banner_img);

	if(!empty($banner_img)) {

		?>
	<script>
function reverseTable() {
  var table = document.getElementById("tableDocumentos")
  var trContent = []
  for (var i = 0, row; row = table.rows[i]; i++) {
    trContent.push(row.innerHTML)
  }
  trContent.reverse()
  for (var i = 0, row; row = table.rows[i]; i++) {
    row.innerHTML = trContent[i]
  }
}
</script>
		<table id="tableDocumentos" width="100%" cellspacing="0" cellpadding="0">
		
		
			<tbody><script>reverseTable();</script>
				<?php  foreach ($banner_img as $attachment_id) {  ?>
					<tr>
						<td colspan="2" class="tituloDocumentos"><div class="docsBar">
						<span class="sufixodoc"></span>	
						<a id="linkDoc" target="_blank" href="<?php echo wp_get_attachment_url( $attachment_id );?>"><?php echo get_the_title( $attachment_id );?></a><div class="dataDocumentos"><?php echo get_the_date( 'd/m/Y \à\s H\hi', $attachment_id ); ?></div></div></td>
					</tr>
				<?php } ?>
			</tbody>
			
        <tr>
            <th>Título do arquivo</th>
            <th class="dataDocTitulo">Data de publicação</th>
        </tr>

		</table>
<script>reverseTable();</script>
<script>
(() => {
	const linkDoc = document.querySelectorAll('#linkDoc');
	const spanLink = document.querySelectorAll('.sufixodoc');
	for (let n = 0; n < linkDoc.length; n++) {
    	const hrefLink = linkDoc[n].href;
    	const splitHref = hrefLink.split('.');
    	const contagemSplit = Number(splitHref.length);
    	spanLink[n].innerText = hrefLink.split('.')[contagemSplit - 1].toUpperCase();
	}
})();
</script>
		<?php
	}
?>
<!-- fim tabela documentos -->	
		<?php endif; ?>

				<?php }
					} 
					?>
				<!-- FIM DA NOTICIA -->
			</div>
			
		</div>
	</div>
</div> <!-- FIM DA DIV TUDO -->	
<?php get_footer(); ?>