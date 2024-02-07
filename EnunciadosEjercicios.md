Instrucciones 

1.-Crear una carpeta llamada ejerciciosPHP

2.-Para cada ejercicio crearemos una carpeta para su contexto, es decir archivos php, html, css, etc.



Ejercicio 1. Tablas de multiplicar.
Realizar usando bucles definidos e indefinidos el código necesario para ...

Crear en un array indexado de 0 a 10 otro array con los valores de la tabla de multiplicar.

Una vez creado el array.  Usando el bucle foreach de php mostrar el resultado creando una tabla HTML para cada número de 0 a 10.

Ejercicio 2. Superglobals
Usando el bucle foreach mostrar las claves y los valores de las variables superglobales $_SERVER y $_ENV

EJERCICIO 3: FUNCIÓN POTENCIA
Escribe una función PHP en un  archivo llamado externo.php ,que reciba dos parámetros (A y B) y devuelva el valor de la potencia de A elevado a B (AB).

Escribe también un archivo index.php que haga uso de esa función para calcular potencias obtenidas de dos campos de un formulario.


Ejercicio 4: Devolución de arrays en funciones
Escribe un programa PHP que pida cinco números al usuario mediante un formulario y los guarde en un array.

Luego debe llamar a una función que debe crear pasándole el array como parámetro, y la función calculará cuál de los cinco números es el mayor, cuál el menor y cuánto vale la media, devolviendo esos tres valores en otro array asociativo.

Por último, se mostrarán en la pantalla el mayor, el menor y la media.

Ejercicio 5: Creando y guardando datos en un archivo de texto
Confeccionar un programita en PHP que permita hacer el pedido de pizzas via internet. El formulario debe ser:

Nombre: [……………]

Direccion: [……………] 

Jamon y queso [x]  Cantidad […..] 

Napolitana [x] Cantidad […..]

Mozzarella [x] Cantidad […..]

[Confirmar] 

Para el ingreso del nombre, direccion y cantidad de pizzas de cada tipo disponer objetos de la clase “text”. Disponer tres objetos de tipo “check” para seleccionar los tipos de pizzas. Por ultimo disponer un boton para el envio de datos: “submit”. 

Grabar en un archivo de texto cada pedido en una línea distinta añadiendo como primer campo la fecha y hora, separando cada campo por un  punto y coma(;)(Usar como nombre de archivo“datos.txt”).

Ejercicio 6 Lectura y maquetación  en tabla de un archivo de texto.
Dentro de la carpeta del anterior ejercicio, cree un archivo llamado listadoPedidos.php que muestre todos los pedidos que contiene  el archivo de pedido de pizzas anteriormente creado. (Obligatoriamente dar el nombre de archivo de texto como “datos.txt”).

Debe mostrar cada pedido como una fila de una tabla, y cada campo del pedido en una celda distinta.

Ejercicio 7. Sistema de almacenamiento de imágenes en un servidor.
El ejercicio consiste en crear un archivo php que:
1.- Tener un formulario que permita subir archivos de tipo imagen. (jpg o png) con  tamaño máximo de 1 MB a la carpeta imagenes. 
2.- En la misma página, mostrar todas las imágenes en una tabla  de tres columnas siendo a su vez enlaces a los archivos subidos. (ajustar el ancho y el alto mediante propiedades css para que quepan).

Ejercicio 8 POO en PHP
En un archivo llamado persona.php , crea una clase Persona con los siguientes atributos: nombre, apellidos y edad.

* Crea su constructor, métodos  get y set.

* Crea las siguientes funciones como métodos públicos:
– mayorEdad: indica si es o no mayor de edad.
– nombreCompleto: devuelve el nombre mas apellidos

Desde un index.php

Crea dos instancias de persona, una que sea mayor de edad y la otra que sea menor y comprueba el resultado de usar esos métodos.

Ejercicio 9. Biblioteca.1.0
Iremos creando la interacción completa con una pequeña aplicación web para la gestión de una biblioteca.  Desgranaremos esta aplicación en pequeños ejercicios. Iremos completándola en distintas versiones hasta llegar a una final.

