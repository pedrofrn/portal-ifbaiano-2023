(() => {
    const bannerLateral = document.querySelector('#bannerLateral');
    if (bannerLateral) {
        let closed = false;
        let touchStartX = 0;
        let touchEndX = 0;

        let slideIndex = 0;

        slidesBannerLateral();

        function dotSlide(index) {
            const dot = document.createElement('span');
            dot.classList.add('dot');
            dot.setAttribute('data-index', index);
            dot.addEventListener('click', function () {
                showSlide(parseInt(this.getAttribute('data-index')), true);
            });
            return dot;
        }

        function slidesBannerLateral() {
            let slides = bannerLateral.getElementsByClassName("bannerInterno");
            let dotsContainer = bannerLateral.querySelector('.dots');

            if (slides.length > 1 && !dotsContainer) {
                dotsContainer = document.createElement('div');
                dotsContainer.classList.add('dots');
                bannerLateral.appendChild(dotsContainer);
            }

            dotsContainer ? dotsContainer.innerHTML = '' : null;

            for (let i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
                if (!slides[i].querySelector('span.numberSlide') && slides.length > 1) {
                    bannerLateral.querySelector('.dots').appendChild(dotSlide(i));
                }
            }

            showSlide(slideIndex);

            setTimeout(function () {
                slideIndex = (slideIndex + 1) % slides.length;
                slidesBannerLateral();
            }, 8000);
        }

        function handleSwipe() {
            const SWIPE_THRESHOLD = 50;
            const deltaX = touchEndX - touchStartX;

            if (deltaX > SWIPE_THRESHOLD) {
                plusSlides(-1);
            } else if (deltaX < -SWIPE_THRESHOLD) {
                plusSlides(1);
            }
        }

        function plusSlides(n) {
            showSlide(slideIndex + n);
        }

        function showSlide(index) {
            let slides = bannerLateral.getElementsByClassName("bannerInterno");
            let spanDots = bannerLateral.getElementsByClassName("dot");

            if (index >= slides.length) {
                index = 0;
            } else if (index < 0) {
                index = slides.length - 1;
            }

            for (let i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }

            for (let i = 0; i < spanDots.length; i++) {
                spanDots[i].classList.remove("active");
            }

            if (!closed) {
                slides[index].style.display = "block";
                spanDots.length !== 0 ? spanDots[index].classList.add("active") : null;
                slideIndex = index;
            } else {
                return;
            }
        }

        bannerLateral.addEventListener('touchstart', function (event) {
            touchStartX = event.touches[0].clientX;
        });

        bannerLateral.addEventListener('touchend', function (event) {
            touchEndX = event.changedTouches[0].clientX;
            handleSwipe();
        });
    }
})();
