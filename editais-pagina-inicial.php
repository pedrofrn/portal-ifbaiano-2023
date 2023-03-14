<div class="tituloSecao">
    Concursos e Seleções
</div>
<div id="boxSidebar">
    <div class="boxSidebarConteudo">
        <?php
        wp_reset_query();
        wp_reset_postdata();
        $argumentos = array(
            'category_name' => 'informes',
            'numberposts' => 5
        );

        $my_posts = get_posts($argumentos);

        if ($my_posts) {
            foreach ($my_posts as $post) {
                setup_postdata($post);
                foreach (get_the_category() as $cat) {
                    if (($cat->cat_name == 'Informes')) {
                        ?>
                        <div class="boxSidebarSingle">
                            <div class="boxSidebarSingleTitulo">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </div>
                        </div>
                        <?php
                    }
                }
            }
        } else {
            echo "<div style='padding-top:10px' id='boxSidebarSingle'><span>Sem editais cadastrados.</span></div>";
        } ?>
        <div class="boxSidebarMais">
            <a href="<?php echo get_option('home'); ?>/page_fullinfos" alt="Todos os editais">Veja mais editais<img
                    src="<?php bloginfo('template_url'); ?>/imagens/icone-link-externo.png"
                    style="width: 14px;margin-left: 5px;vertical-align: bottom;"></a>
        </div>
    </div>

</div>