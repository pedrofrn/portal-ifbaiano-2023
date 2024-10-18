<?php
if (is_active_sidebar('cursos')) {
?>
    <div class='coluna-cursos'>
        <div class="tituloSecao">
            Encontre seu curso
        </div>
        <?php dynamic_sidebar('cursos'); ?>
        <script>
            const labelsCursos = document.querySelectorAll('div.coluna-cursos p');
            const tonsDeVerde = ['#62b688', '#48A9A6', '#379683', '#206A5D', '#173E3F', '#0E1C14'];


            labelsCursos.forEach((element, index) => {
                const corDeFundo = tonsDeVerde[index % tonsDeVerde.length];
                const preLink = element.querySelector('a');
                const fragment = document.createDocumentFragment();
                while (preLink.firstChild) {
                    fragment.appendChild(preLink.firstChild);
                }
                preLink.parentNode.replaceChild(fragment, preLink);
                const link = document.createElement('a');
                link.href = preLink.href;
                link.title = element.innerText;
                link.alt = element.innerText;
                element.style.backgroundColor = corDeFundo;

                const termo = element.querySelector('strong');
                if (termo) termo.classList.add('cursoDestaque');

                if (!element.closest('a')) {
                    element.parentNode.replaceChild(link, element);
                    link.appendChild(element);
                }
                if (termo && element.innerText !== termo.innerText) element.insertBefore(document.createElement('br'), termo);
            });
        </script>
    </div>
<?php
}
?>