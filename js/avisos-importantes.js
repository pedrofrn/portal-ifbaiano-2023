(() => {
    const meioCentro = document.querySelector('#containerMeioCentro');
    const avisosBG = document.querySelector('#avisosImportantes');
    const aXAvisos = meioCentro.querySelector('#avisosImportantes span.spanX');
    let closed = false;
    let slideIndex = 0;
    let touchStartX = 0;
    let touchEndX = 0;

    if (aXAvisos) {
        aXAvisos.innerHTML = "<svg fill='none' stroke='currentColor' stroke-width='1.5' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg' aria-hidden='true'><path stroke-linecap='round' stroke-linejoin='round' d='M6 18L18 6M6 6l12 12'></path></svg >";
        aXAvisos.addEventListener('click', () => {
            closed = true;
            avisosBG.style.height = '0px';
            setTimeout(() => {
                avisosBG.style.padding = '0';
                avisosBG.remove();
            }, 1000);
        });
    }

    let slides = avisosBG.getElementsByClassName("avisoInterno");
    let dotsContainer;

    function initDots() {
        if (slides.length > 1 && !dotsContainer) {
            dotsContainer = document.createElement('div');
            dotsContainer.classList.add('dots');
            avisosBG.appendChild(dotsContainer);

            for (let i = 0; i < slides.length; i++) {
                dotsContainer.appendChild(dotSlide(i));
            }
        }
    }

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

    function slidesAvisosImportantes() {
        for (let i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
            if (!slides[i].querySelector('span.numberSlide') && slides.length > 1) {
                slides[i].appendChild(numberSlide(i + 1, slides.length));
            }
        }

        initDots();

        showSlide(0); // Iniciar do primeiro slide

        setInterval(function () {
            plusSlides(1);
        }, 10000); // Trocar o slide automaticamente a cada 10 segundos
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
        for (let i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
            slides[i].classList.remove('active');
        }

        if (dotsContainer) {
            let spanDots = dotsContainer.getElementsByClassName("dot");
            for (let i = 0; i < spanDots.length; i++) {
                spanDots[i].classList.remove("active");
            }
        }

        if (!closed) {
            index = index % slides.length;
            if (index < 0) index += slides.length;
            slides[index].style.display = "block";
            slides[index].classList.add('active');
            const avisoAtivo = document.querySelector('.avisoInterno.active');
            const alturaAviso = avisoAtivo.clientHeight;
            avisosBG.style.height = `${alturaAviso}px`;
            if (dotsContainer) {
                dotsContainer.getElementsByClassName("dot")[index].classList.add("active");
            }
            updateNumberSlide(index);
            slideIndex = index;
        } else {
            return;
        }
    }

    function updateNumberSlide(index) {
        const totalSlides = slides.length;
        const numberSlideElement = document.querySelector('.numberSlide');

        if (numberSlideElement) {
            numberSlideElement.innerText = `${index + 1}/${totalSlides}`;
        }
    }

    avisosBG.addEventListener('touchstart', function (event) {
        touchStartX = event.touches[0].clientX;
    });

    avisosBG.addEventListener('touchend', function (event) {
        touchEndX = event.changedTouches[0].clientX;
        handleSwipe();
    });

    slidesAvisosImportantes();
})();
