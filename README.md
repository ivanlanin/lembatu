# Lembatu

Lembatu (lembar waktu) is a timesheet application build using laravel.

## Resources

- Schema http://laravel.com/docs/schema
- Migration http://laravel.com/docs/migrations

## Steps

### Project table

- Run `php artisan migrate:make create_projects --create=projects`
- Edit `xxx_create_projects.php` in `app/database/migrations`
- Run `php artisan migrate`
- Create `app/models/Project.php`
- Run `php artisan controller:make ProjectController`
- Add route in `app/routes.php`
