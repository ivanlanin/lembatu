# Lembatu

Lembatu (lembar waktu) is a timesheet application build using laravel.

## Resources

- Schema http://laravel.com/docs/schema
- Migration http://laravel.com/docs/migrations

## Lessons learned

- Routing
- Schema and migration
- Authentication
- Localization
- View & template
- Controller

## Steps

### Project table

- Run `php artisan migrate:make create_projects --create=projects`
- Edit `xxx_create_projects.php` in `app/database/migrations`
- Run `php artisan migrate`
- Create `app/models/Project.php`
- Run `php artisan controller:make ProjectController`
- Add route in `app/routes.php`

### Client table

- Run `php artisan migrate:make create_client --create=clients`
- Edit `app/database/migrations/xxx_create_client.php`
- Run `php artisan migrate`
- Edit `app/routes.php`
- Create `app/models/Client.php`
- Copy and edit `app/controller/ProjectController.php` into `app/controller/ClientController.php`
- Copy and edit `app/views/project` into `app/views/client`
- Create `app/lang/xx/client.php`
- Create `app/lang/xx/client.php`
