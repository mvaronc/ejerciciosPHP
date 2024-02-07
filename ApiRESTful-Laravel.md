# Creación del api Restful para el ejercicio api modelos.
Teniendo como base nuestra tabla de modelos de coches, donde teníamos el id, el nombre, la marca y el año. 

Crearemos un API RESTful para esta tabla.

Pasos a seguir:

1.- Creamos la migración para nuestra tabla,

2.-Creamos su modelo, su controlador y sus rutas.

3.-Comprobamos su funcionamiento.

## Resolución del ejercicio
* Creando el entorno sail de docker para trabajar en Laravel.

    - _$curl -s https://laravel.build/apimodelos | bash_
    - _$cd apimodelos_
    - _$./vendor/bin/sail up_

* Creando nuestra migración de datos para la tabla carmodels
    - _ ./vendor/bin/sail artisan make:migration create_carmodels_table
    - Ahora en nuestro editor de código rellenamos el método up de la migración creada
    <pre>
            Schema::create('models', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('brand');
            $table->year('year');
            $table->timestamps();
        }); 
    </pre>
    - Ejecutamos la migración y comprobamos que se ha creado nuestra tabla y sus campos.
    <pre>
    $./vendor/bin/sail artisan migrate
    </pre>

* Creando nuestro modelo
<pre>
$ ./vendor/bin/sail artisan make:model CarModel
</pre>

* Creando nuestro controlador de tipo api
<pre>
$ ./vendor/bin/sail artisan make:controller CarModelController --api
</pre>

* Añadimos las entradas en las rutas dentro del archivo **api.php**,comentando la petición de autenticación con token.<br> _Si lo hacemos en web.php, Las acciones store,update y delete no nos funcionan porque se implementa el mecanismo de seguridad para csrf(__Cross-site request forgery__)_ 
<code>
Route::apiResource('carmodels', 'App\Http\Controllers\CarModelController');
</code>

* Finalmente programaremos las respuestas a los métodos de nuestro controlador, index,show...
* La interacción desde software de prueba de api será localhost/api/carmodels
