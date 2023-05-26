# Piterflix
## Proyecto de streaming con Laravel

Página web de visualización de productos audiovisuales en streaming.

<br/>

## Arrancar la página

email: admin@admin.com  
password: password

Una vez que ejecutemos las migrations y los seeders se cargarán la base de datos con todo el contenido necesario. La mayor parte de ese contenido es contenido real extraído de una API, otro contenido como la asignación de productoras, directores o intérpretes se realiza de manera aleatoria para ejemplificar el funcionamiento de la página.

**Administrador**
Los seeders crearán un total de 6 cuentas. Cada una de estas cuentas tiene un email y una contraseña para acceder a la base de datos.

* La contraseña para TODAS las cuentas generadas por el seeder es _password_, la contraseña está hasheada así que en la base de datos aparecerá encriptada.
* Las cuentas son las que están o no autenticadas. Cada cuenta puede tener más de un usuario. Los seeders crearán un total de 19 usuarios, 3 para cada cuenta más un usuario extra para la primera cuenta que se diferenciará del resto de usuarios porque tendrá asignado el rol de Admin.
* Al logearse automáticamente se guardará el primer usuario de la cuenta en sesión como "_current_user_". Al logearnos la página nos llevará a una vista en la que deberemos elegir con qué usuario de esa cuenta queremos entrar y en ese momento se reasignará el "_current_user_" por aquel que hayamos elegido.
* Para acceder como administrador deberemos acceder con el correo "_admin@admin.com_" y la contraseña _password_. En ese momento el usuario Administrador ya será el "_current_user_" de la sesión actual pero si elegimos otro usuario dentro de la misma cuenta, dejaremos de ser un usuario administrado.
* Una vez que accedemos y elegimos usuario nos llevará a nuestra vista de perfil de usuario donde podremos cambiar algunos datos del usuario como el avator o el nombre.
* Una vez hayamos accedido con nuestra cuenta autenticada veremos en la parte superior derecha de la pantalla que se ha generado un desplegable donde antes estaban los botones de "entrar" y "suscribirse".

## Mi cuenta

En el desplegable podremos acceder a nuestro perfil de usuario o a nuestra cuenta. Todos los usuarios de una cuenta tienen el mismo rol y cualquiera de ellos puede crear nuevos usuarios (hasta un máximo de 4), eliminar usuario, acceder al perfil de otros usuario, cambiar la contraseña de la cuenta y eliminar la cuenta.

## Acceder al panel de administrador

Si hemos accedido con la cuenta de administrador y como usuario administrador, en el desplegable que sale en la esquina superior derecha, al lado del formulario de búsqueda, veremos que tenemos una opción que pone **Panel de administrador**. Desde ahí podremos acceder a la interfaz del administrador.

## Suscripción de un nuevo usuario

En la vista de suscripción veremos un formulario que validará:
 * Que la contraseña sea de un formato correcto (tiene que tener letras y números)  
 * Que el usuario con el que se inicia la cuenta sea mayor de edad  
 * Que el email que se intenta registrar no esté en uso  
 * Que estén todos los campos rellenados

 El formulario también nos ará elegir entre un plan básico y otro prémium.

 Acto seguido no llevará a otro formulario que nos pedirá los datos de pago. Estos pueden ser con una tarjeta de crédito, con paypal o con un cupón de suscripción. En la base de datos se registrará en numero de cuenta si ese ha sido el método de pago elegido.

 Con los datos recogidos en estos dos formularios se creará:

 * La cuenta
 * El primer usuario de la cuenta con el nombre de usuario elegido y la fecha de nacimiento. El usuario deberá cambiar su avatar en su perfil.

## ¿Qué muestran las vistas?

* **Principal:** muestra una selección aleatoria de medias, tanto películas como series dividida por géneros.
* **Películas:** muestra todas las medias de la base de datos que tiene como tipo "película".
* **Series:** muestra todas las medias de la base de datos que tiene como tipo "serie".
* **Recomendados:** muestra una lista de un máximo de 10 películas que las extrae haciendo una selección de las medias con aquellos géneros que más se repiten en la base de datos para ese usuario ("current_user"). Para hacer la selección tiene en cuenta las descargas del usuario, las reproducciones y los favoritos. Selecciona los 3 generos que más se repiten y muestra en la vista aquellas medias de esos géneros que el usuario todavía no tiene entre sus descargas, reproducciones ni favoritos. En caso de que la vista esté totalmente vacía (usuarios recientes o poco activos), se genera una vista aleatoria de 10 medias.
* **Novedades:** muestra las últimas medias incluídas en la base de datos.
* **Próximamente:** muestra las medias cuya fecha de lanzamiento es más reciente incluso cuando aún no se haya alcanzado esa fecha. De esta manera si hay películas que están por salir al mercado pero que se encuentran en la base de datos las mostrará las primeras.

## Wireframes
<br/>

- **Inicio**

    <image src="./documentacion/netflixClon.drawio.png" width="75%" height="75%">
    
<br/><br/><br/>

- **Peliculas/Series/Novedades/Recomendados**

    <image src="./documentacion/listaNetflixClon.drawio.png" width="75%" height="75%">
<br/><br/><br/>

- **Registro**  

    <image src="./documentacion/registroNetflixClon.drawio.png" width="75%" height="75%">
<br/><br/><br/>

- **Pago**  

    <image src="./documentacion/pagoNetflixClon.drawio.png" width="75%" height="75%">
<br/><br/><br/>

- **Login**  

    <image src="./documentacion/loginNetflixClon.drawio.png" width="75%" height="75%">
<br/><br/><br/>

- **Búsqueda**  

    <image src="./documentacion/busquedaNetflixClon.drawio.png" width="75%" height="75%">
<br/><br/><br/>

# Base de datos
<br/><br/>
<image src="./documentacion/piterflix_bbdd.drawio.png">
<br/><br/><br/>

