<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Api\UserController;

Route::post("/login", [AuthController::class, "Login"]); // ავტორიზაციის მარშუტი

Route::post("/register", [UserController::class, "Register"]); // რეგისტრაციის მარშუტი

?>