<?php 
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BackOfficeController;
use App\Http\Middleware\EnsureTokenIsValid;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    $title = "about";
    return view('about', compact('title'));
});

Route::get('/profile', function () {
    return view('profile', ['name' => 'Kob', 'age' => 40]);
});
Route::get('/params/{name}/{age}/{salary}', function ($name, $age, $salary) {
    return view('params', compact('name', 'age', 'salary'));
});

Route::get('/contact', function () {
    $name = 'Contact';
    $age = 20;
    $salary = 1000;
    return view('contact', compact('name', 'age', 'salary'));
});


Route::get('/post', function(){
    return view('post');
});

Route::post('/post', function(Request $request){
    $name = $request->name;
    return json_encode(['name' => $name]);  
});

Route::get('/home', function(){
    return view('home');
});

Route::get('/response', function(){
    return response()->json(['name' => 'Kob']);
});
Route::get('/products', function(){
    $products = [
        ['id' => 'Product 1', 'price' => 10],
        ['id' => 'Product 2', 'price' => 20],
        ['id' => 'Product 3', 'price' => 30]
    ];
    return response()->json(['products' => $products]);
});

Route::get('/response-type', function(){
    return response('Unauthorized', 401);
});

Route::get('/redirect', function(){      
    return redirect('/target');   
});

Route::get('/target', function(){
    return response()->json(['message' => 'Target']);
});

$customerController = CustomerController::class;
Route::get('/customers', [$customerController, 'list']);
Route::get('/customers/{id}', [$customerController, 'detail']);
Route::post('/customers', [$customerController, 'create']);
Route::put('/customers/{id}', [$customerController, 'update']);
Route::delete('/customers/{id}', [$customerController, 'delete']);

Route::get('/users/list', [UserController::class, 'list']);
Route::get('/users/form', [UserController::class, 'form']);
Route::post('/users', [UserController::class, 'create']);
Route::get('/users/{id}/edit', [UserController::class, 'edit']);
Route::put('/users/{id}', [UserController::class, 'update']);
Route::delete('/users/{id}', [UserController::class, 'remove']);

Route::get('/user/signIn', [UserController::class, 'signIn']);
Route::post('/user/signInProcess', [UserController::class, 'signInProcess']);
Route::get('/user/signOut', [UserController::class, 'signOut'])->middleware(EnsureTokenIsValid::class);
Route::get('/user/info', [UserController::class, 'info'])->middleware(EnsureTokenIsValid::class);

Route::get('/backoffice', [BackOfficeController::class, 'index'])->middleware(EnsureTokenIsValid::class);

Route::get('/product/list', [ProductController::class, 'list']);
Route::get('/product/form', [ProductController::class, 'form']);
Route::post('/product', [ProductController::class, 'save']);
Route::get('/product/{id}/edit', [ProductController::class, 'edit']);
Route::put('/product/{id}', [ProductController::class, 'update']);
Route::get('/product/remove/{id}', [ProductController::class, 'remove']);

?>