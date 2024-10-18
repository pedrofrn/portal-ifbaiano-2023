<?php
function render_cronograma_bar($post_id)
{
    $cronograma = get_post_meta($post_id, 'cronograma', true);
    $cronograma_link = get_post_meta($post_id, 'cronograma_link', true); // Recupera o link do documento.

    if (empty($cronograma) || !is_array($cronograma))
        return;

    usort($cronograma, function ($a, $b) {
        return strtotime($a['data']) - strtotime($b['data']);
    });

    $today = date('Y-m-d');

    echo '<h2 class="headerSecao">Datas Importantes</h2>';


    echo '<div id="timeline-container">';
    echo '<div id="timeline" class="timeline">';

    foreach ($cronograma as $entrada) {
        $data_formatada = date('d/m/Y', strtotime($entrada['data']));
        $is_futura = strtotime($entrada['data']) >= strtotime($today);
        $item_class = $is_futura ? 'timeline-item' : 'timeline-item disabled';

        echo '<div class="' . $item_class . '" data-date="' . esc_attr($entrada['data']) . '">';
        echo '<p class="timeline-date">' . esc_html($data_formatada) . '</p>';
        echo '<p class="timeline-content">' . esc_html($entrada['texto']) . '</p>';
        echo '</div>';
    }

    echo '</div>';
    echo '</div>';
    // Verifica se o link do documento foi fornecido e o exibe
    if (!empty($cronograma_link)) {
        echo '<a class="cronograma-link" href="' . esc_url($cronograma_link) . '" target="_blank" rel="noopener noreferrer"><svg data-slot="icon" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z"></path></svg>Acesse O Cronograma Completo Aqui</a>';
    }
}

?>

<style>
    /* Container da timeline */
    #timeline-container {
        position: relative;
        padding: 20px;
        margin: 10px 0;
        overflow: hidden;
        max-width: 750px;
        box-sizing: border-box;
        background: #f9f9f9;
        border: 1px solid #ddd;
        border-radius: 5px;
        user-select: none;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
    }

    /* Timeline */
    #timeline {
        display: flex;
        gap: 20px;
        position: relative;
        width: max-content;
        box-sizing: border-box;
    }

    .timeline-item {
        position: relative;
        display: inline-block;
        padding: 10px 20px;
        border: 1px solid #ddd;
        border-radius: 5px;
        background: #fff;
        align-content: center;
        max-width: 200px;
        text-align: center;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        flex-shrink: 0;
        z-index: 1;
    }

    .timeline-item.disabled {
        background: #e0e0e0;
        border-color: #b0b0b0;
        color: #7d7d7d;
    }

    .timeline-item::before {
        content: '';
        position: absolute;
        left: -10px;
        top: 50%;
        transform: translateY(-50%);
        width: 14px;
        height: 14px;
        background: #44c767;
        border-radius: 50%;
        border: 3px solid #fff;
        z-index: 1;
    }

    .timeline-date {
        font-weight: bold;
        margin: 0;
    }

    .timeline-content {
        font-size: .8rem;
        margin: 5px 0 0 0;
    }

    #timeline::before {
        content: '';
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        left: 0;
        width: 100%;
        height: 2px;
        background: #44c767;
        z-index: 0;
    }

    a.cronograma-link {
        display: flex;
        align-items: center;
        gap: 5px;
        width: 100%;
        font-weight: bold !important;
        font-size: small;
        justify-content: end;
    }

    a.cronograma-link svg {
        width: 20px;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const timelineContainer = document.getElementById('timeline-container');
        const timeline = document.getElementById('timeline');
        let isDragging = false;
        let startX;
        let scrollLeft;

        // Detecta o início do arrasto
        timelineContainer.addEventListener('mousedown', (e) => {
            isDragging = true;
            startX = e.pageX - timelineContainer.offsetLeft;
            scrollLeft = timelineContainer.scrollLeft;
            timelineContainer.style.cursor = 'grabbing';
        });

        // Detecta o movimento do arrasto
        timelineContainer.addEventListener('mousemove', (e) => {
            if (!isDragging) return;
            e.preventDefault();
            const x = e.pageX - timelineContainer.offsetLeft;
            const walk = (x - startX) * 2; // Aumenta a velocidade do arrasto
            timelineContainer.scrollLeft = scrollLeft - walk;
        });

        // Detecta o fim do arrasto
        timelineContainer.addEventListener('mouseup', () => {
            isDragging = false;
            timelineContainer.style.cursor = 'grab';
        });

        // Adiciona o arrasto no toque para dispositivos móveis
        timelineContainer.addEventListener('touchstart', (e) => {
            isDragging = true;
            startX = e.touches[0].pageX - timelineContainer.offsetLeft;
            scrollLeft = timelineContainer.scrollLeft;
            timelineContainer.style.cursor = 'grabbing';
        });

        timelineContainer.addEventListener('touchmove', (e) => {
            if (!isDragging) return;
            e.preventDefault();
            const x = e.touches[0].pageX - timelineContainer.offsetLeft;
            const walk = (x - startX) * 2;
            timelineContainer.scrollLeft = scrollLeft - walk;
        });

        timelineContainer.addEventListener('touchend', () => {
            isDragging = false;
            timelineContainer.style.cursor = 'grab';
        });

        // Ajusta a rolagem para a entrada mais próxima
        const today = new Date().toISOString().split('T')[0];
        const timelineItems = document.querySelectorAll('#timeline .timeline-item');

        let closestItem = null;
        let closestDistance = Infinity;

        timelineItems.forEach(item => {
            const itemDate = item.getAttribute('data-date');
            const distance = new Date(itemDate) - new Date(today);

            if (distance >= 0 && distance < closestDistance) {
                closestDistance = distance;
                closestItem = item;
            }
        });

        if (closestItem) {
            // Ajusta o scroll horizontal da timeline para a entrada mais próxima
            const offsetLeft = closestItem.offsetLeft;
            timelineContainer.scrollLeft = offsetLeft - (timelineContainer.clientWidth / 2) + (closestItem.clientWidth / 2);
        }
    });
</script>