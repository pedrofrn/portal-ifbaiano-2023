<div id="Noticias">
    <div class="tituloSecao">
        Acontece no IF Baiano
    </div>
    <div id="NoticiasConteudo">
        <div class='container'>
            <div class="slideshow-noticia">
                <div class="ism-slider" data-transition_type="slide" data-buttons="false" data-play_type="loop"
                    data-image_fx="zoomrotate" id="my-slider">
                    <ol>
                        <?php
                        $destaque = get_posts(
                            array(
                                'posts_per_page' => 3,
                                'category_name' => 'destaque'
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
                    'category__not_in' => array(get_cat_ID('destaque')),
                );
                $noticias_recentes = get_posts($args_noticias_recentes);

                foreach ($noticias_recentes as $post) {
                    setup_postdata($post);
                    $tags = get_the_tags(); // Obtém todas as tags associadas ao post
                    $first_tag = $tags ? reset($tags) : null; // Obtém a primeira tag
                    ?>
                    <div class="noticia-recente">
                        <?php
                        if ($first_tag) {
                            echo '<span class="tag-noticia-recente">' . esc_html($first_tag->name) . '</span>';
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

                // Restaura as configurações globais do post
                wp_reset_postdata();
                ?>
            </div>
        </div>
        <?php include 'noticias-campi.php'; ?>
    </div>
</div>