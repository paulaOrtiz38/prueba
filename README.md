# prueba

proceso para instalar el proyecto

1. clone el repositorio prueba conservando este nombre
2. cree la base de datos 'cliente_cotizaciones'
3. ubiquese dentro de la carpeta laravel y cree el archivo .env con base de .env.example y en este nuevo archivo actualice la informacion de la base de datos
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=clientes_cotizaciones
        DB_USERNAME=root
3.1 en el .env configurar la cuenta de correo que se va utilizar para el envio de correos, actualmente se configuro una aplicacion mailtrap para probar el envio
        MAIL_MAILER=smtp
        MAIL_HOST=smtp.mailtrap.io
        MAIL_PORT=2525
        MAIL_USERNAME=b44762415fe8a9
        MAIL_PASSWORD=0f31129737176c
        MAIL_ENCRYPTION=tls

4. procesa a instalar el composer
5. corra el comando de migraciones
     php artisan migrate
   para los seeder 
     php artisan db:seed
**** si ocurre alguna novedad con los comando anteriores se adjunta un .sql con la estructura y datos basicos de la aplicacion

6. ubiquese dentro de la carpeta cliente e instale el npm, el amgular CLI y sus respectivos paquetes
   npm install --force



