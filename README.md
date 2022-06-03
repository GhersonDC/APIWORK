## LARAVEL start Auth Project 

## Crear archivo . env en carpeta principal

## configurar la base de datos

## Migrar tablas
php artisan migrate

## instalar passport dentro
php artisan passport:install


## Opcionales de Creacion de tabla de clientes
php artisan make:migration create_clients_table

## remigrar tablas ATENCION SOLO CORRER SI ES NECESARIO
php artisan migrate:refresh --seed
php artisan passport:install