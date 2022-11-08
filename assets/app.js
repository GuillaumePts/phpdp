console.log('coucou c\'est le js');

// GESTION DU MENU BURGER

const burger = document.querySelector('#menuburger')



burger.addEventListener('click', ()=>{
    const nav =document.querySelector('#headerbottom')
    nav.classList.toggle('displayblock')
    nav.classList.toggle('displaynone')
})


// GESTION CARROUSSEL

const car = document.querySelector('#car')

if(car !== null){
    if(screen.width > 800){
        carrousselpc()
    }else{
        carrousselmobile()
    }
}




function carrousselmobile(){

    let count = 1
    

    car.src='../assets/img/carPhone/imgm'+count.toString()+'.jpg'

    setInterval(() => {
        if(count >= 4){
            count = 1
            car.src='../assets/img/carPhone/imgm'+count.toString()+'.jpg'
        }else{
            count++
            car.src='../assets/img/carPhone/imgm'+count.toString()+'.jpg'
        }
        console.log(count);
        
    }, 3000);


}

function carrousselpc(){


    car.src='../assets/img/car/img1.jpg'

    

    setTimeout(() => {
        car.src='../assets/img/car/img2.jpg'
        
    }, 3000);

    setTimeout(() => {
        car.src='../assets/img/car/img3.jpg'
    }, 6000);

    setTimeout(() => {
        car.src='../assets/img/car/img4.jpg'
    }, 9000);

    setTimeout(() => {
        carrousselpc()
    }, 12000);
}


// GESTION LEAFLET 

let map = L.map('map').setView([49.025150, 1.153978], 11);

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

L.marker([49.025150, 1.153978]).addTo(map)
    .bindPopup('<img src=../assets/img/logo.webp width=90px alt=logo du fastfood sur la carte>')
    .openPopup();

