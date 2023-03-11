<!--<div onClick="return true" class="dropdownmenu">-->
<div id="MenuPrincipal">
	<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Menu Principal')): ?>

	<?php endif; ?>
</div>
<!--</div>-->

<!-- menu para mobile -->
<div class="containerMenu">
	<div class="phone">
		<div class="content">
			<nav role="navigation">
				<h3>Acesse o menu principal</h3>
				<div id="menuToggle">
					<input type="checkbox" />
					<span></span>
					<span></span>
					<span></span>

					<div id="menuResponsivo">
						<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Menu Principal')): ?>

						<?php endif; ?>
					</div>
				</div>
			</nav>
		</div>
	</div>
</div>
<!-- fim menu para mobile -->