(() => {
    const meioCentro = document.querySelector('#containerMeioCentro');
    const eventosBG = document.querySelector('#eventosImportantes');

    let closed = false;

    let slideIndex = 0;
    slidesEventosImportantes();

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

    function slidesEventosImportantes() {
        let i;
        let slides = eventosBG.getElementsByClassName("eventoInterno");
        if (slides.length > 1 && !eventosBG.querySelector('div.dots')) {
            let dotsContainer = document.createElement('div');
            dotsContainer.classList.add('dots');
            eventosBG.appendChild(dotsContainer);
        }

        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
            if (!slides[i].querySelector('span.numberSlide') && slides.length > 1) {
                slides[i].appendChild(numberSlide(i + 1, slides.length));
                eventosBG.querySelector('.dots').appendChild(dotSlide(i))
            }
        }
        slideIndex++;
        let spanDots = eventosBG.getElementsByClassName("dot");
        if (slideIndex > slides.length) slideIndex = 1;

        showSlide(slideIndex);

        setTimeout(slidesEventosImportantes, 8000);
    }

    function showSlide(index, clicou = false) {
        let slides = eventosBG.getElementsByClassName("eventoInterno");
        let spanDots = eventosBG.getElementsByClassName("dot");
    
        for (let i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (let i = 0; i < spanDots.length; i++) {
            spanDots[i].classList.remove("active");
        }
    
        if (!closed) {
            if (clicou) {
                slides[index].style.display = "block";
                spanDots[index].classList.add("active");
                slideIndex = index;
            } else {
                slides[index - 1].style.display = "block";
                spanDots[index - 1].classList.add("active");
            }
        } else {
            return;
        }
    }
    
})();