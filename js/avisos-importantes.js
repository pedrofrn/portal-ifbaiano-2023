(() => {
    const meioCentro = document.querySelector('#containerMeioCentro');
    const avisosBG = document.querySelector('#avisosImportantes');
    const aXAvisos = meioCentro.querySelector('#avisosImportantes span.spanX');
    let closed = false;
    let slideIndex = 0;

    if (aXAvisos) {
        aXAvisos.innerHTML = "<svg fill='none' stroke='currentColor' stroke-width='1.5' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg' aria-hidden='true'><path stroke-linecap='round' stroke-linejoin='round' d='M6 18L18 6M6 6l12 12'></path></svg >";
        aXAvisos.addEventListener('click', () => {
            closed = true;
            avisosBG.style.transition = "max-height 0.5s ease-in-out";
            avisosBG.style.maxHeight = "0";
            setTimeout(() => {
                avisosBG.remove();
            }, 500);
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

        slideIndex++;
        if (slideIndex > slides.length) slideIndex = 1;

        showSlide(slideIndex);

        setTimeout(slidesAvisosImportantes, 8000);
    }

    function showSlide(index, clicou = false) {
        for (let i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
    
        if (dotsContainer) {
            let spanDots = dotsContainer.getElementsByClassName("dot");
            for (let i = 0; i < spanDots.length; i++) {
                spanDots[i].classList.remove("active");
            }
        }
    
        if (!closed) {
            if (clicou) {
                index = index % slides.length;
                if (index < 0) index += slides.length;
                slides[index].style.display = "block";
                if (dotsContainer) {
                    dotsContainer.getElementsByClassName("dot")[index].classList.add("active");
                }
                updateNumberSlide(index);
                slideIndex = index;
            } else {
                slides[slideIndex - 1].style.display = "block";
                if (dotsContainer) {
                    dotsContainer.getElementsByClassName("dot")[slideIndex - 1].classList.add("active");
                }
                updateNumberSlide(slideIndex - 1);
            }
    
            setTimeout(() => {
                avisosBG.classList.add('show');
            }, 0);
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

    slidesAvisosImportantes();
})();
