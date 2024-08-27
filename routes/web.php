<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth')
    ->group(function () {
        
        Route::get('/', App\Livewire\Dashboard::class)
            ->name('dashboard');
        Route::get('/author/add', App\Livewire\Authors\AddAuthorForm::class)
            ->name('author.add');
        Route::get('category/add', App\Livewire\Categories\AddCategoryForm::class)
            ->name('category.add');

    });


Route::prefix('auth')
    ->middleware('guest')
    ->group(function () {

        Route::get('/login', App\Livewire\Auth\Login::class)
            ->name('login');

    });

Route::name('book.')
    ->prefix('book')
    ->middleware('auth')
    ->group(function () {

        Route::get('/add', App\Livewire\Books\AddBookForm::class)
            ->name('add');
        Route::get('/show', App\Livewire\Books\IndexBooks::class)
            ->name('index');
        Route::get('/edit/{id}', App\Livewire\Books\UpdateBook::class)
            ->name('edit');

    });

Route::name('student.')
    ->prefix('student')
    ->middleware('auth')
    ->group(function () {

        Route::get('/add', App\Livewire\Students\AddStudentForm::class)
            ->name('add');
        Route::get('/show', App\Livewire\Students\IndexStudents::class)
            ->name('index');
        Route::get('/update/{registration}', App\Livewire\Students\UpdateStudentsForm::class)
            ->name('edit');

    });

Route::name('borrows.')
    ->prefix('loan')
    ->middleware('auth')
    ->group(function () {

        Route::get('/add', App\Livewire\Borrows\AddBorrowForm::class)
            ->name('add');
        Route::get('/show', App\Livewire\Borrows\IndexBorrows::class)
            ->name('index');

    });
