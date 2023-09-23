let user_mode = 0 // 0 -> sign up 1 -> sign in
const btn1 = document.getElementById('btn-1');
const btn2 = document.getElementById('btn-2');
const title = document.getElementById('title-form');
const subtitle = document.getElementById('subtitle-form');
const nameuser = document.getElementById('name');
const email = document.getElementById('email');
const password2 = document.getElementById('2password');
const phone = document.getElementById('phone');
const surname = document.getElementById('surname');

function pasoMode1(){
    user_mode = 1;
    btn1.innerHTML = 'Sign in';
    btn2.innerHTML = 'Sign up';
    title.innerHTML = 'Sign in';
    subtitle.innerHTML = '🐣 Register for a OSM experience 🐣';
    nameuser.style.display = 'block';
    surname.style.display = 'block';
    phone.style.display = 'block';
    email.style.display = 'block';
    password2.style.display = 'block';
}

function pasoMode0(){
    user_mode = 0;
    btn1.innerHTML = 'Sign up';
    btn2.innerHTML = 'Sign in';
    title.innerHTML = 'Sign up';
    subtitle.innerHTML = '🐧 Welcome back to the system 🐧';
    nameuser.style.display = 'none';
    surname.style.display = 'none';
    phone.style.display = 'none';
    email.style.display = 'none';
    password2.style.display = 'none';
}

//En el modo 0 el boton sign up es el 1 y el sign in el 2
btn2.onclick = () => { 
    if (user_mode == 0) {
        pasoMode1();
    }else if (user_mode == 1) {
        pasoMode0();
    }
}



