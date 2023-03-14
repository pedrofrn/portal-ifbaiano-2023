<div class="tituloSecao">
    Últimas notícias
</div>
<div id="Noticias">
    <div id="NoticiasConteudo">
        <div class='container'>
            <div class="ism-slider" data-transition_type="fade" data-play_type="loop" data-image_fx="zoomrotate"
                id="my-slider">
                <ol>
                    <?php
                    $destaque = get_posts(
                        array(
                            'posts_per_page' => 5,
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
                                        // mostra a imagem destacada
                                        the_post_thumbnail();
                                    } else {
                                        // mostra outra coisa (imagem, texto, etc.)
                                        echo '<img src="' . get_bloginfo('stylesheet_directory')
                                            . '/imagens/thumb-noticia.jpg" />';
                                    }
                                    ?>
                                    <div class="ism-caption ism-caption-0">
                                        <?php the_time('d/m/Y \à\s H\hi'); ?>
                                    </div>

                                </div>
                                <div id="titulonoticiadestaque">
                                    <h1><?php the_title(); ?></h1>
                                </div>
                                </a>
                        </li>

                    <?php } ?>
                </ol>
            </div>
        </div>


    </div>
    <div class="boxSidebarMais">
        <a href="<?php echo get_option('home'); ?>/page_fullinfos" alt="Todos os editais">Veja mais notícias<img
                src="<?php bloginfo('template_url'); ?>/imagens/icone-link-externo.png"
                style="width: 14px;margin-left: 5px;vertical-align: bottom;"></a>
    </div>
</div>