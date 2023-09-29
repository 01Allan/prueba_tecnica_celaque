# Prueba Técnica

## Instrucciones de uso

*Nota: Me tomé la libertad de subir mi proyecto a un hosting gratuito, dejo el link por si quieren probar la webapp:*

web: http://pruebatecnicaphp.kesug.com/?i=1

si no funciona el link, me lo hacen saber.

#### Si gusta probar la web de manera local siga los siguientes pasos:

Clone usando *git* este repositorio en alguna carpeta de su computadora, de la siguiente manera:

```
git clone https://github.com/01Allan/prueba_tecnica_celaque.git
```

La estructura del proyecto es la siguiente:

```
calculadora/
│
├── controllers/
│   ├── delete.php
│   └── edit.php
│
├── database/
│   └── tabla.sql
│
├── includes/
│   └── db.php
│
├── models/
│   └── calcular.php
│
├── views/
│   ├── footer.php
│   └── header.php
│
└── index.php

```

En primer lugar se crea la base de datos con MySQL, ya sea con phpMyAdmin o bien com MySQL WorkBench, en mi caso lo hice con MySQL WorkBench, haciendo lo siguiente:

* Ejecuto la siguiente query en MySQL WorkBench para crear un esquema llamado calc_data
  
```
CREATE SCHEMA calc_data

```

luego en la carpeta llamada database en este repositorio hay un archivo llamado tabla.sql con una query para crear una tabla llamada *prestamos*, la cual es la siguiente:

```
USE calc_data;
CREATE TABLE prestamos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    monto DECIMAL(10, 2) NOT NULL,
    tasa_anual DECIMAL(5, 2) NOT NULL,
    plazo_meses INT NOT NULL,
	cuota_mensual DECIMAL(10, 2) NOT NULL
);
```

Con esto ya se crea la tabla en donde almacenaremos nuestros datos.

Luego, si va a consumir el producto desde su servidor local, debe modificar los parámetros en el archivo *includes/db.php*, en mi caso está de la siguiente manera:

```
<?php 
    session_start();
    $conexion = mysqli_connect(
        'localhost',
        'root',
        'clave123.',
        'calc_data'
    );
?>
```

Tenga en cuenta que cada parámetro significa lo siguiente:

* 'localhost': Es el nombre del servidor de la base de datos. 
* 'root': Es el nombre de usuario de la base de datos. 
* 'clave123.': Es la contraseña del usuario de la base de datos, debe modificar este dato con la clave de *root* que estableció en su servidor local.
* 'calc_data': Es el nombre de la base de datos a la que se está conectando. 

Luego ya configurado esto, inicialice su servidor apache o el que sea de su preferencia. 
En su navegador vaya a la dirección:

```
localhost
```
En caso de que no tenga instalado Apache ni otro programa similar, pero si tiene instalado PHP en su ordenador, siga los siguientes pasos:

1. Ingrese a la carpeta contenedora del proyecto y vaya a la carpeta llamada *calculadora*.
2. Abra su terminal/simbolo del sistema de windows en la carpeta *calculadora*.
3. En el terminal escriba lo siguiente:
   ```
     php -S localhost:8000
   ```
Le aparecerá en su terminal lo siguiente:

![image](https://github.com/01Allan/prueba_tecnica_celaque/assets/92226659/eacb5399-87a0-420b-84ee-a09cbee74786)

4. En su navegador ingrese la dirección que aparece en la terminal:

```
http://localhost:8000
```
verá el proyecto en funcionamiento, cuya vista es la siguiente:

![image](https://github.com/01Allan/prueba_tecnica_celaque/assets/92226659/330e9569-5318-4574-8173-ad96f944cd41)

### Funciones del proyecto:

El proyecto en principio calcula la cuota mensual que una persona pagará por la obtención de un préstamo, usando la siguiente formula:

$$C = \frac{P \cdot r \cdot (1 + r)^n}{(1 + r)^n - 1}$$

Donde:

* $C$: Cuota mensual.

* $P$: Monto del préstamo.

* $r$: Tasa de interés mensual (tasa anual dividida por 12 y dividida por 100 para convertirla en decimal).

* $n$: Número de cuotas (plazo en meses).

Al llenar los datos del formulario, se agregan a una tabla llamada *Resultados*, su vista es la siguiente:

![image](https://github.com/01Allan/prueba_tecnica_celaque/assets/92226659/d61a0ba2-dd14-4771-98c9-121c88b7dbfc)

En dicha tabla se almacenan los siguientes datos:
* Monto ingresado
* Interes %
* Cuota Mensual, cuyo cálculo se hace con la formula presentada anteriormente. 
* Cantidad de meses que deberá pagar el préstamo.
* Acciones: En dicho campo hay dos opciones; una es editar, que lo llevará a otra página a editar los parámetros ingresados, como se muestra a continuación:
  
  ![image](https://github.com/01Allan/prueba_tecnica_celaque/assets/92226659/36b761d6-0134-4e40-8372-f633fbeb573a)

  Una vez actualizados los valores se muestra una alerta como la siguiente:
  
  ![image](https://github.com/01Allan/prueba_tecnica_celaque/assets/92226659/77cd0d15-a34f-4051-a65d-6b470afc20a9)
  
  Otra opción de la columna de acciones es la de borrar la fila de parámetros ingresados, como se muestra a continuación:
  
  ![image](https://github.com/01Allan/prueba_tecnica_celaque/assets/92226659/068d1834-fb39-42fd-b6c0-bb12b2e8a4ec)

  como puede observar que al igual cuando se editan los valores, lanza una alerta cuando se borra una fila de la tabla.

Puede experimentar las funcionalidades del proyecto usted mismo interactuando con él en su servidor local. 

Dejo algunos enlaces que pueden ser de su interés:
* Descarga de MySQL WorkBench: https://dev.mysql.com/downloads/workbench/
* Descarga del lenguaje PHP: https://www.php.net/downloads.php
  

