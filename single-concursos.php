<?php get_header(); ?>
<div id="containerMeio">
	<?php include 'coluna-menu.php'; ?>
	<div id="containerMeioCentroNoticia">
		<div id="containerNoticiapost">
			<!-- INICIO DA NOTICIA -->
			<?php
			if (have_posts()) {
				while (have_posts()) {
					the_post();

					$data_lancamento = get_post_meta(get_the_ID(), 'data_lancamento', true);
					$dateTime = DateTime::createFromFormat('Y-m-d', $data_lancamento);
					$numero_edital = get_post_meta(get_the_ID(), 'numero_edital', true);
					if ($dateTime) {
						$meses_pt = array(
							'January' => 'janeiro',
							'February' => 'fevereiro',
							'March' => 'março',
							'April' => 'abril',
							'May' => 'maio',
							'June' => 'junho',
							'July' => 'julho',
							'August' => 'agosto',
							'September' => 'setembro',
							'October' => 'outubro',
							'November' => 'novembro',
							'December' => 'dezembro',
						);

						$mes = $meses_pt[$dateTime->format('F')];
						$data_formatada = $dateTime->format('d \d\e ') . $mes . $dateTime->format(' \d\e Y');
					}
					?>
					<div id="head">
						<?php
						$definirUnidade = get_post_meta(get_the_ID(), 'definirUnidade', true);
						if (has_post_thumbnail()) { ?>

							<div id="imagemprocesso">
								<?php the_post_thumbnail(); ?>
							</div>

						<?php } else {
						}
						?>
						<script>
							if (document.querySelector('div#imagemprocesso') && document.querySelector('div#imagemprocesso').getElementsByTagName('img').length === 0) {
								document.querySelector('div#head div#imagemprocesso').style.display = 'none';
							}
						</script>
						<div class="headText">
							<div class="avisoInscricoes"></div>
							<div id="nomeEdital">
								<?php if (!empty($definirUnidade)) { ?>
									<div class="unidadesHead">
										<?php
										foreach ($definirUnidade as $elemento) {
											echo '<div>' . $elemento . '</div>';
										}
										?>
									</div>
								<?php }
								if (!empty($numero_edital)) {
									?>
									<span>
										Edital nº<?php echo esc_html($numero_edital); ?>
										de <?php echo esc_html($data_formatada); ?>
									</span>
								<?php } ?>
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

					</div>
					<div id="editalContent">
						<div id="editalApresentacao">
							<h2 class="headerSecao">Apresentação</h2>
							<div id="textoNoticia">
								<?php the_content(); ?>
								<div style="display:flex;align-items:center;justify-content:end;font-weight:bold;">
									<?php
									// Obter os valores dos metaboxes.
									$passo_a_passo_url = get_post_meta(get_the_ID(), '_passo_a_passo_url', true);
									$passo_a_passo_rotulo = get_post_meta(get_the_ID(), '_passo_a_passo_rotulo', true);
									$contato = get_post_meta(get_the_ID(), '_contato', true);

									// Exibir o link "passo a passo" se estiver disponível.
									if (!empty($passo_a_passo_url) && !empty($passo_a_passo_rotulo)) {
										echo '<a href="' . esc_url($passo_a_passo_url) . '" style="display:flex;align-items:center;margin-right:15px;">';
										echo '<svg style="width:20px;margin-right:5px;" data-slot="icon" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">';
										echo '<path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z"></path>';
										echo '</svg>';
										echo esc_html($passo_a_passo_rotulo);
										echo '</a>';
									}

									// Verificar e exibir o contato como WhatsApp ou e-mail.
									if (!empty($contato)) {
										// Verificar se o contato é um número de telefone (WhatsApp).
										if (preg_match('/^\+?[0-9]{7,15}$/', $contato)) {
											$whatsapp_link = 'https://wa.me/' . preg_replace('/[^0-9]/', '', $contato); // Limpa o número e monta o link.
											echo '<a href="' . esc_url($whatsapp_link) . '" target="_blank" style="margin-left:5px;display:flex;align-items:center;">';
											echo '<svg style="width:20px;margin-right:5px;" data-slot="icon" fill="currentColor" stroke-width=".3" stroke="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">';
											echo '<path d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232"/></path>';
											echo '</svg>Converse pelo WhatsApp';
											echo '</a>';
										}
										// Verificar se o contato é um e-mail.
										elseif (filter_var($contato, FILTER_VALIDATE_EMAIL)) {
											echo '<a href="mailto:' . esc_attr($contato) . '" style="margin-left:5px;display:flex;align-items:center;">';
											echo '<svg style="width:20px;margin-right:5px;display:flex;align-items:center;" data-slot="icon" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">';
											echo '<path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75"></path>';
											echo '</svg>Converse por E-mail';
											echo '</a>';
										}
									}
									?>
								</div>

							</div>
						</div>
						<div id="editalInscricoes">
							<h2 class="headerSecao">Inscrições</h2>
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
											const btnLinkEdital = document.querySelector('a.linkEdital');
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

											if (dataAtualParse >= inicioData + horaIni && dataAtualParse <= fimParseData) {
												avisoInscricoes.innerText = 'Inscrições abertas';
												avisoInscricoes.setAttribute('style', 'background: #44c767;color:#fff;text-transform: uppercase;font-weight: 800;font-size: 8pt;border-radius: 5px;padding: 4px 10px;margin:0 0 5px -10px;');
											} else if (dataAtualParse < inicioData + horaIni) {
												avisoInscricoes.innerText = 'Inscrições em breve';
												avisoInscricoes.setAttribute('style', 'background: #ffc579;color:#000;text-transform: uppercase;font-weight: 800;font-size: 8pt;border-radius: 5px;padding: 4px 10px;margin-bottom:5px;');
												if (btnLinkEdital) btnLinkEdital.remove();
											} else {
												avisoInscricoes.innerText = 'Fora do período de inscrições';
												avisoInscricoes.setAttribute('style', 'background: #afafaf;color:#fff;text-transform: uppercase;font-weight: 800;font-size: 8pt;border-radius: 5px;padding: 4px 10px;margin-bottom:5px;');
												if (btnLinkEdital) btnLinkEdital.remove();
											}
										}
									})();
								</script>
							</div>
						</div>
					</div>

					<?php
					$perguntas_respostas = get_post_meta(get_the_ID(), '_perguntas_respostas', true);

					if (!empty($perguntas_respostas) || is_array($perguntas_respostas)) {
						echo '<div id="secaoCD" class="perguntas-respostas-container">';
						echo '<h2 style="cursor:pointer;" class="headerSecao perguntasEdital">Perguntas e Respostas</h2>';
						echo '<div class="perguntas-respostas-interna">';
						foreach ($perguntas_respostas as $item) {
							if (!empty($item['pergunta']) && !empty($item['resposta'])) {
								echo '<h3 class="pergunta">' . esc_html($item['pergunta']) . '</h3>';
								echo '<p class="resposta">' . esc_html($item['resposta']) . '</p>';
							}
						}
						echo '</div>';
						echo '</div>';
					}
					?>

					<?php include 'cronograma-concursos.php';
					render_cronograma_bar(get_the_ID());
					include 'table-documents.php'; ?>
				<?php }
			}
			?>
		</div>
	</div>
</div>
</div>
<?php get_footer(); ?>