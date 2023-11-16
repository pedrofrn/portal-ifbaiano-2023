<?php get_header(); ?>
<div id="containerMeio">
	<div id="containerMeioEsquerda">
		<div id="marcaCampus">
			<img src="<?php bloginfo('template_url'); ?>/imagens/marca-if-baiano.svg" alt="Marca do IF Baiano" />
		</div>
		<?php include 'menu.php'; ?>
	</div>

	<div id="containerMeioCentroNoticia">
		<div id="containerNoticiapost">
			<!-- INICIO DA NOTICIA -->
			<?php
			if (have_posts()) {
				while (have_posts()) {
					the_post();
					?>
					<div class="breadcrumb">
						<?php get_breadcrumb(); ?>
					</div>

					<div id="head">
						<div id="imagemprocesso">
							<?php
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
						<div>
							<div class="avisoInscricoes"></div>
							<div id="nomeEdital">
								<h2>
									<?php $nedital = get_post_meta(get_the_ID(), 'edital', true);
									echo $nedital; ?>
								</h2>
								<div id="tituloNoticia">
									<?php the_title(); ?>
								</div>
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

					</div>
					<div id="editalContent">
						<div id="editalApresentacao">
							<h3 id="docsLista">Apresentação</h3>
							<div id="textoNoticia">
								<?php the_content(); ?>

							</div>
						</div>
						<div id="editalInscricoes">
							<h3 id="docsLista">Inscrições</h3>
							<!-- inscrições -->
							<div id="periodoInscricoes">
								<div id="textoNoticia">
									<p class="dataInscricoes">
										<?php $dataini = get_post_meta(get_the_ID(), 'inicio_inscricoes', true);
										$datafim = date("d/m/Y", strtotime(get_post_meta(get_the_ID(), 'final_inscricoes', true)));
										$horaini = get_post_meta(get_the_ID(), 'inicio_hora_inscricoes', true);
										$horafim = get_post_meta(get_the_ID(), 'final_hora_inscricoes', true);
										$datainiecho = date("d/m/Y", strtotime($dataini));
										$horainiecho = date("H", strtotime($horaini));
										$horafimecho = date("H", strtotime($horafim));

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
										?>
									</p>
									<p class="textoInscricoes">
										<?php $tInscricoes = get_post_meta(get_the_ID(), 'txtInscricoes', true);
										if (!empty($tInscricoes)) {
											echo $tInscricoes;
										}
										?>
										</>
									</p>
									<?php $lEdital = get_post_meta(get_the_ID(), 'linkEdital', true);
									if (!empty($lEdital)) {
										echo '<a class="linkEdital" target="_blank" href="' . $lEdital . '">Inscreva-se aqui</a>';
									}
									?>
								</div>

								<script>
									(() => {
										if (document.querySelector('p.dataInscricoes').innerText !== '') {
											const avisoInscricoes = document.querySelector('div.avisoInscricoes');
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
											console.log(fimParseData, dataAtualParse);

											if (dataAtualParse >= inicioData + horaIni && dataAtualParse <= fimParseData) {
												avisoInscricoes.innerText = 'Inscrições abertas';
												avisoInscricoes.setAttribute('style', 'background: #44c767;color:#fff;text-transform: uppercase;font-weight: bold;font-size: 8pt;border-radius: 5px;padding: 4px 10px;');
											} else {
												avisoInscricoes.innerText = 'Fora do período de inscrições';
												avisoInscricoes.setAttribute('style', 'background: #afafaf;color:#fff;text-transform: uppercase;font-weight: bold;font-size: 8pt;border-radius: 5px;padding: 4px 10px;');
											}
										}
									})();
								</script>
							</div>
							<!-- inscrições -->
						</div>
					</div>
					<?php if (get_post_meta($post->ID, 'post_banner_img', true)): ?>


						<!-- tabela documentos -->
						<h3 id="docsLista">Lista de documentos</h3>
						<?php
						// Use below code to show metabox values from anywhere
						$id = get_the_ID();
						$banner_img = get_post_meta($id, 'post_banner_img', true);
						$banner_img = explode(',', $banner_img);

						if (!empty($banner_img)) {

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


								<tbody>
									<script>reverseTable();</script>
									<?php foreach ($banner_img as $attachment_id) { ?>
										<tr>
											<td colspan="2" class="tituloDocumentos">
												<div class="docsBar">
													<span class="sufixodoc"></span>
													<a id="linkDoc" target="_blank"
														href="<?php echo wp_get_attachment_url($attachment_id); ?>"><?php echo get_the_title($attachment_id); ?></a>
													<div class="dataDocumentos">
														<?php echo get_the_date('d/m/Y \à\s H\hi', $attachment_id); ?>
													</div>
												</div>
											</td>
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
										console.log(linkDoc[n]);
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