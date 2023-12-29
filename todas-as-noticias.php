<?php
/*
 * Template Name: Todas as Notícias
 * Description: Uma página para exibir todas as notícias.
 */

get_header(); ?>
<div id="containerMeio">
    <div id="containerMeioEsquerda">
        <div id="marcaCampus"></div>
        <?php include 'menu.php'; ?>
    </div>
    <div id="containerMeioCentro">

        <div id="tituloNoticia">
            <?php the_title(); ?>
        </div>

        <div id="textoNoticia">
            <?php
            $args = array(
                'post_type'      => 'post',
                'posts_per_page' => 10,
                'orderby'        => 'date',
                'order'          => 'DESC',
                'paged'          => get_query_var('paged') ? get_query_var('paged') : 1, // Para a paginação
            );

            $query = new WP_Query($args);

            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post();
            ?>
                    <div class="noticia-lista">
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

                        <div class="noticia-lista-inner">
                            <?php
                            if (has_post_thumbnail()) :
                            ?>
                                <div class="noticia-lista-thumbnail">
                                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                        <?php the_post_thumbnail('thumbnail'); ?>
                                    </a>
                                </div>
                            <?php else : ?>
                                <div class="noticia-lista-thumbnail">
                                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                        <img src="<?php echo get_template_directory_uri() . '/imagens/thumb-noticia-2023.jpg'; ?>" alt="Imagem Padrão" />
                                    </a>
                                </div>
                            <?php endif; ?>


                            <div class="noticia-lista-resumo">
                                <div class="noticia-lista-data">
                                    <div class="imagem-data-publicacao"></div>
                                    <?php echo get_the_date('j \d\e F \d\e Y, \à\s G\hi'); ?>
                                </div>

                                <a href="<?php the_permalink(); ?>"><?php the_excerpt(); ?></a>
                            </div>
                        </div>
                    </div>
                <?php
                endwhile; ?>
                <div class="paginacao">
                    <?php
                    // Adiciona a paginação
                    $big = 999999999;
                    echo paginate_links(array(
                        'base'    => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                        'format'  => '?paged=%#%',
                        'current' => max(1, get_query_var('paged')),
                        'total'   => $query->max_num_pages,
                    ));
                    ?>
                </div>
            <?php
                wp_reset_postdata();
            else :
                echo '<p>Não há notícias disponíveis.</p>';
            endif;
            ?>
        </div>

    </div>
</div>

</div>

<?php get_footer(); ?>