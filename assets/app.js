console.log('coucou c\'est le js');

// GESTION DU MENU BURGER

const burger = document.querySelector('#Menu')

burger.addEventListener('click', ()=>{
    const nav =document.querySelector('#headerbottom')
    nav.classList.toggle('displayblock')
    nav.classList.toggle('displaynone')
})