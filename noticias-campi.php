<?php
function obterInformacoesRSS($url)
{
    $XML = simplexml_load_file($url);
    if (count($XML->channel->item) < 1) {
        return "Problemas com o site da unidade";
    }
    $informacoes = [];
    $contador = 0;
    foreach ($XML->channel->item as $item) {
        if ($contador >= 3) {
            break;
        }
        $informacao = [
            'link' => (string) $item->link,
            'title' => (string) $item->title,
        ];
        $informacoes[] = $informacao;
        $contador++;
    }
    return $informacoes;
}
function exibirNoticias($informacoes, $campusNome, $nomeURL)
{
    echo "<div class='box-noticias-campus' id='noticia-{$nomeURL}' style='display: none;'>";
    echo "<div id='ultimasUnidadesTitulo'>Notícias do Instituto Federal Baiano - Campus <span class='notranslate'>{$campusNome}</span></div>";
    echo "<div id='ultimasUnidadesConteudo'>";
    foreach ($informacoes as $informacao) {
        echo "<div class='ultimasUnidadesNoticia'>";
        echo "<a href='{$informacao['link']}' target='_blank'>";
        echo "{$informacao['title']}<br>";
        echo "</a></div>";
    }
    echo "<div class='site-do-campus'><a href='http://www.ifbaiano.edu.br/unidades/{$campusNome}/'>Ir para o site do campus</a></div>";
    echo "</div></div>";
}
function exibirBotoes($campusNome, $index, $nomeURL)
{
    echo "<button class='ver-mais-btn' data-index='{$index}' data-campus='{$nomeURL}'>{$campusNome}</button>";
}

$campusNomes = [
    'Alagoinhas',
    'Bom Jesus da Lapa',
    'Catu',
    'Governador Mangabeira',
    'Guanambi',
    'Itaberaba',
    'Itapetinga',
    'Santa Inês',
    'Senhor do Bonfim',
    'Serrinha',
    'Teixeira de Freitas',
    'Uruçuca',
    'Valença',
    'Xique-Xique'
];

$campusNomesURL = [
    'alagoinhas',
    'lapa',
    'catu',
    'gmb',
    'guanambi',
    'itaberaba',
    'itapetinga',
    'santaines',
    'bonfim',
    'serrinha',
    'teixeira',
    'urucuca',
    'valenca',
    'xique-xique'
];

echo "<div class='noticias-campi'><div class='tituloSecao'>Notícias por campus</div><div class='botoes-container'>";
for ($i = 0; $i < count($campusNomes); $i++) {
    $nomeCampus = $campusNomes[$i];
    $nomeURL = $campusNomesURL[$i];
    exibirBotoes($nomeCampus, $i, $nomeURL);
}
echo "</div>";

echo "<div class='noticias-container'>";
for ($i = 0; $i < count($campusNomes); $i++) {
    $nomeCampus = $campusNomes[$i];
    $nomeURL = $campusNomesURL[$i];
    $urlRSS = "https://www.ifbaiano.edu.br/unidades/{$nomeURL}/feed/";
    $informacoes = obterInformacoesRSS($urlRSS);
    exibirNoticias($informacoes, $nomeCampus, $nomeURL);
}
echo "</div></div>";
?>

<script src='https://code.jquery.com/jquery-3.6.4.min.js'></script>
<script>
    $(document).ready(function () {
        $('.ver-mais-btn').on('click', function () {
            const index = $(this).data('index');
            const campusNome = $(this).data('campus');
            const noticiaDiv = $('#noticia-' + campusNome);

            if (noticiaDiv.is(':visible')) {
                noticiaDiv.slideUp();
            } else {
                $('.box-noticias-campus').slideUp();
                noticiaDiv.slideDown();
            }
        });
    });
</script>