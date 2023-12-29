<?php if (is_active_sidebar('cards')) : ?>
    <div id="cardsPublicos">
        <?php dynamic_sidebar('cards'); ?>
    </div>
    <script>
        const cards = document.querySelectorAll('#cardsPublicos .card');
        const limitCards = 4;
        if (cards.length > limitCards) {
            const cardsExc = Array.from(cards).slice(limitCards);
            cardsExc.forEach(card => {
                card.parentNode.removeChild(card);
            })
        }
        const coresBG = ['#61dd74', '#ff6b6b', '#80dae7', '#e5d84e'];
        const coresTxt = ['#274520', '#3d1818', '#0f3e41', '#45350f'];
        let contador = 0;
        cards.forEach(card => {
            const legenda = card.querySelector('figcaption');
            legenda.style.backgroundColor = coresBG[contador];
            legenda.style.color = coresTxt[contador]
            contador++
            if (card.querySelector('a')) {
                const linkHref = card.querySelector('a').href;
                const link = document.createElement('a');
                link.href = linkHref;
                const label = legenda.innerText[0] + legenda.innerText.slice(1).toLowerCase();
                link.title = label + ' no IF Baiano';
                link.alt = label + ' no IF Baiano';
                while (card.firstChild) {
                    link.appendChild(card.firstChild);
                }
                card.appendChild(link);
            }
        });
    </script>
<?php endif; ?>