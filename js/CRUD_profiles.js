function create_profile(event) {

      // Prevenir el comportamiento predeterminado del botón
      if (typeof event !== 'undefined') {
        // Evitar que se envíe el formulario
        event.preventDefault();
    }

    // Obtener el valor del campo de entrada

    var type = document.getElementById('create_qualification').value;
    var level = document.getElementById('create_level').value;
    var knowledge = document.getElementById('create_knowledge').value;
    var technologies = document.getElementById('create_technologies').value;
    var user = document.getElementById('user_name').textContent;
    //quitar espacios en blanco
    user = user.trim();

    console.log(type);
    console.log(level);
    console.log(knowledge);
    console.log(technologies);

    if (knowledge == "" || technologies == "") {
        alert('You need to specify at least one knowledge and technology to create a profile');
        return false;
    } else {
        return true;
    }

}


function mod_profile(event) { 

    // Prevenir el comportamiento predeterminado del botón
    if (typeof event !== 'undefined') {
        // Evitar que se envíe el formulario
        event.preventDefault();
    }

    // Obtener el valor del campo de entrada

    var type = document.getElementById('modificate_qualification').value;
    var level = document.getElementById('modificate_level').value;
    var knowledge = document.getElementById('modificate_knowledge').value;
    var technologies = document.getElementById('modificate_technologies').value;
    var user = document.getElementById('user_name').textContent;
    //quitar espacios en blanco
    user = user.trim();

    console.log(type);
    console.log(level);
    console.log(knowledge);
    console.log(technologies);

    if (knowledge.contains("'") || technologies.contains("'")) {
        alert('You cannot use the character \' to create a profile');
        return false;
    } else {
        return true;
    }
}

function del_profile(event) {

    // Prevenir el comportamiento predeterminado del botón
    if (typeof event !== 'undefined') {
        // Evitar que se envíe el formulario
        event.preventDefault();
    }

    var mensaje;
    var opcion = confirm("Are you aware that you are deleting all the information of this profile in the system?");
    if (opcion == true) {
        mensaje = "You have deleted the profile.";
        return true;

    } else {
        mensaje = "You have not deleted the profile.";
        return false;
        
    }
    alert(mensaje);
}