<?php

// Executar 'php artisan install:api' para criar este arquivo

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/validate-token', [AuthController::class, 'validateToken']);
    Route::post('/add-role', [AuthController::class, 'addRole']);
    Route::post('/remove-role', [AuthController::class, 'removeRole']);

    // Minhas rotas
    Route::get('/users', [AuthController::class, 'index']);
    // Route::apiResource('categories', CategoryController::class);
    // Route::get('/posts/user/comment', [PostController::class, 'withUserComment'])->name('posts.withUserComment');
    // Route::get('/posts/{post}/comments', [PostController::class, 'showWithComments'])->name('posts.showWithComments');
    // Route::apiResource('posts', PostController::class);
    // Route::apiResource('comments', CommentController::class);
});
