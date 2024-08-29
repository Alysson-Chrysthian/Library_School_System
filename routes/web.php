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
        
        Route::get('author/show', App\Livewire\Authors\IndexAuthor::class)
            ->name('author.index');
        Route::get('category/index', App\Livewire\Categories\IndexCategory::class)
            ->name('category.index');

        Route::get('author/edit/{id}', App\Livewire\Authors\UpdateAuthor::class)
            ->name('author.edit');
        Route::get('category/edit/{id}', App\Livewire\Categories\UpdateCategory::class)
            ->name('category.edit');

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

Route::middleware('auth')
    ->name('reserve.')
    ->prefix('reserve')
    ->group(function () {

        Route::get('/add', App\Livewire\Reserves\AddReserve::class)
            ->name('add');
        Route::get('/index', App\Livewire\Reserves\IndexReserve::class)
            ->name('index');

    });