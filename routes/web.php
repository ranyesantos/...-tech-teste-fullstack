<?php

declare(strict_types=1);

use App\Http\Controllers\FeedController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubredditController;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', fn (): View|Factory => view('dashboard'))->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function (): void {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', [FeedController::class, 'index'])->name('feed')->middleware('auth');

Route::controller(SubredditController::class)->group(function (): void {
    Route::get('/subreddit/{name}', 'show')->name('subreddit.show');
});

require __DIR__.'/auth.php';
