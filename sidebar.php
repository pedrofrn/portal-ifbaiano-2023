<a href="#iniciodomenu" id="iniciodomenu" accesskey="1" class="alt">In&iacute;cio do Menu</a>
<ul id="menu">
	<li><a class="Home" href="<?php echo get_option('home'); ?>">P&aacute;gina principal</a></li>
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Menu') ) : ?>
	<?php endif; ?>
</ul>
