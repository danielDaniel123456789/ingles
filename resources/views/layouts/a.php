

**********************************************************
composer create-project laravel/laravel:^8.0 nombreProyecto
.env -->insertar el nombre db
autenticacion-->composer require laravel/ui --dev
-->php artisan ui vue --auth
-->npm install -->npm run dev -->php artisan migrate
************************************************************************
****FULL ALL --> php artisan make:model Vervo --all --api
***PIVOTE ORDEN ALFABETICO (_) SINGULAR
***PIVOTE-->php artisan make:migration category_product_table --create=category_product
--> php artisan db:seed
--> php artisan migrate:fresh
--> php artisan migrate:refresh --seeder
--> php artisan migrate:rollback 1
-> php artisan migrate:rollback --step=5
--> -->php artisan passport:install

************************************************************************
extraer un unico valor desde controler laravel
   return data[0]->id;
************************************************************************
sumar filas>>
 views = Aprendida::where('user_id', this->idUser())->get()->sum('aprendida'); 
ROUTE API:
use App\Http\Controllers\NombreController;
Route::resource('posts', NombreController::class);

use App\Http\Controllers\VervosController;
Route::post('formExamen', [VervosController::class, 'formExamen'])->name('formExamen');
Route::get('formExamen', [VervosController::class, 'formExamen'])->name('formExamen');


************************************************************************
devuelve en la terminal los route ordenados:
install-->composer require wulfheart/pretty_routes
obtener lista-->php artisan route:pretty
