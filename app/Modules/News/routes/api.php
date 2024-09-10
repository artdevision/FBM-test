<?php
declare(strict_types=1);

use App\Modules\News\Http\Controllers\NewsApiController;
use Illuminate\Support\Facades\Route;

Route::middleware('api')
    ->prefix('api/news')
    ->group(function() {
        Route::get('/', NewsApiController::class);
    });
