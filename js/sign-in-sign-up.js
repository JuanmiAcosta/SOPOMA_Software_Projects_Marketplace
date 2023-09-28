let user_mode = 0 // 0 -> sign up 1 -> sign in

const btn1 = document.getElementById('btn-1');
const btn2 = document.getElementById('btn-2');
const btn2mobile = document.getElementById('btn-2-mobile');
const title = document.getElementById('title-form');
const subtitle = document.getElementById('subtitle-form');
const nameuser = document.getElementById('name');
const email = document.getElementById('email');
const password2 = document.getElementById('2password');
const phone = document.getElementById('phone');
const surname = document.getElementById('surname');
const user = document.getElementById('user');
const password = document.getElementById('password');

// Assuming you have an array of your input fields in order
const inputFields = [nameuser, surname, phone, email, password2, user, password];

function validarFormulario() {

    // Vuelvo a instanciar aquí porque si no el submit del form de HTML no funciona correctamente
    var nameuser = document.getElementById('name');
    var email = document.getElementById('email');
    var password2 = document.getElementById('2password');
    var phone = document.getElementById('phone');
    var surname = document.getElementById('surname');
    var user = document.getElementById('user');
    var password = document.getElementById('password');

    //regex para validar email
    var regexEmail = /\S+@\S+\.\S+/;

    if (user_mode == 1) { // Si estoy en modo registro

        console.log('user_mode == 1');

        if (nameuser.value.length == 0 || surname.value.length == 0 || phone.value.length == 0 || email.value.length == 0
            || password2.value.length == 0 || user.value.length == 0 || password.value.length == 0) {
            alert("All fields are required");
            return false;
        }

        if (!regexEmail.test(email.value)) { //NO ESTA FUNCIONANDO
            alert("Email is not valid");
            return false;
        }

        var contrasena = password.value;
        var confirmarContrasena = password2.value;

        if (contrasena !== confirmarContrasena) {
            alert("Password does not match");
            return false; // Evita que el formulario se envíe
        } else {
            // Si las contraseñas coinciden, el formulario se enviará
            return true;
        }
    } else if (user_mode == 0) { // Si estoy en modo login

        console.log('user_mode == 0');

        if (user.value.length == 0 || password.value.length == 0) {
            alert("All fields are required");
            return false;

        } else {
            return true;
        }
    }
}

function pasoMode1() {
    user_mode = 1;
    btn1.innerHTML = 'Sign in';
    btn2.innerHTML = 'Are you already an user ? 🐧';
    btn2mobile.innerHTML = 'Are you already an user ? 🐧';
    title.innerHTML = 'Sign in';
    subtitle.innerHTML = '🐣 Register for a OSM experience 🐣';

    for (const field of inputFields) {
        if (field.style.display !== 'none') {
            field.focus();
            break;
        }
    }

    nameuser.style.display = 'block';
    surname.style.display = 'block';
    phone.style.display = 'block';
    email.style.display = 'block';
    password2.style.display = 'block';
    console.log('pasoMode1');
}

function pasoMode0() {
    user_mode = 0;
    btn1.innerHTML = 'Sign up';
    btn2.innerHTML = 'Are you a new user? 🐣';
    btn2mobile.innerHTML = 'Are you a new user? 🐣';
    title.innerHTML = 'Sign up';
    subtitle.innerHTML = '🐧 Welcome back to the system 🐧';

    for (const field of inputFields) {
        field.value = '';
        field.style.display = 'none';
        field.removeAttribute('required');
    }

    nameuser.style.display = 'none';
    surname.style.display = 'none';
    phone.style.display = 'none';
    email.style.display = 'none';
    password2.style.display = 'none';
    console.log('pasoMode0');

}

//En el modo 0 el boton sign up es el 1 y el sign in el 2

//CAMBIO DE MODO

btn2.onclick = () => {
    if (user_mode == 0) {
        pasoMode1();
    } else if (user_mode == 1) {
        pasoMode0();
    }
}

btn2mobile.onclick = () => {
    if (user_mode == 0) {
        pasoMode1();
    } else if (user_mode == 1) {
        pasoMode0();
    }
}







