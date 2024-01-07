<!DOCTYPE html>
<html lang="pt-BR">

<head>
	<meta name="robots" content="index,follow">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta property="creator.productor" content="http://estruturaorganizacional.dados.gov.br/id/unidade-organizacional/100920">
	<meta name="description" content="O IF Baiano - <?php bloginfo('name'); ?> é uma instituição pública de Ensino Médio e Superior, focado na Educação Profissional e Tecnológica.">
	<meta name="author" content="Diretoria de Comunicação do Instituto Federal Baiano" />
	<meta name="keywords" content="ifbaiano, ensino medio, escola, educacao, gratuito, publico, campus if baiano, site, institucional, tecnico, integrado, subsequente, fic, ensino, pesquisa, extensão, cursos">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,700;0,800;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">
	<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/imagens/favicon.ico">
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="preconnect" href="https://barra.brasil.gov.br">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/my-slider.css" />
	<script src="<?php bloginfo('template_url'); ?>/js/ism-2.2.min.js"></script>
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/contrastePreto.css" type="text/css" id="contrastePreto" media="screen" disabled />
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" title="default" id="estiloPadrao" media="screen" />
	<title>
		<?php bloginfo('name'); ?>
		<?php wp_title(); ?>
	</title>
	<link rel="canonical" href="<?php echo bloginfo('home'); ?>" />
	<meta property="og:locale" content="pt_BR" />
	<meta property="og:type" content="website" />
	<meta property="og:title" content="IF Baiano - Instituto Federal Baiano" />
	<meta property="og:description" content="Página inicial do Instituto Federal Baiano - <?php bloginfo('name'); ?>. Compartilhar conteúdo: Facebook Twitter LinkedIn Pinterest WhatsApp" />
	<meta property="og:url" content="<?php echo bloginfo('home'); ?>" />
	<meta property="og:site_name" content="Instituto Federal Baiano" />
	<meta property="article:publisher" content="https://www.facebook.com/IFBaiano.Oficial/" />
	<meta property="og:image" content="<?php bloginfo('template_url'); ?>/imagens/logo_vertical.png" />
	<meta property="og:image:width" content="768" />
	<meta property="og:image:height" content="1080" />
	<meta name="twitter:card" content="summary_large_image" />
	<meta name="twitter:site" content="@ifbaianooficial" />
	<script type="text/javascript">
		const templateUrl = '<?php bloginfo('template_url'); ?>';
		document.addEventListener("DOMContentLoaded", function() {
			const loadingOverlay = document.getElementById("loadingOverlay");
			loadingOverlay.style.width = screen.width;
			loadingOverlay.style.height = screen.height;
			window.addEventListener("load", function() {
				loadingOverlay.style.opacity = 0;
				setTimeout(function() {
					loadingOverlay.remove();
				}, 500);
			});
		});
	</script>
	<?php wp_head(); ?>
	<style>
		#barra-brasil .conteudo-barra-brasil {
			max-width: 960px !important;
		}
	</style>
</head>

