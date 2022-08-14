<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::group([

    'middleware' => 'api'

], function ($router) {

    //Auth
    Route::post('login', [AuthController::class,'login']);

    //MovimentacaoFinanceira
    Route::post('store-file', [MovimentacaoController::class,'storeFile']);
    Route::get('get-movimentacoes', [MovimentacaoController::class,'getMovimentacoes']);
});
