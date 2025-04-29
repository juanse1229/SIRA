Instalación del Proyecto
Requisitos Previos
Antes de comenzar, asegúrate de tener instalados los siguientes programas:

XAMPP compatible con PHP 8.2.

Symfony CLI.

Composer.

Pasos de Instalación
1. Instalar XAMPP
Descarga e instala XAMPP asegurándote de que incluya PHP 8.2.

Ejecuta XAMPP y verifica que los puertos de Apache y MySQL estén correctamente configurados.

Nota: Si algún puerto está ocupado, realiza los ajustes necesarios.

Asegúrate de que Apache y MySQL puedan iniciarse sin problemas.

2. Instalar Symfony CLI
Abre PowerShell en modo administrador.

Sigue las instrucciones oficiales de Symfony para instalar el CLI:

Puedes encontrar el paso a paso en la documentación oficial.

3. Instalar Composer
Descarga e instala Composer desde su página oficial.

Durante la instalación, Composer te pedirá que selecciones el ejecutable de PHP:

Selecciona el PHP que está dentro de la carpeta donde instalaste XAMPP (por ejemplo, C:\xampp\php\php.exe).

4. Configurar el Entorno del Proyecto
Descarga el proyecto y colócalo dentro de la carpeta htdocs de XAMPP (por ejemplo: C:\xampp\htdocs\).

5. Instalar las Dependencias del Proyecto
Abre Visual Studio Code y carga la carpeta del proyecto.

Abre una terminal:

Puedes hacerlo desde el menú Terminal > Nueva Terminal o con el atajo Ctrl + Ñ (en teclado en español).

En la terminal, ejecuta:

bash
Copiar
Editar
composer install
Esto instalará todas las dependencias necesarias del proyecto.

6. Configurar el Archivo .env
Abre el archivo .env ubicado en la raíz del proyecto.

Revisa y actualiza la configuración de conexión a la base de datos, especialmente el puerto de MySQL.

Por defecto, MySQL usa el puerto 3306.

Si en tu instalación de XAMPP el puerto es diferente (por ejemplo, 3307), actualízalo en la línea correspondiente del .env.

Ejemplo de la línea a modificar:

ini
Copiar
Editar
DATABASE_URL="mysql://usuario:contraseña@127.0.0.1:3307/nombre_base_datos"
7. Crear la Base de Datos
Inicia Apache y MySQL desde el panel de control de XAMPP.

Accede a phpMyAdmin (http://localhost/phpmyadmin).

Crea una nueva base de datos llamada:

nginx
Copiar
Editar
subject_organizer
Luego, usa la opción Importar para cargar el archivo .sql proporcionado con el proyecto. Esto creará las tablas necesarias con datos de prueba.

8. Iniciar el Servidor de Desarrollo
Con la terminal abierta en Visual Studio Code, ejecuta el siguiente comando:

bash
Copiar
Editar
symfony server:start
Esto levantará el servidor local de Symfony.

9. Acceder a la Plataforma
Abre tu navegador y entra a:

arduino
Copiar
Editar
http://localhost:8000
Deberías ver la página principal del proyecto funcionando.
