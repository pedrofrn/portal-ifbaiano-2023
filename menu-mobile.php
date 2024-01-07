<div class="containerMenu">
    <div class="phone">
        <div class="content">
            <nav role="navigation">
                <h3>Acesse o menu principal</h3>
                <div id="menuToggle">
                    <input type="checkbox" />
                    <span class="control"></span>
                    <span class="control"></span>
                    <span class="control"></span>

                    <div id="menuResponsivo">
                        <div id="MenuDestaque">
                            <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Menu Destaque')) : ?>
                            <?php endif; ?>
                        </div>
                        <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Menu Principal')) : ?>
                        <?php endif; ?>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
<script type='text/javascript' src='<?php bloginfo('template_url'); ?>/js/menu-responsivo.js'></script>