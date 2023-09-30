<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Sign in / Sign up - SOPOMA</title>
  <meta name="description" content="A minimalist sign in page. Built with Pico CSS." />
  <link rel="shortcut icon" href="icon/logo.png" />
  <link rel="canonical" href="https://picocss.com/examples/sign-in/" />

  <!-- Pico.css -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css" />

  <link rel="stylesheet" href="css/style.css" />
</head>

<body>
  <!-- Nav -->
  <nav class="container-fluid">
    <ul>
      <li>
        <div id="primer_a">
          <a href="index.php" class="contrast" onclick="event.preventDefault()">
            <strong>
              <img id="logo" style="width:5rem; border-radius:50%; margin-right: 20px;" src="icon/logo.png" alt="Icono">
            </strong>
          </a>
          <h1 id="textlogo" style="font-weight:bold; margin-bottom:0px;">SOPOMA Software Projects Marketplace</h1>
        </div>
      </li>
    </ul>
    <ul>
      <li>
        <details role="list" dir="rtl">
          <summary aria-haspopup="listbox" role="link" class="secondary">Theme</summary>
          <ul role="listbox">
            <li><a href="#" data-theme-switcher="auto">Auto</a></li>
            <li><a href="#" data-theme-switcher="light">Light</a></li>
            <li><a href="#" data-theme-switcher="dark">Dark</a></li>
          </ul>
        </details>
      </li>
    </ul>
  </nav>
  <!-- ./ Nav -->

  <!-- Main -->
  <main class="container">
    <article class="grid">
      <div>
        <hgroup>
          <h1 id="title-form">Sign up</h1>
          <h2 id="subtitle-form">🐧 Welcome back to the system 🐧</h2>
        </hgroup>
        <form action="php/register_login_be.php" method="POST" onsubmit="return validarFormulario()">

          <input style="display:none;" id="name" type="text" name="name" placeholder="Name ..." aria-label="Name"
            autocomplete="name" />

          <input style="display:none;" id="surname" type="text" name="surname" placeholder="Surname ..."
            aria-label="Surname" autocomplete="surname" />

          <input style="display:none;" id="email" type="text" name="email" placeholder="Email ..." aria-label="Email"
            autocomplete="email" />

          <input style="display:none;" id="phone" type="text" name="phone" placeholder="Phone number ..."
            aria-label="Phone number" autocomplete="tel" />

          <input type="text" id="user" name="user" placeholder="User ..." aria-label="Login" autocomplete="nickname" />

          <input type="password" id="password" name="password" placeholder="Password ..." aria-label="Password"
            autocomplete="current-password" />

          <input style="display:none;" id="2password" type="password" name="2password" placeholder="Password again ..."
            aria-label="Password" autocomplete="current-password" />

          <h5 id="error" style="color:red; display:none;">Error</h5>

          <button style="font-weight: bold;" id="btn-1" type="submit" class="contrast">Sign up</button>

        </form>

        <button class="btn2-mobile" id="btn-2-mobile" style="font-weight: bold;" class="contrast"
          onclick="event.preventDefault()">Are you a new user? 🐣</button>

      </div>
      <div id="foto">
        <button id="btn-2" style="font-weight: bold;" class="contrast" onclick="event.preventDefault()">Are you a new
          user? 🐣</button>
      </div>
    </article>
  </main>
  <!-- ./ Main -->

  <!-- Footer -->
  <footer class="container-fluid">
    <small>
      Made by "Los Pollos Hermanos" </small>
  </footer>
  <!-- ./ Footer -->

  <!-- Minimal theme switcher -->
  <script src="js/sign-in-sign-up.js"></script>
  <script src="js/minimal-theme-switcher.js"></script>
</body>

</html>