// HEADER BACKGROUND CHANGE

const { intersection } = require("lodash");

let header = document.querySelector('.header');
let speed = 5000;
let backgrounds = ['url(./media/backgrounds/wall2.webp)','url(./media/backgrounds/wall3.webp)','url(./media/backgrounds/wall1.webp)'];
let i = 0;

setInterval(bgChange,speed);

function bgChange() {
    header.style.backgroundImage = backgrounds[i];

    if (i < backgrounds.length)
        i++;
    else {
        i = 0;
    }
}


let modalButton = document.querySelector('#modalButton');

let buttonObserver = new IntersectionObserver(entries =>{
    entries.forEach(el =>{
        if(!el.isIntersecting){
            modalButton.style.right='2vh';
        } else {
            modalButton.style.right='-30vh';
        }
    })
}, {threshold: 0.5} )

buttonObserver.observe(header);