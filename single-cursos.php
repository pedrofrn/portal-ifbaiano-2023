<?php get_header(); ?>
<div id="containerMeio">
	<?php include 'coluna-menu.php'; ?>
	<div id="containerMeioCentroNoticia">
		<div id="containerNoticiapost">
			<?php
			if (have_posts()) {
				while (have_posts()) {
					the_post();
					?>
					<div id="head">
						<div id="imagemprocesso">
							<?php
							$definirUnidade = get_post_meta(get_the_ID(), 'definirUnidade', true);
							if (has_post_thumbnail()) { ?>
								<?php the_post_thumbnail(); ?>
							<?php } else {
							}
							?>
							<script>
								if (document.querySelector('div#imagemprocesso').getElementsByTagName('img').length === 0) {
									document.querySelector('div#head div#imagemprocesso').style.display = 'none';
								}
							</script>
						</div>
						<div id="nomeEdital">
							<?php if (!empty($definirUnidade)) { ?>
								<div class="unidadesHead">
									<?php
									foreach ($definirUnidade as $elemento) {
										echo '<div>' . $elemento . '</div>';
									}
									?>
								</div>
							<?php } ?>
							<span>
								<?php $tipo = get_post_meta(get_the_ID(), 'tipo_curso', true);
								echo $tipo; ?>
							</span>
							<h1 id="tituloNoticia">
								<?php the_title(); ?>
							</h1>
							<p>
								<?php
								if (has_excerpt()) { ?>
									<?php the_excerpt(); ?>
								<?php } else {
								}
								?>
							</p>
						</div>

					</div>

					<div id="editalContent">
						<div id="editalApresentacao">
							<h2 class="headerSecao">Apresentação</h2>
							<div id="textoNoticia">
								<?php the_content(); ?>

							</div>
						</div>
						<div id="editalInscricoes" style="flex:5;">
							<h2 class="headerSecao">Informações Gerais</h2>
							<!-- inscrições -->
							<div id="periodoInscricoes">
								<?php
								$denominacao = get_post_meta(get_the_ID(), 'denominacao_curso', true);
								$ato = get_post_meta(get_the_ID(), 'ato_autorizativo_curso', true);
								$area = get_post_meta(get_the_ID(), 'area_curso', true);
								$modalidade = get_post_meta(get_the_ID(), 'modalidade_curso', true);
								$vagas = get_post_meta(get_the_ID(), 'vagas_curso', true);
								$turno = get_post_meta(get_the_ID(), 'turno_curso', true);
								$periodicidade = get_post_meta(get_the_ID(), 'periodicidade_curso', true);
								$carga = get_post_meta(get_the_ID(), 'carga_curso', true);
								$ingresso = get_post_meta(get_the_ID(), 'ingresso_curso', true);
								?>
								<table id="infoCursoTabela">
									<tr>
										<td class="infoCursoTitulo">Denominação do curso</td>
										<td class="infoCursoResposta">
											<?php echo $denominacao; ?>
										</td>
									</tr>
									<tr>
										<td class="infoCursoTitulo">Ato Autorizativo</td>
										<td class="infoCursoResposta"><a href="<?php echo $ato; ?>" target="_blank">PPC do
												curso</a></td>
									</tr>
									<tr>
										<td class="infoCursoTitulo">Área do conhecimento (CAPES)</td>
										<td class="infoCursoResposta">
											<?php echo $area; ?>
										</td>
									</tr>
									<tr>
										<td class="infoCursoTitulo">Modalidade de ensino</td>
										<td class="infoCursoResposta">
											<?php echo $modalidade; ?>
										</td>
									</tr>
									<tr>
										<td class="infoCursoTitulo">Tipo</td>
										<td class="infoCursoResposta">
											<?php echo $tipo; ?>
										</td>
									</tr>
									<tr>
										<td class="infoCursoTitulo">Número de vagas</td>
										<td class="infoCursoResposta">
											<?php echo $vagas; ?> vagas
										</td>
									</tr>
									<tr>
										<td class="infoCursoTitulo">Turno de funcionamento</td>
										<td class="infoCursoResposta">
											<?php echo $turno; ?>
										</td>
									</tr>
									<tr>
										<td class="infoCursoTitulo">Periodicidade da oferta</td>
										<td class="infoCursoResposta">
											<?php echo $periodicidade; ?>
										</td>
									</tr>
									<tr>
										<td class="infoCursoTitulo">Carga horária</td>
										<td class="infoCursoResposta">
											<?php echo $carga; ?> horas
										</td>
									</tr>
									<tr>
										<td class="infoCursoTitulo">Forma de ingresso</td>
										<td class="infoCursoResposta">
											<?php echo $ingresso; ?>
										</td>
									</tr>
								</table>
							</div>
						</div>
					</div>

					<?php
					$id = get_the_ID();
					$nomeCoo = get_post_meta(get_the_ID(), 'coordenacao_nome', true);
					$titulacaoCoo = get_post_meta(get_the_ID(), 'coordenacao_titulacao', true);
					$emailCoo = get_post_meta(get_the_ID(), 'coordenacao_email', true);
					$lattesCoo = get_post_meta(get_the_ID(), 'coordenacao_lattes', true);
					$feture_template = get_post_meta($id, 'single_repeter_group', true);
					if (!empty($feture_template)) {
						?>
						<div id="secaoCD">
							<h2 class="headerSecao cardsDocentes">Corpo docente</h2>
							<div id="corpoDocente">
								<div class="docente coordenador">
									<h4 class="docenteNome">
										<?php echo $nomeCoo; ?>
									</h4>
									<p class="docenteTitulacao">
										<?php echo $titulacaoCoo; ?>
									</p>
									<div class="docenteEmail"><a href="mailto:<?php echo $emailCoo; ?>">
											<?php echo $emailCoo; ?>
										</a></div>
									<div class="docenteLattes"><a href="<?php echo $lattesCoo; ?>" target="_blank">Currículo
											Lattes</a></div>
								</div>

								<?php foreach ($feture_template as $item) { ?>
									<div class="docente">
										<h4 class="docenteNome">
											<?php echo $item['nome']; ?>
										</h4>
										<p class="docenteTitulacao">
											<?php echo $item['titulacao']; ?>
										</p>
										<div class="docenteEmail"><a href="mailto:<?php echo $item['email']; ?>">
												<?php echo $item['email']; ?>
											</a></div>
										<div class="docenteLattes"><a href="<?php echo $item['lattes']; ?>" target="_blank">Currículo
												Lattes</a></div>
									</div>
								<?php } ?>

							</div>
						</div>
						<?php
					}
					?>
					<?php include 'table-documents.php'; ?>

				<?php }
			}
			?>
			<!-- FIM DA NOTICIA -->
		</div>

	</div>
</div>
</div> <!-- FIM DA DIV TUDO -->
<?php get_footer(); ?>