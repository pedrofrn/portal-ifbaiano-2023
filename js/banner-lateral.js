(() => {
    const bannerLateral = document.querySelector('#bannerLateral');
    let closed = false;

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
        let i;
        let slides = bannerLateral.getElementsByClassName("bannerInterno");
        let dotsContainer = bannerLateral.querySelector('.dots');
    
        if (slides.length > 1 && !dotsContainer) {
            dotsContainer = document.createElement('div');
            dotsContainer.classList.add('dots');
            bannerLateral.appendChild(dotsContainer);
        }
    
        dotsContainer.innerHTML = '';
    
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
            if (!slides[i].querySelector('span.numberSlide') && slides.length > 1) {
                bannerLateral.querySelector('.dots').appendChild(dotSlide(i));
            }
        }
        slideIndex++;
        let spanDots = bannerLateral.getElementsByClassName("dot");
        if (slideIndex > slides.length) slideIndex = 1;
    
        showSlide(slideIndex);
    
        setTimeout(slidesBannerLateral, 8000);
    }
    

    function showSlide(index, clicou = false) {
        let slides = bannerLateral.getElementsByClassName("bannerInterno");
        let spanDots = bannerLateral.getElementsByClassName("dot");

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
