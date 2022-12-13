<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AuthController;

Route::post("/login", [AuthController::class, "Login"]); // ავტორიზაციის მარშუტი

?>