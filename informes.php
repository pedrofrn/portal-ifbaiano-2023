<div class="informesSecao">
    <div class="tituloSecao">
        Informes
    </div>
    <div id="boxSidebar">
        <div class="boxSidebarConteudo">
            <?php
            wp_reset_query();
            wp_reset_postdata();
            $argumentos = array(
                'category_name' => 'informes',
                'numberposts' => 3
            );

            $my_posts = get_posts($argumentos);

            if ($my_posts) {
                foreach ($my_posts as $post) {
                    setup_postdata($post);
                    foreach (get_the_category() as $cat) {
                        if (($cat->cat_name == 'Informes')) {
            ?>
                            <div class="boxSidebarSingle">
                                <div class="imagem-data-publicacao"></div>
                                <div class="dataInforme"><?php echo get_the_date('d/m/Y \à\s H\hi'); ?></div>
                                <div class="boxSidebarSingleTitulo">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </div>
                            </div>
            <?php
                        }
                    }
                }
            } else {
                echo "<div style='padding-top:10px' id='boxSidebarSingle'><span>Sem informes.</span></div>";
            } ?>
            <div class="maisNoticias"><a href="<?php echo get_permalink(get_page_by_title('Todos os Informes')); ?>" alt="Todos os informes"><span class="maisNoticias"> + informes</span></a></div>
            <?php wp_reset_postdata(); ?>
        </div>
    </div>
</div>