const welcome = document.getElementById('welcome_h1');
welcome.textContent.trim();

function typeWelcome(){
    const textArray = welcome.textContent.split('');
    welcome.textContent = '';

    textArray.forEach((letra, i) => {
        setTimeout(() => welcome.textContent += letra, 125 * i);
    });
}

typeWelcome();

setInterval(typeWelcome, 15000);