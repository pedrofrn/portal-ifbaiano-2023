<?php if (is_active_sidebar('eventos')): ?>
    <div class="tituloSecao">
        Agenda e Eventos
    </div>
    <div class="agenda-eventos-agendaReitor scrollAnimation">
        <div id="eventosImportantes">
            <?php dynamic_sidebar('eventos'); ?>
        </div>
        <?php if (is_active_sidebar('agendareitor')): ?>
            <div class="agendaReitor">
                <?php dynamic_sidebar('agendareitor'); ?>
            </div>
        <?php endif; ?>
    </div>
<?php endif; ?>