<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/event/create', [DashboardController::class, 'showEventForm'])->name('event.showForm');
    Route::post('/event/create', [DashboardController::class, 'createEvent'])->name('event.create');
    Route::put('/event/{event}', [DashboardController::class, 'updateEvent'])->name('event.update');
    Route::post('/event/edit/{event}', [DashboardController::class, 'deleteEvent'])->name('event.delete');
    Route::get('/event/{event}/edit', [DashboardController::class, 'editEvent'])->name('event.edit');


    Route::get('/event/{event}/live', [DashboardController::class, 'eventisOnline'])->name('event.live');


    Route::get('/event/{event}/ticket', [TicketController::class, 'createTicket'])->name('ticket.create');
    Route::put('/ticket/{ticket}', [TicketController::class, 'updateTicket'])->name('ticket.update');



});