La aplicación trabajará con una base de datos compuesta de solo dos tablas : libros y autores.

libros: PK(idLibro),Título, género(Narrativa, Lírica, Teatro, Científico-Técnico), FK(idAutor),  número de páginas, número de ejemplares en biblioteca.

autores: PK(idAutor), Nombre, Apellidos, País

Esta aplicación nos permitirá, en principio, ver la lista de todos los libros disponibles, así como dar de alta libros nuevos y modificar o borrar los libros existentes. De momento no trabajaremos con los autores, pero sería fácil extenderla para que también nos dejase hacer altas, bajas y modificaciones de los autores.

9.1 Creación de la clase libros y de la clase autores
Crearemos dos clases que permitirán interaccionar con las tablas de la base de datos.
* Los constructores tendrán un conector con BD y un nombre de una tabla con la interaccionaremos.
* Podremos : Insertar, Actualizar, Borrar, ConsultarTodo y Consultar por campos.

9.2. Creación de los formularios de actuaciones
Crearemos distintos archivos y formularios  para poder  realizar las siguientes acciones.

La inicial (index) será una presentación y un menú con las acciones a desarrollar en otras páginas.

* Insertar nuevo libro.

* Listar libros. (nos podrá llevar a borrar y a actualizar)

* Buscar libros (nos podrá llevar a borrar y a actualizar)

* Borrar libro

* Actualizar libro.

Ejercicio 10. Simón Dice con variables de session.
“Simon dice” es un clásico juego de memoria que consiste en componer secuencias de cuatro colores cada vez más largas, y el jugador tiene que recordarlas y reproducirlas. Puedes encontrar muchas versiones de Simon en internet.

Nosotros vamos a construir una versión simplificada que muestre secuencias de números (aunque podríamos hacerlo con colores sólo complicándolo un poco).

El programa mostrará un número entre 1 y 4 durante un instante, y luego borrará la pantalla y pedirá al usuario que lo repita. Después mostrará dos números aleatorios entre 1 y 4 (por ejemplo, 3 – 1), y luego el usuario los tendrá que repetir, y así hasta que el usuario falle al introducir los números.

Ejercicio 11. Modificar Ejercicio 10 para hacer uso cookies


Ejercicio 12. Modificar Biblioteca para la gestión de usuarios y autenticación.
Este ejercicio se basará en realizar las modificaciones correspondientes para que:

 La aplicación de biblioteca que teníamos en los ejercicios de la unidad anterior tenga incorporado lo siguiente

* El sistema pueda gestionar la autenticación de usuarios de la AW asignando roles y protegiendo el acceso.

* Gestión completa de los usuarios del sistema ( basada en tres roles: 'administrador', 'bibliotecario' y 'registrado')

El rol administrador podrá: Gestionar usuarios. (Crear, eliminar y modificar sus dados).

El rol bibliotecario podrá: gestionar los libros  y los autores

El rol registrado accederá y podrá consultar libros.

Todos los roles podrán gestionar su perfil y modificar generales como Nombre, Apellidos, Avatar .... (no el rol) y cambiar su password de acceso.

Ejercicio Final (opcional)
Considerando dónde ya hemos llegado con nuestra aplicación de gestión de biblioteca. Podríamos realizar las siguientes mejoras para su puesta en marcha.

1.- Crear una tabla denominada préstamos para relacionar los usuarios del sistema con libros -
Tendremos que un préstamo estará definido por.
* Un usuario, un libro, una fecha de entrega, una fecha de devolución.
* Sólo los roles bibliotecario y admin podrán realizar prestamos y devoluciones.
* Cada vez que se realice un préstamo disminuirá el número de ejemplares del libro que prestemos.
* Cada vez que se realice una devolución, se incrementará el número de ejemplares.
Vistas: Creación de préstamos, Edición y devolución de los mismos, Listado de préstamos, búsqueda por cualquiera de sus campos.

2.- Permitir la autenticación en el sistema para usuarios registrados mediante el proceso de OAuth del servicio de Google.
