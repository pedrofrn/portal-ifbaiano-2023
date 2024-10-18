<div id="containerMeioEsquerda">
	<div id="marcaCampus"></div>
	<?php include 'menu.php'; ?>
	<?php include 'banner-lateral.php'; ?>
	<a href="#" class="btnEditais" title="Editais do IF Baiano" alt="Acesse os Editais do IF Baiano">
		<div class="btnEditais">
			Editais<br>
			<div class="btnCentralEditais">Central de Seleção</div>
		</div>
	</a>
	<?php include 'informes.php'; ?>
	<?php if (!is_active_sidebar('eventos')): ?>
		<?php if (is_active_sidebar('agendareitor')): ?>
			<div class="agendaReitor">
				<?php dynamic_sidebar('agendareitor'); ?>
		<div id="marcaCampus"></div>
		<?php include 'menu.php'; ?>
		<?php include 'banner-lateral.php'; ?>
		<a href="<?php echo get_permalink(get_page_by_title('Concursos e Seleções')); ?>" class="btnEditais" title="Editais do IF Baiano" alt="Acesse os Editais do IF Baiano">
			<div class="btnEditais">
				Editais<br>
				<div class="btnCentralEditais">Central de Seleção</div>
			</div>
		<?php endif; ?>
	<?php endif; ?>
</div>