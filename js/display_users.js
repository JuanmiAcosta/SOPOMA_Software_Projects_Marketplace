function display_users() {
    // Obtener el valor del campo de entrada
    var name = document.getElementsByName('name')[0].value;

    // Hacer una solicitud HTTP al archivo searchuser.php
    fetch('http://localhost/SOPOMA/php/searchuser.php?name=' + name)
        .then(response => response.json())
        .then(data => {
            // Acceder a los datos del objeto
            console.log('User: ' + data[0][0]);
            console.log('Email: ' + data[0][1]);
            console.log('Name: ' + data[0][2]);
            console.log('Surname: ' + data[0][3]);
            console.log('Phone: ' + data[0][4]);
            console.log('Number of profiles: ' + data[0][5].length);
        })
        .catch(error => console.error(error));
}

display_users();
