//IMPORTANTISIMO, SI VES QUE ALGO DSE TU CÓDIGO NO FUNCIONA BIEN PRUEBA CTRL+F5 PARA ACTUALIZAR CODIGO EN XAMPSERVER

var user_mode = 0 // 0 -> sign up 1 -> sign in

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

const error = document.getElementById('error');

// Assuming you have an array of your input fields in order
var inputFields = [nameuser, surname, phone, email, password2];

function validarFormulario() {

    //regex para validar email
    var regexEmail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

    //regex para validar telefono con 9 digitos
    var regexPhone = /^[0-9]{9}$/;

    if (user_mode == 1) { // Si estoy en modo registro

        if (nameuser.value.length == 0 || surname.value.length == 0 || phone.value.length == 0 || email.value.length == 0
            || password2.value.length == 0 || user.value.length == 0 || password.value.length == 0) {
            error.innerHTML = 'All fields are required';
            error.style.display = 'block';
            return false;
        }

        // Validación de email
        else if (!(regexEmail.test(email.value))) {
            error.innerHTML = 'Invalid email format';
            error.style.display = 'block';
            return false;
        }

        // Validación de teléfono
        else if (!(regexPhone.test(phone.value))) {
            error.innerHTML = 'Invalid phone format. Only 9 digits allowed (Spanish format)';
            error.style.display = 'block';
            return false;
        }

        else {
            var contrasena = password.value;
            var confirmarContrasena = password2.value;

            if (contrasena !== confirmarContrasena) {
                error.innerHTML = 'Passwords do not match';
                error.style.display = 'block';
                return false; // Evita que el formulario se envíe
            } else {
                // Si las contraseñas coinciden, el formulario se enviará
                return true;
            }
        }
    } else if (user_mode == 0) { // Si estoy en modo login

        if (user.value.length == 0 || password.value.length == 0) {
            error.innerHTML = 'All fields are required';
            error.style.display = 'block';
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

    for (var field of inputFields) {
        field.value = '';
        field.style.display = 'block';
    }

    error.innerHTML = '';
    error.style.display = 'none';
    console.log('pasoMode1');
}

function pasoMode0() {

    user_mode = 0;
    btn1.innerHTML = 'Sign up';
    btn2.innerHTML = 'Are you a new user? 🐣';
    btn2mobile.innerHTML = 'Are you a new user? 🐣';
    title.innerHTML = 'Sign up';
    subtitle.innerHTML = '🐧 Welcome back to the system 🐧';

    for (var field of inputFields) {
        field.value = '';
        field.style.display = 'none';
    }
    
    user.style.display = 'block';
    password.style.display = 'block';

    error.innerHTML = '';
    error.style.display = 'none';

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







