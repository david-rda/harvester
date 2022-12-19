<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\LogoutController;
use App\Http\Controllers\Api\PasswordController;
use App\Http\Controllers\Api\StatementController;

Route::post("/login", [AuthController::class, "Login"]); // ავტორიზაციის მარშუტი
Route::post("/register", [UserController::class, "Register"]); // რეგისტრაციის მარშუტი
Route::post("/logout", [LogoutController::class, "Logout"])->middleware("auth:api"); // სისტემიდან გამოსვლის მარშუტი

Route::group(["prefix" => "user", "middleware" => "auth:api"], function() {
    Route::get("/get/{id}", [UserController::class, "User_Get"])->where(["id" => "[0-9]+"]);

    Route::put("info/update", [UserController::class, "Update_Info"]);
});

Route::group(["prefix" => "password", "middleware" => "auth:api"], function() {
    Route::put("/change", [PasswordController::class, "ChangePassword"]);
});

Route::group(["prefix" => "statement", "middleware" => "auth:api"], function() {
    Route::post("/add", [StatementController::class, "CreateStatement"]);

    Route::get("/list", [StatementController::class, "StatementList"]);
});

?>