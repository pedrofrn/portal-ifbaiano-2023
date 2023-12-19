(() => {
    const meioCentro = document.querySelector('#containerMeioCentro');
    const avisosBG = document.querySelector('#avisosImportantes');
    const aXAvisos = meioCentro.querySelector('#avisosImportantes span.spanX');
    let closed = false;

    if (aXAvisos) {
        aXAvisos.innerHTML = "<svg fill='none' stroke='currentColor' stroke-width='1.5' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg' aria-hidden='true'><path stroke-linecap='round' stroke-linejoin='round' d='M6 18L18 6M6 6l12 12'></path></svg >";
        aXAvisos.addEventListener('click', () => {
            avisosBG.remove();
            closed = true;
        });
    }

    let slideIndex = 0;
    slidesAvisosImportantes();

    function numberSlide(curr, total) {
        const numberSlide = document.createElement('span');
        numberSlide.classList.add('numberSlide')
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
        let i;
        let slides = avisosBG.getElementsByClassName("avisoInterno");
        if (slides.length > 1 && !avisosBG.querySelector('div.dots')) {
            let dotsContainer = document.createElement('div');
            dotsContainer.classList.add('dots');
            avisosBG.appendChild(dotsContainer);
        }

        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
            if (!slides[i].querySelector('span.numberSlide') && slides.length > 1) {
                slides[i].appendChild(numberSlide(i + 1, slides.length));
                document.querySelector('.dots').appendChild(dotSlide(i))
            }
        }
        slideIndex++;
        let spanDots = document.getElementsByClassName("dot");
        if (slideIndex > slides.length) slideIndex = 1;

        showSlide(slideIndex);

        setTimeout(slidesAvisosImportantes, 8000);
    }

    function showSlide(index, clicou = false) {
        let slides = avisosBG.getElementsByClassName("avisoInterno");
        let spanDots = document.getElementsByClassName("dot");

        for (let i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (let i = 0; i < spanDots.length; i++) {
            spanDots[i].className = spanDots[i].className.replace(" active", "");
        }
    
        if (!closed) {
            if (clicou) {
                slides[index].style.display = "block";
                spanDots[index].className += " active";
                slideIndex = index;
            } else {
                slides[index - 1].style.display = "block";
                slides.length > 1 ? spanDots[index - 1].className += " active" : null;
            }
        }
        else return;
    }
})();