(() => {
    const eventosBG = document.querySelector('#eventosImportantes');
    let closed = false;
    let touchStartX = 0;
    let touchEndX = 0;
    let slideIndex = 0;

    slidesEventosImportantes();

    function numberSlide(curr, total) {
        const numberSlide = document.createElement('span');
        numberSlide.classList.add('numberSlide');
        numberSlide.innerText = `${curr}/${total}`;
        return numberSlide;
    }

    function dotSlide(index) {
        const dot = document.createElement('span');
        dot.classList.add('dot');
        dot.setAttribute('data-index', index);
        dot.addEventListener('click', function () {
            showSlide(parseInt(this.getAttribute('data-index')), true);
        });
        return dot;
    }

    function slidesEventosImportantes() {
        let slides = eventosBG.getElementsByClassName("eventoInterno");
        if (slides.length > 1 && !eventosBG.querySelector('div.dots')) {
            let dotsContainer = document.createElement('div');
            dotsContainer.classList.add('dots');
            eventosBG.appendChild(dotsContainer);
        }

        for (let i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
            if (!slides[i].querySelector('span.numberSlide') && slides.length > 1) {
                slides[i].appendChild(numberSlide(i + 1, slides.length));
                eventosBG.querySelector('.dots').appendChild(dotSlide(i));
            }
        }

        showSlide(slideIndex);

        setInterval(function () {
            slideIndex = (slideIndex + 1) % slides.length;
            showSlide(slideIndex);
        }, 8000);
    }

    function handleSwipe() {
        const SWIPE_THRESHOLD = 50;
        const deltaX = touchEndX - touchStartX;

        if (deltaX > SWIPE_THRESHOLD) {
            plusSlides(-1); // Swipe para a esquerda
        } else if (deltaX < -SWIPE_THRESHOLD) {
            plusSlides(1); // Swipe para a direita
        }
    }

    function plusSlides(n) {
        showSlide(slideIndex + n);
    }

    function showSlide(index, clicou = false) {
        let slides = eventosBG.getElementsByClassName("eventoInterno");
        let spanDots = eventosBG.getElementsByClassName("dot");

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
            spanDots[index].classList.add("active");
            slideIndex = index;
        } else {
            return;
        }
    }

    eventosBG.addEventListener('touchstart', function (event) {
        touchStartX = event.touches[0].clientX;
    });

    eventosBG.addEventListener('touchend', function (event) {
        touchEndX = event.changedTouches[0].clientX;
        handleSwipe();
    });
})();
