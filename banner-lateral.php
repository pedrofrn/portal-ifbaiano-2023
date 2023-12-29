<?php if (is_active_sidebar('banner')) : ?>
    <div id="bannerLatSecao">
        <div class="tituloSecao">
            Mural
        </div>
        <div id="bannerLateral">
            <?php dynamic_sidebar('banner'); ?>
        </div>
    </div>
<?php endif; ?>