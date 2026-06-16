<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomePageCardController;
use App\Http\Controllers\ContactBranchDetailsController;
use App\Http\Controllers\ChairmanSpeechController;
use App\Http\Controllers\BankProfileController;
use App\Http\Controllers\SavingAccountDocController;
use App\Http\Controllers\OpenedSavingAccountController;

Route::get('/home-page-cards', [HomePageCardController::class, 'index']);
Route::get('/contact-branch-page-cards', [ContactBranchDetailsController::class, 'index']);
Route::get('/chairman-speech', [ChairmanSpeechController::class, 'index']);
Route::get('/bank-profile', [BankProfileController::class, 'index']);
Route::get('/saving-acc-req-doc', [SavingAccountDocController::class, 'index']);
Route::post(
    '/open-saving-account',
    [OpenedSavingAccountController::class, 'store']
);

Route::get('/valid-req-doc', [SavingAccountDocController::class, 'validDocs']);
