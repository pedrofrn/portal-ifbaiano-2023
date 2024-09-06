<?php if (has_post_thumbnail()): ?>
    <div class="thumbNoticia">
        <?php the_post_thumbnail(); ?>
        <div class="thumbNoticiaLegenda">
            <?php $title = get_post(get_post_thumbnail_id())->post_title;
                echo $title; ?>
            <script>
                (() => {
                    const thumbNoticiaLegenda = document.querySelector('div.thumbNoticiaLegenda');
                    if (thumbNoticiaLegenda.innerText.length > 0) thumbNoticiaLegenda.style.marginTop = '20px';
                    else thumbNoticiaLegenda.remove();
                })();
            </script>
        </div>
    </div>
    <script>
        (() => {
            const postThumbnail = document.querySelector('div.thumbNoticia img');
            if (postThumbnail && postThumbnail.height > 400) {
                const diffFrame = postThumbnail.height - 400 > 0 ? postThumbnail.height - 400 : (postThumbnail.height - 400) * -1;
                postThumbnail.style.transform = `translateY(-${diffFrame / 2}px)`;
            }
        })();
    </script>
<?php endif; ?>