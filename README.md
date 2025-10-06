# Prueba Técnica LG

Este proyecto es una aplicación web que consiste en un landing page con un formulario de registro que se conecta a una base de datos MySQL a través de una API en PHP.

## Estructura del Proyecto

- `/api` - Contiene los archivos del backend (PHP)
  - `db.php` - Configuración de la conexión a la base de datos
  - `registro.php` - Endpoint para el registro de usuarios
- `/landing` - Contiene los archivos del frontend
  - `index.html` - Página principal
  - `/css` - Estilos CSS
  - `/js` - Código JavaScript
  - `/assets` - Imágenes y otros recursos estáticos

## Requisitos Previos

- Servidor web (Apache, Nginx, etc.)
- PHP 7.0 o superior
- MySQL 5.7 o superior
- Navegador web moderno

## Instalación

1. Clona el repositorio en el directorio de tu servidor web:
   ```bash
   git clone [URL_DEL_REPOSITORIO] /ruta/de/tu/servidor
   ```

2. Crea una base de datos MySQL para el proyecto.

3. Configura la conexión a la base de datos editando el archivo `/api/db.php` con tus credenciales:
   ```php
   $db_host = 'localhost';     // Servidor de la base de datos
   $db_user = 'usuario';       // Usuario de la base de datos
   $db_pass = 'contraseña';    // Contraseña del usuario
   $db_name = 'nombre_bd';     // Nombre de la base de datos
   ```

## Pruebas

### Pruebas del Frontend

1. Abre el archivo `landing/index.html` en tu navegador web o accede a través de tu servidor local.
2. Verifica que la página se cargue correctamente y que todos los elementos se muestren como se espera.
3. Prueba el formulario de registro:
   - Intenta enviar el formulario vacío para verificar las validaciones del lado del cliente.
   - Prueba con un correo electrónico inválido.
   - Completa el formulario con datos válidos y envíalo.
   - Verifica que se muestre un mensaje de éxito después del envío.

### Pruebas del Backend

1. Verifica que los endpoints de la API funcionen correctamente:
   - Realiza una petición POST a `api/registro.php` con los siguientes datos:
     ```json
     {
         "nombre": "Usuario de Prueba",
         "email": "test@example.com",
         "password": "PASS.123",
         "fecha_nacimiento": "1990-01-01"
     }
     ```
   - Verifica que recibas una respuesta exitosa (código 200) con un mensaje de confirmación.
   - Intenta registrar el mismo correo electrónico dos veces para verificar la validación de correo único.

### Pruebas de Base de Datos

1. Verifica que los datos se guarden correctamente en la base de datos:
   ```sql
   SELECT * FROM usuarios;
   ```
   Deberías ver los registros de las pruebas realizadas.

2. Verifica las restricciones de la base de datos:
   - Intenta insertar un registro con un correo electrónico ya existente.
   - Verifica que los campos obligatorios no acepten valores nulos.

## Solución de Problemas

- Si el formulario no se envía, verifica la consola del navegador (F12) para ver si hay errores de JavaScript.
- Si la API no responde, verifica que el servidor web esté funcionando correctamente y que los permisos de los archivos sean los adecuados.
- Si hay problemas con la base de datos, verifica las credenciales en `db.php` y que la base de datos exista.
