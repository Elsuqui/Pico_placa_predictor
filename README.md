# Pico placa predictor
Predictor to show if a car can be on the road or not.

## Tech
Pico and placa predictor use:
*[Laravel] - The PHP Framework for Web Artisans Laravel
*[Vue] - The Progressive JavaScript Framework
*[Composer] - A Dependency Manager for PHP
*[Node.js] - To manage dependencies

## Steps to execute project
### Clone project
Go to clone project or download zip file.

### Installation
First you need to install [composer](https://getcomposer.org/), and run the next commands inside the project:

```sh
composer install
cp env.example .env
php artisan key:generate
```

If you do not have a web server, so yo need to run

```sh
php artisan serve
```
to run a localhost web server like this: 127.0.0.1:8000 or localhost:8000

License
----

MIT
