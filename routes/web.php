<?php

use Illuminate\Support\Facades\Route;

// routes/web.php

use App\Http\Controllers\ProductController;


// routes/web.php
Route::resource('products', ProductController::class);
