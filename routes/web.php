<?php

use Illuminate\Support\Facades\Route;

Route::get('/', App\Livewire\Dashboard::class)
    ->name('dashboard');
Route::get('/author/add', App\Livewire\Authors\AddAuthorForm::class)
    ->name('author.add');
Route::get('category/add', App\Livewire\Categories\AddCategoryForm::class)
    ->name('category.add');

Route::name('book.')
    ->prefix('book')
    ->group(function () {

        Route::get('/add', App\Livewire\Books\AddBookForm::class)
            ->name('add');
        Route::get('/show', App\Livewire\Books\IndexBooks::class)
            ->name('index');
        Route::get('/edit/{id}', App\Livewire\Books\UpdateBook::class)
            ->name('edit');

    });

