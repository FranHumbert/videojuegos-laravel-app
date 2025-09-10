<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Videojuegos & Consolas 

Aplicación web en Laravel para gestionar una colección personal de videojuegos y plataformas de gaming.

## ¿Qué hace?

- Crear, ver, editar y eliminar **videojuegos**
- Crear, ver, editar y eliminar **plataformas** (consolas)
- Relacionar videojuegos con múltiples plataformas
- Ver estadísticas en el dashboard principal

## Instalación

### Requisitos
- PHP 8.2+
- MySQL 8.0
- Composer

### Pasos

1. **Clonar proyecto**
git clone https://github.com/FranHumbert/videojuegos-laravel-app
cd videojuegos-app


2. **Instalar dependencias**
composer install

3. **Configurar entorno**
cp .env.example .env
php artisan key:generate

4. **Configurar base de datos**

Editar archivo `.env`:

DB_DATABASE=videojuegos_db

DB_USERNAME=root

DB_PASSWORD=

5. **Crear base de datos y tablas**
En MySQL crear: CREATE DATABASE videojuegos_db;
php artisan migrate

6. **Ejecutar aplicación**
php artisan serve

Ir a: `http://localhost:8000`

## Estructura

├── app/Models/ # Videojuego, Plataforma

├── app/Http/Controllers/ # Controladores CRUD

├── database/migrations/ # Tablas de base de datos

├── resources/views/ # Páginas web

└── routes/web.php # Rutas de la aplicación

## Tecnologías

- **Laravel 12** - Framework PHP
- **MySQL** - Base de datos
- **Bootstrap 5** - Diseño responsive
- **Blade** - Plantillas HTML

## Base de Datos

- **videojuegos**: título, género, año de lanzamiento
- **plataformas**: nombre, fabricante  
- **videojuego_plataforma**: relación muchos a muchos

## Comandos Útiles

Ver rutas
php artisan route:list

Limpiar caché
php artisan cache:clear

Estado migraciones
php artisan migrate:status

## Autor

Francesc Humbert - [GitHub](https://github.com/FranHumbert)
