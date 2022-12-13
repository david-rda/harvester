<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\LogoutController;

Route::post("/login", [AuthController::class, "Login"]); // ავტორიზაციის მარშუტი
Route::post("/register", [UserController::class, "Register"]); // რეგისტრაციის მარშუტი
Route::post("/logout", [LogoutController::class, "Logout"])->middleware("auth:api"); // სისტემიდან გამოსვლის მარშუტი

Route::group(["prefix" => "user", "middleware" => "auth:api"], function() {
    Route::get("/get/{id}", [UserController::class, "User_Get"])->where(["id" => "[0-9]+"]);
});

?>