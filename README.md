# PracticaDDSI-OSM
Desarrollo en grupo (Los Pollos Hermanos) de un SI. Pretende ser en primera instancia un Marketplace para proyectos de software libre en el que los usuarios colaboradores participaran en ellos de diversas maneras a escoger.

## Para clonar un repositorio de GitHub en un directorio local, siga estos pasos:

<ul>
<li>Abra una terminal.</li>
<li>Navegue al directorio donde desea clonar el repositorio.</li>
<li>Ejecute el siguiente comando:</li>
</ul>

```
git clone <URL_DEL_REPOSITORIO>
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

Ejecute el siguiente comando para enviar los cambios al repositorio remoto:

```
git push -u origin main
```

Esto creará una nueva rama remota llamada main y enviará los cambios locales a esa rama.

Una vez que haya completado estos pasos, tendrá una copia completa del repositorio de GitHub en su directorio local. Puede realizar cambios en el repositorio local y luego enviar esos cambios al repositorio remoto ejecutando los comandos git add, git commit y git push.
