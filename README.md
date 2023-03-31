<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

### Prerequisitos
- Composer^2.0.10
- Node^14.16
- MySql

## Instalación
- Ejecutar: composer install --ignore-platform-req=ext-oci8
- Copiar: el archivo .env_original y llamarlo .env en la raiz del proyecto (cp .env_original .env)
- Modificar variables del archivo .env de acuedo al ambiente
- Crear bases de datos y subir los respaldos de las bases de datos api.sql y crm.sql
- Ejecutar: npm install --force

## Ejecucion en ambiente de desarrollo
- Ejecutar en una consola: npm run watch
- Ejecutar en otra consola: php artisan serve
- Acceder a la ruta /test/peers o /index.php/test/peers dependiendo de su configuracion local para acceder a la opcion desarrollada

## Deployment
El deployment fue realizado en Heroku con:
- Basic dyno: para la aplicacion web
- JawsDB MySQL: para la base de datos

Todo en plan gratuito.
