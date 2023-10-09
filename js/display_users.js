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
                var space = document.getElementsByClassName('espacio_al_final');

                // Eliminar todas las tarjetas de usuario del DOM

                while (cards.length > 0) {
                    cards[0].parentNode.removeChild(cards[0]);
                }

                while (space.length > 0) {
                    space[0].parentNode.removeChild(space[0]);
                }

                document.getElementById('no_users').style.display = 'block';

            } else {

                console.log('Hay usuarios con ese nombre');

                document.getElementById('no_users').style.display = 'none';

                var cards = document.getElementsByClassName('card');

                //1º Eliminar todas las tarjetas de usuario del DOM

                while (cards.length > 0) {
                    cards[0].parentNode.removeChild(cards[0]);
                }

                // Crear una tarjeta de usuario para cada usuario en el archivo JSON
                for (var i = 0; i < data.length; i++) {
                    var user = data[i];

                    // Crear los elementos HTML para la tarjeta de usuario
                    var card = document.createElement('div');
                    card.className = 'card';

                    var user_name_surname = document.createElement('div');
                    user_name_surname.className = 'user_name_surname';

                    var username = document.createElement('h3');
                    username.className = 'username';
                    username.textContent = '@' + user.user;

                    var name_surname = document.createElement('h3');
                    name_surname.className = 'name_surname';
                    name_surname.textContent = user.name + ' ' + user.surname;

                    var contact = document.createElement('div');
                    contact.className = 'contact';

                    var email = document.createElement('h4');
                    email.className = 'email';
                    email.innerHTML = '<i class="fa-regular fa-envelope"></i> ' + user.email;

                    var phone = document.createElement('h4');
                    phone.className = 'phone';
                    phone.innerHTML = '<i class="fa-solid fa-mobile"></i> ' + user.phone;

                    var profiles = document.createElement('div');
                    profiles.className = 'profiles';

                    var ul = document.createElement('ul');

                    for (var j = 0; j < user.profiles.length; j++) {
                        var profile = user.profiles[j];

                        var li = document.createElement('li');
                        li.className = 'profile';

                        var type = document.createElement('h4');
                        type.className = 'type';
                        type.innerHTML = '<i class="fa-regular fa-user"></i> ' + profile.type + ' / ' + profile.level;

                        var knowledge = document.createElement('p');
                        knowledge.className = 'knowledge';
                        knowledge.textContent = 'Knowledge : ' + profile.knowledge;

                        var technologies = document.createElement('p');
                        technologies.className = 'technologies';
                        technologies.textContent = 'Technologies : ' + profile.technologies;

                        li.appendChild(type);
                        li.appendChild(knowledge);
                        li.appendChild(technologies);

                        ul.appendChild(li);
                    }

                    profiles.appendChild(ul);

                    user_name_surname.appendChild(username);
                    user_name_surname.appendChild(name_surname);

                    //color random de fondo a user_name_surname que haga que se vean bien las letras blancas distinto a #11191f
                    var randomColor = Math.floor(Math.random() * 16777215).toString(16);

                    while (randomColor == '11191f') {
                        randomColor = Math.floor(Math.random() * 16777215).toString(16);
                    }

                    user_name_surname.style.backgroundColor = "#" + randomColor;


                    contact.appendChild(email);
                    contact.appendChild(phone);

                    card.appendChild(user_name_surname);
                    var separador = document.createElement('hr')
                    separador.className = 'separador';
                    card.appendChild(separador);
                    card.appendChild(contact);
                    var separador = document.createElement('hr')
                    separador.className = 'separador';
                    card.appendChild(separador);
                    card.appendChild(profiles);

                    // Agregar la tarjeta de usuario al DOM
                    var cards_container = document.getElementsByClassName('cards')[0];

                    cards_container.appendChild(card);
                }
                var space = document.createElement('div');
                space.className = 'espacio_al_final';

                cards_container.appendChild(space);

            }
        })
        .catch(error => console.error(error));
}
// Add event listener to the button

submit_button.addEventListener('click', display_users());


