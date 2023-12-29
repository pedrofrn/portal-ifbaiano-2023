<?php $blogName = strtolower(get_bloginfo('name'));
if (strpos($blogName, "campus") === 0) { ?>
    <div id="mapaCampus"></div>
<?php } else { ?>
    <div class="secaoMapa">
        <div class="tituloSecao">
            Nossas Unidades
        </div>
        <div id="mapa">
            <div style="display:grid">
                <img src="<?php bloginfo('template_url'); ?>/imagens/mapa-bahia-500x500px.svg" alt="Mapa da Bahia" />
                <canvas id="canvasMapa"></canvas>
            </div>
            <div class="legendaMapa">
                <ul>
                    <li>Alagoinhas</li>
                    <li>Bom Jesus da Lapa</li>
                    <li>Catu</li>
                    <li>Governador Mangabeira</li>
                    <li>Guanambi</li>
                    <li>Itaberaba</li>
                    <li>Itapetinga</li>
                    <li>Santa Inês</li>
                    <li>Senhor do Bonfim</li>
                    <li>Serrinha</li>
                    <li>Teixeira de Freitas</li>
                    <li>Uruçuca</li>
                    <li>Valença</li>
                    <li>Xique-Xique</li>
                </ul>
            </div>
        </div>
    </div>
<?php
}
?>