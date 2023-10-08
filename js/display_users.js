const submit_button = document.getElementById('submit_button');

function display_users(event) {

    // Prevenir el comportamiento predeterminado del botón
    if (typeof event !== 'undefined') {
        // Evitar que se envíe el formulario
        event.preventDefault();
    }

    // Obtener el valor del campo de entrada
    var input = document.getElementById('input_name').value;


    // Hacer una solicitud HTTP al archivo searchuser.php
    fetch('http://localhost/SOPOMA/php/searchuser.php?name=' + input)
        .then(response => response.json())
        .then(data => {
            console.log(data);
            console.log(data.length);


            // FRONTEND TIME
            if (data.length == 0) {

                console.log('No hay usuarios con ese nombre');

                var cards = document.getElementsByClassName('card');

                for (var i = 0; i < cards.length; i++) {
                    cards[i].style.display = 'none';
                }

                document.getElementById('no_users').style.display = 'block';

            } else {

                console.log('Hay usuarios con ese nombre');

                document.getElementById('no_users').style.display = 'none';

                var cards = document.getElementsByClassName('card');

                for (var i = 0; i < cards.length; i++) {
                    cards[i].style.display = 'block';
                }
                
            }
        })
        .catch(error => console.error(error));
}
// Add event listener to the button

submit_button.addEventListener('click', display_users());


