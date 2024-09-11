<?php

// Executar 'php artisan install:api' para criar este arquivo

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/validate-token', [AuthController::class, 'validateToken']);

    // Minhas rotas
    Route::get('/users', [AuthController::class, 'index']);
    Route::post('/users/{user}/roles', [AuthController::class, 'addRole'])->name('users.add-role');
    Route::delete('/users/{user}/roles', [AuthController::class, 'removeRole'])->name('users.add-role');

    /**
     * Aqui estão as rotas customizadas
     * Preferencialmente devem ficar antes da apiResource para evitar conflitos
     */
    Route::get('/events/{event}/speakers', [EventController::class, 'speakers'])->name('events.speakers');
    Route::post('/events/{event}/speakers', [EventController::class, 'addSpeaker'])->name('events.add-speaker');
    Route::delete('/events/{event}/speakers', [EventController::class, 'removeSpeaker'])->name('events.remove-speaker');
    Route::get('/events/{event}/participants', [EventController::class, 'participants'])->name('events.participants');
    Route::post('/events/{event}/participants', [EventController::class, 'addParticipant'])->name('events.add-participant');
    Route::delete('/events/{event}/participants', [EventController::class, 'removeParticipant'])->name('events.remove-participant');
    /**
     * O Controller precisa ser criado com a opção --resource
     * Essa função disponibiliza automaticamente as rotas:
     * index
     * show
     * create (Quando views estão presentes)
     * store
     * edit (Quando views estão presentes)
     * update
     * destroy
     */
    Route::apiResource('events', EventController::class);
});
