<?php

declare(strict_types=1);

require __DIR__ . "/../vendor/autoload.php";

use App\Models\Book;
use App\Models\Library;
use App\Core\Route;
use App\Core\Router;
use App\Core\DB;

$config = require __DIR__ . "/../src/config/db-connection.php";

try {
    $pdo = new \PDO($config['dsn'], $config['username'], $config['password'], [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    echo "We connected";
} catch (Exception $e) {
    echo "Something went wrong... {$e->getMessage()}";
}

$db = new DB($pdo);
Route::get("/", [\App\Controllers\LibraryController::class, 'index']);
Route::get("/add", [\App\Controllers\LibraryController::class, 'addForm']);
Route::post("/store", [\App\Controllers\LibraryController::class, 'store']);
Route::get("/delete", [\App\Controllers\LibraryController::class, 'delete']);
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];
$library = new Library($db);
$router = new Router(Route::getRoutes(), $library);
$router->dispatch($uri, $method);
