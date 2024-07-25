<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Laravel 11 Bootcamp

This demo project is created using the Laravel Bootcamp guide as a start,  
enhanced with some extra added functionality and packages.  

Check out the extra created Post model for a full CRUD example with soft-deletes:  
A model, a resource controller with two form requests, an observer for event listening, a policy for authorization and four blade views. 

There are factories for all the models and a basic database seeder with fake data.  
Extra environment variables are created for an easy login after a database refresh during local development. (used in database.php)  
You can change the .env variables to your personal needs, or just keep the defaults for quick login.    
ADMIN_USER_NAME="My Name"   
ADMIN_USER_MAIL="my.name@example.com"   
ADMIN_USER_PASS=password   

php artisan migrate:fresh --seed

## Chirper with Blade

[Laravel Bootcamp](https://bootcamp.laravel.com/blade/installation)

php artisan queue:work

## OPcodes's Log Viewer

Fast and beautiful Log Viewer for Laravel.  
GitHub: https://github.com/opcodesio/log-viewer

php artisan log-viewer:publish  
php artisan vendor:publish --tag="log-viewer-config"  

## About Laravel
Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.


### License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
