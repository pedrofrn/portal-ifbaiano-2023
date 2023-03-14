const menu = document.getElementById('MenuPrincipal');
const ulSubMenu = document.querySelectorAll('ul.sub-menu');

for (const i of ulSubMenu) {
    i.previousElementSibling.style.fontWeight = '800';
    i.classList.add('hidden')
    console.log('tem que ajustar os submenus para acesso via mobile')
}

menu.addEventListener('mouseover', (e) => {
    if (e.target.nextElementSibling &&
        e.target.nextElementSibling.classList.contains('sub-menu')) {
        e.target.nextElementSibling.classList.toggle('open')
    }
})