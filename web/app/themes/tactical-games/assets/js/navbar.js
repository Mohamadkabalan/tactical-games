/* On scroll fix nav */
document.addEventListener('scroll', e => {
    scrollPosition = Math.round(window.scrollY);
    const navbar = document.querySelector('.navbar');
    //const navbarTopHeight = document.querySelector('.header').offsetHeight;
    const navbarHeight = navbar.offsetHeight;
    const body = document.querySelector('#body');
    
    if (scrollPosition > navbarHeight) {
        navbar.classList.add('navbar--fixed');
        //body.style.paddingTop = navbarHeight + 'px';
    } else {
        navbar.classList.remove('navbar--fixed');
    }
});
/* END On scroll fix nav */

document.addEventListener("DOMContentLoaded", function () {
    const navbar = document.querySelector('.navbar');
    const wpadminbar = document.querySelector('#wpadminbar');
    const navbarHeight = navbar.offsetHeight;
    const wpadminbarHeight = wpadminbar.offsetHeight;
    const body = document.querySelector('#body');
    body.style.paddingTop = navbarHeight - wpadminbarHeight + 'px';
});