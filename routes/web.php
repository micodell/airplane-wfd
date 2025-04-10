<?php

use App\Http\Controllers\FlightController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/flights', [FlightController::class, 'index'])->name('flights.index');

Route::get('/flights/ticket/{id}', [TicketController::class, 'show'])->name('tickets.show');
Route::get('/flights/book/{id}', [TicketController::class, 'create'])->name('tickets.create');
Route::post('/ticket/submit/', [TicketController::class, 'store'])->name('tickets.store');
Route::put('/ticket/board/{id}', [TicketController::class, 'update'])->name('tickets.update');
Route::delete('/ticket/delete/{id}', [TicketController::class, 'destroy'])->name('tickets.destroy');
