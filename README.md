# AshenKeep - Vault Management System
AshenKeep is a vault management system being developed by Team InnoVentures

## Installation in codespace
docker context use default
curl -s https://laravel.build/AshenKeep | bash
cd AshenKeep
./vendor/bin/sail up
 
### Create new terminal
 
cd AshenKeep

./vendor/bin/sail artisan migrate

./vendor/bin/sail composer require laravel/jetstream

./vendor/bin/sail artisan jetstream:install livewire --dark

./vendor/bin/sail npm install

./vendor/bin/sail npm run build

./vendor/bin/sail artisan migrate

./vendor/bin/sail composer require spatie/laravel-permission 

./vendor/bin/sail artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider" 

./vendor/bin/sail artisan migrate

./vendor/bin/sail artisan make:seeder RolesSeeder

./vendor/bin/sail artisan make:seeder UserSeeder

### Copy all files (EXCEPT composer.json, composer.lock, permission.php, 2024_12_29_140602_create_permission_tables.php, admin-dashboard.blade.php) files in my commit from: https://github.com/jmmiyabe/AshenKeep/commit/4a28cf53ceb7ad94b764d99a995cbe1ac0734cda

./vendor/bin/sail artisan db:seed

### Test!!
### If successful login, update your branch

## Usage
./vendor/bin/sail up
