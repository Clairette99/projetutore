j utilise ici xamp
    commande pour installer laravel "composer global  require "laravel/installer"
    commande pour creer un projet avec composer "composer create-projet laravel/laravel "nameProjet"
                                                composer require laravel/jetstream
                                                 php artisan jetstream:install livewire --teams
    je configure mon .env
        composer require filament/filament
        php artisan filament:upgrade
        php artisan make:filament-user ensuite on configure
        php artisan vendor:publish --tag=filament-config
        php artisan vendor:publish --tag=filament-translation

        une fois fait je configure filament  en allant sur config -> filament -> j active le dark en mettant true - ensuite sur le footer mettre sur false

bon entrons maintenant dans le code ces code c est pour les permission
    composer require spatie/laravel-permission 
    php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
    php artisan make:migration add_is_to_users_table
    php artisan make:seeder RolesAndPermissionsSeeder
        dans le seeder au niveau du rolesandpermissions ajoute 
            // Reset cached roles and permissions
            app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();  ici nous avons des modifications a apporter
            au niveau du databaseseeder il y a des champs a remplir
    php artisan migrate:fresh  php artisan db:seed --class=Userstableseeder


php artisan make:filament-resource Permission --simple
php artisan make:filament-resource Role
php artisan make:filament-relation-manager RoleResource Permissions name
        
    