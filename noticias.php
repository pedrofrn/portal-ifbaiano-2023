<div id="Noticias">
    <div class="tituloSecao">
        Acontece no <?php bloginfo('name'); ?>
    </div>
    <div id="NoticiasConteudo">
        <div class='container'>
            <div class="slideshow-noticia">
                <div class="ism-slider" data-transition_type="slide" data-buttons="false" data-play_type="loop" data-image_fx="zoomrotate" id="my-slider">
                    <ol>
                        <?php
                        $destaque = get_posts(
                            array(
                                'posts_per_page' => 3,
                                'category_name' => 'slideshow'
                            )
                        );
                        foreach ($destaque as $post) {
                            setup_postdata($post);
                        ?>
                            <li>
                                <a href="<?php the_permalink(); ?>">
                                    <div class="imagemnoticiadestaque">
                                        <?php
                                        if (has_post_thumbnail()) {
                                            the_post_thumbnail();
                                        } else {
                                            echo '<img src="' . get_bloginfo('stylesheet_directory') . '/imagens/thumb-noticia.jpg" />';
                                        }
                                        ?>
                                        <div class="ism-caption ism-caption-0">
                                            <?php the_time('d/m/Y \à\s H\hi'); ?>
                                        </div>
                                    </div>
                                    <div id="titulonoticiadestaque">
                                        <h1>
                                            <?php the_title(); ?>
                                        </h1>
                                    </div>
                                </a>
                            </li>
                        <?php } ?>
                    </ol>
                </div>
            </div>

            <div class="coluna-noticia-recente">
                <?php
                $args_noticias_recentes = array(
                    'posts_per_page' => 3,
                    'category__not_in' => array(get_cat_ID('slideshow'), get_cat_ID('informes')),
                );
                $noticias_recentes = get_posts($args_noticias_recentes);

                foreach ($noticias_recentes as $post) {
                    setup_postdata($post);
                    $tags = get_the_tags();
                    $tag_default = (object) array('name' => 'Notícia');
                    $first_tag = $tags ? reset($tags) : $tag_default;
                ?>
                    <div class="noticia-recente">
                        <?php
                        if ($first_tag && is_object($first_tag) && property_exists($first_tag, 'slug')) {
                            $tag_url = get_tag_link($first_tag);
                            echo '<a href="' . esc_url($tag_url) . '"><span class="tag-noticia-recente">' . esc_html($first_tag->name) . '</span></a>';
                        } elseif (is_string($first_tag)) {
                            echo '<span class="tag-noticia-recente">' . esc_html($first_tag) . '</span>';
                        } else {
                            echo '<span class="tag-noticia-recente">' . esc_html($tag_default->name) . '</span>';
                        }
                        ?>
                        <a href="<?php the_permalink(); ?>">
                            <h2>
                                <?php the_title(); ?>
                            </h2>
                        </a>
                    </div>
                <?php
                }

                wp_reset_postdata();
                ?>
                <div class="maisNoticias"><a href="<?php echo get_permalink(get_page_by_title('Todas as Notícias')); ?>" alt="Todas as notícias"><span class="maisNoticias"> + notícias</span></a></div>
            </div>
        </div>
        <?php //include 'noticias-campi.php'; 
        ?>

        <?php
        $args_destaque = array(
            'posts_per_page' => 4,
            'category_name'  => 'destaque',
            'category__not_in' => array(get_cat_ID('slideshow'), get_cat_ID('informes')),
        );

        $destaque_posts = get_posts($args_destaque);

        if ($destaque_posts) :
        ?>
            <div class="destaque-section scrollAnimation">
                <div class="tituloSecao">
                    Destaques
                </div>
                <div class="destaque-container">
                    <?php
                    foreach ($destaque_posts as $post) {
                        setup_postdata($post);
                        $tags = get_the_tags();
                        $tag_default = (object) array('name' => 'Notícia');
                        $first_tag = $tags ? reset($tags) : $tag_default;
                    ?>
                        <div class="destaque-item">
                            <?php
                            if ($first_tag && is_object($first_tag) && property_exists($first_tag, 'slug')) {
                                $tag_url = get_tag_link($first_tag);
                                echo '<a href="' . esc_url($tag_url) . '"><span class="destaque-tag">' . esc_html($first_tag->name) . '</span></a>';
                            } elseif (is_string($first_tag)) {
                                echo '<span class="destaque-tag">' . esc_html($first_tag) . '</span>';
                            } else {
                                echo '<span class="destaque-tag">' . esc_html($tag_default->name) . '</span>';
                            }
                            ?>
                            <a href="<?php the_permalink(); ?>">
                                <div class="destaque-imagem">
                                    <?php
                                    if (has_post_thumbnail()) {
                                        the_post_thumbnail('thumbnail');
                                    } else {
                                        echo '<img src="' . get_bloginfo('stylesheet_directory') . '/imagens/thumb-noticia.jpg" />';
                                    }
                                    ?>
                                </div>
                                <div class="destaque-titulo">
                                    <h3><?php the_title(); ?></h3>
                                </div>
                            </a>
                        </div>
                    <?php
                    }

                    wp_reset_postdata();
                    ?>
                </div>

            </div>
        <?php endif; ?>
    </div>
</div>