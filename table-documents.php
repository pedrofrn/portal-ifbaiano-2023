<?php if (get_post_meta($post->ID, 'post_doc_upload', true)): ?>

    <!-- tabela documentos -->
    <h3 id="docsLista">Lista de documentos</h3>
    <?php

    $id = get_the_ID();
    $doc_upload = get_post_meta($id, 'post_doc_upload', true);
    $doc_upload = explode(',', $doc_upload);

    if (!empty($doc_upload)) {

        ?>
        <script>
            function reverseTable() {
                var table = document.getElementById("tableDocumentos")
                var trContent = []
                for (var i = 0, row; row = table.rows[i]; i++) {
                    trContent.push(row.innerHTML)
                }
                trContent.reverse()
                for (var i = 0, row; row = table.rows[i]; i++) {
                    row.innerHTML = trContent[i]
                }
            }
        </script>
        <table id="tableDocumentos" width="100%" cellspacing="0" cellpadding="0">


            <tbody>
                <script>reverseTable();</script>
                <?php foreach ($doc_upload as $attachment_id) { ?>
                    <tr>
                        <td colspan="2" class="tituloDocumentos">
                            <div class="docsBar">
                                <span class="sufixodoc"></span>
                                <a id="linkDoc" target="_blank" href="<?php echo wp_get_attachment_url($attachment_id); ?>">
                                    <?php echo get_the_title($attachment_id); ?>
                                </a>
                                <div class="dataDocumentos">
                                    <?php echo get_the_date('d/m/Y \à\s H\hi', $attachment_id); ?>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>

            <tr>
                <th>Título do arquivo</th>
                <th class="dataDocTitulo">Data de publicação</th>
            </tr>

        </table>
        <script>reverseTable();</script>
        <script>
            (() => {
                const linkDoc = document.querySelectorAll('#linkDoc');
                const spanLink = document.querySelectorAll('.sufixodoc');
                for (let n = 0; n < linkDoc.length; n++) {
                    const hrefLink = linkDoc[n].href;
                    const splitHref = hrefLink.split('.');
                    const contagemSplit = Number(splitHref.length);
                    spanLink[n].innerText = hrefLink.split('.')[contagemSplit - 1].toUpperCase();
                }
            })();
        </script>
        <?php
    }
    ?>
    <!-- fim tabela documentos -->
<?php endif; ?>