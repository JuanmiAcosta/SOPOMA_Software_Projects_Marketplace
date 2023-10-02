const check = document.getElementsByClassName('checkbtn');
const barras = document.getElementById('barras');
let modo=0;

function changeBars() {

    console.log('changeBars()');

    if (modo==0) {
        //le quitamos la clase fa-bars y le agregamos fa-xmark
        modo=1;
        console.log('cross');
        barras.classList.remove('fas');
        barras.classList.remove('fa-bars');
        barras.classList.add('fa-solid');
        barras.classList.add('fa-bars-staggered');
    } else {
        //le quitamos la clase fa-xmark y le agregamos fa-bars
        modo=0;
        console.log('bars');
        barras.classList.add('fas');
        barras.classList.add('fa-bars');
        barras.classList.remove('fa-solid');
        barras.classList.remove('fa-bars-staggered');  
    }

}   

// Obtener la etiqueta por su clase 'checkbtn'
const label = document.querySelector('.checkbtn');

// Agregar un evento click a la etiqueta para ejecutar changeBars() cuando se hace clic en ella.
label.addEventListener('click', changeBars);
