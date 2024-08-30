<?php

use App\Http\Controllers\homeController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\themeController;
use Illuminate\Support\Facades\Route;

Route::get('/',[homeController::class, "index"])
    ->name("home.index");
Route::post('/create', [homeController::class, 'create'])->name('home.create');
Route::post("/connect", [homeController::class, "connection"])->name("home.connection");

Route::get("/sucess", function(){
    return "success";
}
)
    ->name("home.sucess");

Route::get("/theme",[themeController::class,"index"])->name("theme.index");
Route::post("/theme/create",[themeController::class, "create"])->name("theme.create");
Route::post("/theme/delete/{id_theme}",[themeController::class,"delete"])->name("theme.delete");
Route::get("/note/{id_theme}", [NoteController::class, "index"])->name("note.index");
Route::post("/note/create/{id_theme}", [NoteController::class, "create"])->name("note.create");
Route::post("/note/delete/{id_note}", [NoteController::class, "delete"])->name("note.delete");
Route::post("/logout",[homeController::class, "disconnect"])->name("home.disconnect");
