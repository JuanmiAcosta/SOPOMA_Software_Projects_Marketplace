const mod_btn = document.getElementById('modificate_user_btn');

function mod_user(event) {

    // Prevenir el comportamiento predeterminado del botón
    if (typeof event !== 'undefined') {
        // Evitar que se envíe el formulario
        event.preventDefault();
    }

    // Obtener el valor del campo de entrada

    var name = document.getElementById('modificate_name').value;
    var surname = document.getElementById('modificate_surname').value;
    var phone = document.getElementById('modificate_phone').value;
    var user = document.getElementById('user_name').textContent;
    //quitar espacios en blanco
    user = user.trim();

    console.log(name);
    console.log(surname);
    console.log(phone);
    console.log(user);

    //regex para validar telefono con 9 digitos
    var regexPhone = /^[0-9]{9}$/;

    // Validación de teléfono

    if (!(regexPhone.test(phone)) && phone != "") {
        alert('Invalid phone format. Only 9 digits allowed (Spanish format)');
        return false;
    }else{
        return true;
    }
}

function del_user(event){
    
    // Prevenir el comportamiento predeterminado del botón
    if (typeof event !== 'undefined') {
        // Evitar que se envíe el formulario
        event.preventDefault();
    }

    var mensaje;
    var opcion = confirm("Are you aware that you are deleting all your information in the system? (Deleting your projects, profiles, ratings and memberships in teams)");
    if (opcion == true) {
        mensaje = "You have deleted your account. We hope to see you soon!";
	} else {
	    mensaje = "You have not deleted your account.";
	}
	alert(mensaje);
}