<body>
	<script>
		function toggleStyleSheet() {
			const estiloPadrao = document.getElementById('estiloPadrao');
			const contrastePreto = document.getElementById('contrastePreto');
			let styleChosen = localStorage.getItem('style') || 'padrao';
			if (styleChosen === 'padrao') {
				estiloPadrao.disabled = true;
				contrastePreto.disabled = false;
				styleChosen = 'contraste';
			} else {
				estiloPadrao.disabled = false;
				contrastePreto.disabled = true;
				styleChosen = 'padrao';
			}
			localStorage.setItem('style', styleChosen);
		}
		
		document.addEventListener('DOMContentLoaded', function() {
			const estiloPadrao = document.getElementById('estiloPadrao');
			const contrastePreto = document.getElementById('contrastePreto');
			let styleChosen = localStorage.getItem('style') || 'padrao';
			if (styleChosen === 'padrao') {
				estiloPadrao.disabled = false;
				contrastePreto.disabled = true;
			} else {
				estiloPadrao.disabled = true;
				contrastePreto.disabled = false;
			}
		});
	</script>
	<div class="loading-overlay" id="loadingOverlay">
		<div id="marcaInstituto">
		</div>
		<div class="loading-dots">
			<div class="loading-dot"></div>
			<div class="loading-dot"></div>
			<div class="loading-dot"></div>
		</div>

	</div>
	<div id="barra-brasil" style="background:#7F7F7F; height: 20px; padding:0 0 0 10px;display:block;">
		<ul id="menu-barra-temp" style="list-style:none;">
			<li style="display:inline; float:left;padding-right:10px; margin-right:10px; border-right:1px solid #EDEDED">
				<a href="http://brasil.gov.br" style="font-family:sans,sans-serif; text-decoration:none; color:white;">Portal do Governo
					Brasileiro</a>
			</li>
			<li><a style="font-family:sans,sans-serif; text-decoration:none; color:white;" href="http://epwg.governoeletronico.gov.br/barra/atualize.html">Atualize sua Barra de Governo</a>
			</li>
		</ul>
	</div>

	<div id="containerCabecalho">
		<div id="containerCabecalhoInterno">
			<div id="BarraSuperiorHeader">
				<div id="Navegacao">
					<?php include(TEMPLATEPATH . '/barra_navegacao.php'); ?>
				</div>
				<div id="Acessibilidade">
					<!-- <a href="<?php echo get_option('home'); ?>/acessibilidade">ACESSIBILIDADE</a> -->
					<a href="#" onclick="toggleStyleSheet(); return false;">CONTRASTE</a>
				</div>
			</div>

			<div id="CentroHeader">
				<div id="CentroHeaderEsquerda">
					<a href="<?php echo bloginfo('home'); ?>">
						<div id="CentroHeaderEsquerdaTopo">
							<span>Instituto Federal de Educação, Ciência e Tecnologia Baiano</span>
						</div>
					</a>
					<div id="CentroHeaderEsquerdaMeio">
						<a class="nomeUnidade" href="<?php echo bloginfo('home'); ?>">
							<?php bloginfo('name'); ?>
						</a>
					</div>
					<div id="CentroHeaderEsquerdaBaixo"><span style="text-transform:uppercase;">Ministério da
							Educação</span></div>
				</div>
				<div id="CentroHeaderDireita">
					<div id="Busca">
						<?php get_search_form(); ?>
					</div>
					<div id="RedesSociais">
						<?php
						$link_instagram = get_option('campo_instagram');
						$link_facebook = get_option('campo_facebook');
						$link_youtube = get_option('campo_youtube');

						if (!empty($link_instagram)) :
						?>
							<div id="redeSocialInstagram">
								<a href="<?php echo esc_url($link_instagram); ?>" target="_blank" title="Instagram" alt="Acesse o Instagram">
									<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="25" height="25" viewBox="0 0 30 30">
										<path fill="#72d38f" d="M 9.9980469 3 C 6.1390469 3 3 6.1419531 3 10.001953 L 3 20.001953 C 3 23.860953 6.1419531 27 10.001953 27 L 20.001953 27 C 23.860953 27 27 23.858047 27 19.998047 L 27 9.9980469 C 27 6.1390469 23.858047 3 19.998047 3 L 9.9980469 3 z M 22 7 C 22.552 7 23 7.448 23 8 C 23 8.552 22.552 9 22 9 C 21.448 9 21 8.552 21 8 C 21 7.448 21.448 7 22 7 z M 15 9 C 18.309 9 21 11.691 21 15 C 21 18.309 18.309 21 15 21 C 11.691 21 9 18.309 9 15 C 9 11.691 11.691 9 15 9 z M 15 11 A 4 4 0 0 0 11 15 A 4 4 0 0 0 15 19 A 4 4 0 0 0 19 15 A 4 4 0 0 0 15 11 z">
										</path>
									</svg>
								</a>
							</div>
						<?php endif; ?>

						<?php if (!empty($link_facebook)) : ?>
							<div id="redeSocialFacebook">
								<a href="<?php echo esc_url($link_facebook); ?>" target="_blank" title="Facebook" alt="Acesse o Facebook">
									<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="25" height="25" viewBox="0 0 64 64">
										<path fill="#72d38f" d="M48,7H16c-4.418,0-8,3.582-8,8v32c0,4.418,3.582,8,8,8h17V38h-6v-7h6v-5c0-7,4-11,10-11c3.133,0,5,1,5,1v6h-4 c-2.86,0-4,2.093-4,4v5h7l-1,7h-6v17h8c4.418,0,8-3.582,8-8V15C56,10.582,52.418,7,48,7z">
										</path>
									</svg>
								</a>
							</div>
						<?php endif; ?>

						<?php if (!empty($link_youtube)) : ?>
							<div id="redeSocialYoutube">
								<a href="<?php echo esc_url($link_youtube); ?>" target="_blank" title="Youtube" alt="Acesse o Youtube">
									<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="25" height="25" viewBox="0 0 50 50">
										<path fill="#72d38f" d="M 44.898438 14.5 C 44.5 12.300781 42.601563 10.699219 40.398438 10.199219 C 37.101563 9.5 31 9 24.398438 9 C 17.800781 9 11.601563 9.5 8.300781 10.199219 C 6.101563 10.699219 4.199219 12.199219 3.800781 14.5 C 3.398438 17 3 20.5 3 25 C 3 29.5 3.398438 33 3.898438 35.5 C 4.300781 37.699219 6.199219 39.300781 8.398438 39.800781 C 11.898438 40.5 17.898438 41 24.5 41 C 31.101563 41 37.101563 40.5 40.601563 39.800781 C 42.800781 39.300781 44.699219 37.800781 45.101563 35.5 C 45.5 33 46 29.398438 46.101563 25 C 45.898438 20.5 45.398438 17 44.898438 14.5 Z M 19 32 L 19 18 L 31.199219 25 Z">
										</path>
									</svg>
								</a>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>

		<div id="BarraInferiorHead">
			<div id="BarraInferiorHeadInterno">
				<div class="irPortal">
					<a title="Portal do IF Baiano" href="https://www.ifbaiano.edu.br/portal/">Ir para
						o <span style="color:#8dbd8e;">Portal do IF Baiano</span><img src="<?php bloginfo('template_url'); ?>/imagens/icone-link-externo.png" style="width: 18px;position: absolute;margin-left: 5px;"></a>
				</div>

				<div class="menuBarraInferiorHead">
					<?php if (is_active_sidebar('menuheader')) : ?>
						<?php dynamic_sidebar('menuheader'); ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>

	<?php include 'menu-mobile.php'; ?>

	<div id="tudo">
		<div class="breadcrumb">
			<?php get_breadcrumb(); ?>
		</div>