const menu = document.getElementById('MenuPrincipal');
const menuRodape = document.querySelector('div.menuRodape');
const menuDestaque = document.querySelector('div#MenuDestaque');
const titulosMenu = document.querySelectorAll('div.TituloMenu');
const ulSubMenu = document.querySelectorAll('ul.sub-menu');

if (menuDestaque) {
    const menuDestaqueItems = menuDestaque.querySelectorAll('li');
    menuDestaqueItems.forEach(li => {
        const link = li.querySelector('a');
        if (link) {
            const newLink = document.createElement('a');
            newLink.href = link.href;
            newLink.textContent = link.textContent;
            li.parentNode.insertBefore(newLink, li);
            li.parentNode.removeChild(li);
        }
    })
}

titulosMenu.forEach((element, index, array) => {
    if (index === array.length - 1) {
        element.classList.add('noMargin');
    }
});

for (let i of titulosMenu) {
    const isMenu = Array.from(i.nextElementSibling.classList).some(classe => classe.startsWith('menu-'));
    if (isMenu) i.nextElementSibling.classList.add('hidden');

    i.addEventListener('click', () => {
        titulosMenu.forEach(titulo => {
            if (titulo !== i) {
                titulo.classList.remove('clicked');
                if (isMenu) titulo.nextElementSibling.classList.add('hidden');
            }
        });

        i.classList.toggle('clicked');
        if (isMenu) i.nextElementSibling.classList.toggle('hidden');

        if (isMenu && !i.nextElementSibling.classList.contains('hidden')) {
            i.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    });
}

for (const i of ulSubMenu) {
    i.previousElementSibling.style.fontWeight = '800';
    i.classList.add('hidden')
}

menu.addEventListener('mouseover', (e) => {
    if (e.target.nextElementSibling && e.target.nextElementSibling.classList.contains('sub-menu')) e.target.nextElementSibling.classList.toggle('open')
})

const isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);

menuRodape.addEventListener(isMobile ? 'click' : 'mouseover', (e) => {
    if (e.target.nextElementSibling && e.target.nextElementSibling.classList.contains('sub-menu')) {
        e.preventDefault();
        e.target.nextElementSibling.classList.toggle('open')
    }
})