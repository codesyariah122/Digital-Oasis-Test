cd soal-5-crud
php artisan db:create
php artisan migrate
php artisan db:seed --class=EmployeeSeeder
php artisan storage:link
php artisan serve