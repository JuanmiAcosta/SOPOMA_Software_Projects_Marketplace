function display_users() {
    // Obtener el valor del campo de entrada
    var name = document.getElementsByName('name')[0].value;

    // Hacer una solicitud HTTP al archivo searchuser.php
    fetch('http://localhost/SOPOMA/php/searchuser.php?name=' + name)
        .then(response => response.json())
        .then(data => {
            console.log(data);

            // FRONTEND TIME
            if (data.length == 0) {
                document.getElementById('Users').style.display = 'block';
            } else {
                
            }
        })
        .catch(error => console.error(error));
}

display_users();
