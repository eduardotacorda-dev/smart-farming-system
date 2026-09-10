# Migrations and Seeds

Every schema change requires a Laravel migration. Typical commands are `php artisan make:model Farm -m` and `php artisan make:migration create_sensor_readings_table`.

Run migrations with `php artisan migrate`; use `php artisan migrate:rollback` only in development. Use seeders for roles, permissions, reference data, and controlled demo data. Run them with `php artisan db:seed`.

`php artisan migrate:fresh --seed` is for local/test environments only. Never use `migrate:fresh` or `db:wipe` in production. Use a dedicated simulator/generator for high-volume demo data.

Before shipping, review ordering, foreign keys, indexes, uniqueness, nullability, rollback behavior, repeatability, and production safety.
