<?php
use App\Http\Controllers\Api\TicketController;

Route::apiResource('tickets', TicketController::class);