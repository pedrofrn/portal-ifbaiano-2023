<?php if (is_active_sidebar('eventos')) : ?>
    <div class="tituloSecao">
        Agenda e Eventos
    </div>
    <div class="agenda-eventos-agendaReitor scrollAnimation">
        <div id="eventosImportantes">
            <?php dynamic_sidebar('eventos'); ?>
        </div>
        <div class="agendaReitor">
            <?php dynamic_sidebar('agendareitor'); ?>
        </div>
    </div>
<?php endif; ?>

<script>
    (() => {
        const agendaReitor = document.querySelector('.agendaReitor');
        if (agendaReitor) {
            const text = agendaReitor.querySelector('p');
            const preLink = text.querySelector('a');
            const destaque = text.querySelector('strong');
            const fragment = document.createDocumentFragment();
            while (preLink.firstChild) {
                fragment.appendChild(preLink.firstChild);
            }
            preLink.parentNode.replaceChild(fragment, preLink);
            const link = document.createElement('a');
            link.href = preLink.href;
            link.title = text.innerText;
            link.alt = text.innerText;

            destaque.classList.add('reitor');

            if (!agendaReitor.closest('a')) {
                text.parentNode.replaceChild(link, text);
                link.appendChild(text);
            }
            text.insertBefore(document.createElement('br'), destaque);            
        }
    })()
</script>