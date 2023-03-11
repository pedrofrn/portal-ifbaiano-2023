<!DOCTYPE html>
<html lang="pt-BR">

<head>
	<meta name="robots" content="index,follow">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="description"
		content="O IF Baiano - <?php bloginfo('name'); ?> é uma instituição pública de Ensino Médio e Superior, focado na Educação Profissional e Tecnológica.">
	<meta name="author" content="Diretoria de Comunicação do Instituto Federal Baiano" />
	<meta name="keywords"
		content="ifbaiano, campus if baiano, site, institucional, tecnico, integrado, subsequente, fic, ensino, pesquisa, extensão, cursos">

	<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/imagens/favicon.ico">
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed"
		href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="preconnect" href="https://barra.brasil.gov.br">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/my-slider.css" />
	<script src="<?php bloginfo('template_url'); ?>/js/ism-2.2.min.js"></script>

	<!-- JAVASCRIPT -->
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/styleswitcher.js"></script>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>
	<script type="text/javascript" src="https://code.jquery.com/jquery-migrate-3.3.2.min.js"></script>
	<!-- CSS -->
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" title="default" media="screen" />
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/contrastePreto.css" type="text/css"
		title="contrastePreto" media="screen" />

	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'>

	<title>
		<?php bloginfo('name'); ?>
		<?php wp_title(); ?>
	</title>
	<link rel="canonical" href="<?php echo bloginfo('home'); ?>" />
	<meta property="og:locale" content="pt_BR" />
	<meta property="og:type" content="website" />
	<meta property="og:title" content="IF Baiano - Instituto Federal Baiano" />
	<meta property="og:description"
		content="Página inicial do Instituto Federal Baiano - <?php bloginfo('name'); ?>. Compartilhar conteúdo: Facebook Twitter LinkedIn Pinterest WhatsApp" />
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
	</script>
	<?php wp_head(); ?>
</head>

<body>
	<div id="barra-brasil" style="background:#7F7F7F; height: 20px; padding:0 0 0 10px;display:block;">
		<ul id="menu-barra-temp" style="list-style:none;">
			<li
				style="display:inline; float:left;padding-right:10px; margin-right:10px; border-right:1px solid #EDEDED">
				<a href="http://brasil.gov.br"
					style="font-family:sans,sans-serif; text-decoration:none; color:white;">Portal do Governo
					Brasileiro</a></li>
			<li><a style="font-family:sans,sans-serif; text-decoration:none; color:white;"
					href="http://epwg.governoeletronico.gov.br/barra/atualize.html">Atualize sua Barra de Governo</a>
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
					<a href="<?php echo get_option('home'); ?>/Acessibilidade">ACESSIBILIDADE</a>
					<a href="#" onclick="setActiveStyleSheet('contrastePreto'); return false;">CONTRASTE</a>
					<a href="<?php echo get_option('home'); ?>/mapa-do-site">MAPA DO SITE</a>
				</div>
			</div>

			<div id="CentroHeader">
				<div id="CentroHeaderEsquerda">
					<div id="CentroHeaderEsquerdaTopo">
						<span style="font-size: small;color: #76f39c;">Instituto Federal de Educação, Ciência e
							Tecnologia Baiano</span>
					</div>
					<div id="CentroHeaderEsquerdaMeio">
						<a href="<?php echo bloginfo('home'); ?>">
							Instituto Federal Baiano
						</a>
					</div>
					<div id="CentroHeaderEsquerdaBaixo"></div>
				</div>
				<div id="CentroHeaderDireita">
					<div id="Busca">
						<?php get_search_form(); ?>
					</div>
					<div id="RedesSociais">
						<div id="redeSocialInstagram">
							<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Rede Social Instagram')): ?>

							<?php endif; ?>
						</div>
						<div id="redeSocialYoutube">
							<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Rede Social Youtube')): ?>

							<?php endif; ?>
						</div>
						<div id="redeSocialTwitter">
							<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Rede Social Twitter')): ?>

							<?php endif; ?>
						</div>
						<div id="redeSocialFacebook">
							<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Rede Social Facebook')): ?>

							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div id="BarraInferiorHead">
			<div id="BarraInferiorHeadInterno">
				<div class="irPortal"><a title="Portal do IF Baiano" href="https://www.ifbaiano.edu.br/portal/">Ir para
						o <span style="color:#8dbd8e;">Portal do IF Baiano</span><img
							src="<?php bloginfo('template_url'); ?>/imagens/icone-link-externo.png"
							style="width: 18px;position: absolute;margin-left: 5px;"></a>
				</div>

				<div class="menuBarraInferiorHead">
					<?php if (is_active_sidebar('menutopodireito')): ?>
						<?php dynamic_sidebar('menutopodireito'); ?>
					<?php else: ?>
						<div class="textwidget"><a style="color:#76f39c"
								href="https://ifbaiano.edu.br/portal/acesso-a-informacao/">Acesso à Informação</a> <span
								style="color:#9ec7a7"> | </span><span class="coronavirus"><a
									href="https://ifbaiano.edu.br/portal/coronavirus/" target="_blank"
									style="font-weight:bold;color:#ffb6f6" rel="noopener">Prevenção ao coronavírus</a> <span
									style="color:#76f39c"> | </span></span><a style="color:#76f39c"
								href="https://ifbaiano.edu.br/portal/pdi/">PDI</a> <span style="color:#9ec7a7"> | </span> <a
								style="color:#76f39c" href="https://ifbaiano.edu.br/portal/ouvidoria/">Ouvidoria</a> <span
								style="color:#9ec7a7"> | </span><a style="color:#76f39c"
								href="https://ifbaiano.edu.br/portal/acesso-a-informacao/licitacoes-e-contratos/">Licitações
								e Contratos</a></div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>

	<div id="coronavirus">
		<h2>Combate ao Coronavírus <a href="https://ifbaiano.edu.br/portal/coronavirus/" target="_blank">ACESSE AQUI</a>
		</h2>
	</div>
	<div id="tudo">