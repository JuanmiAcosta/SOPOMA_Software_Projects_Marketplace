# SOPOMA Software Projects Marketplace ( Sistema de Información )
Desarrollo en grupo de un Sistema de Información. Pretende ser en primera instancia un Marketplace para proyectos de software en el que los usuarios colaboradores participaran en ellos de diversas maneras a escoger.

<p align="center">
  <img src="https://github.com/JuanmiAcosta/PracticaDDSI-OSM/blob/main/icon/logo.png?raw=true" alt="Imagen representativa">
</p>

## Para empezar con XAMPP y su base de datos local:

<p align="center">
  <img src="https://github.com/JuanmiAcosta/SOPOMA_Software_Projects_Marketplace/blob/main/xampp.png?raw=true" alt="Imagen representativa">
</p>


<ul>
<li>Descarga e instala XAMPP, preferiblemente en windows.</li>
<li>Para levantar los servicios y ver "phpmyadmin" (ver la base de datos, las tablas, modificar datos, crear tablas...) has de abrir XAMPP.</li>
<li>Activa Apache(Servidor) y MySQL(SGBD)</li>
<li>Dale a admin en MySQL</li>
<li>Crea una base de datos llamada exactamente "sopoma_bd" con formato "utf8mb4_spanish_ci".</li>
<li>Crea las primeras tablas ( ten en cuenta que esto es en el apartado SQL de la BD para crear tablas, eliminar..., más adelante las tablas tendrán su propio apartado SQL para insertar, consultar...) para comprobar que todo funcione y empezar a probar el CRUD de los usuarios y perfiles, y el login y logout:</li>
</ul>

```
CREATE TABLE Users (
    user VARCHAR(50) PRIMARY KEY,
    email VARCHAR(50) UNIQUE,
    name VARCHAR(50) NOT NULL,
    surname VARCHAR(50) NOT NULL,
    password VARCHAR(150) NOT NULL,
    phone VARCHAR(9) NOT NULL
);

CREATE TABLE Qualifications (
    qualification VARCHAR(50) PRIMARY KEY
);

CREATE TABLE Profiles (
    user VARCHAR(50),
    type VARCHAR(50) NOT NULL,
    level VARCHAR(50) CHECK ( level in ('Beginer','Intermediate','Advanced')), 
    knowledge LONGTEXT,
    technologies LONGTEXT,
    PRIMARY KEY (user, type),
    FOREIGN KEY (type) REFERENCES Qualifications(qualification),
    FOREIGN KEY (user) REFERENCES Users(user)
);

INSERT INTO Qualifications (qualification) VALUES
('Backend Developer'),
('Frontend Developer'),
('User Experience Designer'),
('Software Architect'),
('Full Stack Developer'),
('DevOps Engineer'),
('Data Scientist'),
('Machine Learning Engineer'),
('Automation Engineer'),
('Virtual Reality Engineer'),
('Augmented Reality Developer'),
('Embedded Systems Developer'),
('IoT Engineer'),
('Embedded Software Engineer'),
('Firmware Developer'),
('Systems Engineer'),
('Web Application Developer'),
('Database Engineer'),
('Database Administrator'),
('Game Developer'),
('Network Engineer'),
('Network Security Specialist'),
('Test Automation Engineer'),
('Software Quality Analyst'),
('Mobile Application Developer'),
('Cloud Infrastructure Engineer'),
('Linux System Administrator'),
('Document Management Specialist')
;
```

Ahora debes saber que la ruta para alojar el directorio del proyecto es : "C:\xampp\htdocs". Crea un directorio vacío con el nombre de "SOPOMA", más adelante clonarás el repositorio en él.

Esto se debe a que al levantar el servidor sólo se ven los servicios de ese directorio (  XAMPP está configurado para que el servidor web local (generalmente Apache) sirva los archivos desde el directorio "htdocs" por defecto. Esto significa que cuando accedes a "http://localhost" en tu navegador, Apache buscará los archivos en "htdocs" y los servirá. Por lo tanto, poner tus archivos en este directorio facilita el acceso a tu proyecto a través de "localhost" ).

Ahora siempre que actives Apache y MySQL, y tengas el directorio con el proyecto en la ruta correcta podrás buscar "localhost/<NOMBRE_DE_TU_DIRECTORIO>" para ver tu proyecto.

Puedes insertar tuplas directamente desde "phpMyAdmin", sin embargo recuerda que si insertas en el campo "password" 123, al insertarlo desde la aplicación la contraseña se encripta y desencripta. Mejor insertar las cosas desde la misma aplicación (SOPOMA).

> [!WARNING]
> <h2 style="color:red; font-weight:bold;">IMPORTANTE CTRL+F5 EN LA PÁGINA PARA ACTUALIZAR TODO EL CÓDIGO DE LA PÁGINA. Si sólo haces ctrl+s en el IDE puede no actualizarse la página por temas de caché del navegador.</h2>

## Para clonar el repositorio de GitHub en un directorio local, siga estos pasos:

<ul>
<li>Abra una terminal.</li>
<li>Navegue al directorio donde desea clonar el repositorio.</li>
<li>Ejecute el siguiente comando:</li>
</ul>

```
git clone https://github.com/JuanmiAcosta/PracticaDDSI-OSM.git
```

Esto creará un nuevo directorio con el nombre del repositorio.
<ul>
<li>Cambie al directorio del repositorio clonado.</li>
<li>Ejecute el siguiente comando para inicializar el repositorio local:</li>
</ul>

```
git init
```

Agregue todos los archivos del repositorio al área de preparación:

```
git add .
```

Realice un commit de los cambios:

```
git commit -m "Primer commit de <NOMBRE>"
```

Añada el repositorio remoto:

```
git remote add origin https://github.com/JuanmiAcosta/PracticaDDSI-OSM.git
```

Ejecute el siguiente comando para clonar el historial de commits del repositorio remoto:

```
git pull origin main --allow-unrelated-histories
```

Esto es necesario si el repositorio remoto tiene un historial de commits diferente al repositorio local.


Una vez que haya completado estos pasos, tendrá una copia completa del repositorio de GitHub en su directorio local. Puede realizar cambios en el repositorio local y luego enviar esos cambios al repositorio remoto ejecutando los comandos git add, git commit y git push.
