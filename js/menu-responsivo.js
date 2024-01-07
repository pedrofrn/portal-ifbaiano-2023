(() => {
    const liHasChildren = document.querySelectorAll('#menuResponsivo ul.menu li.menu-item-has-children');
    liHasChildren.forEach(element => {
        element.addEventListener('click', function (event) {
            event.preventDefault();
            if (element.querySelector('ul.hidden').classList.contains('open')) {
                if (event.target === element.querySelector('a')) element.querySelector('ul.hidden').classList.remove('open');
                else window.location.href = event.target.href;
            }
            else {
                element.querySelector('ul.hidden').classList.add('open');
            }
        });
    })

    document.addEventListener('click', (event) => {
        const menuResponsivo = document.querySelector('#menuResponsivo');
        const inputToggle = document.querySelector('#menuToggle input');
        if (event.target !== inputToggle && !menuResponsivo.contains(event.target)) inputToggle.checked = false;
    })
})();