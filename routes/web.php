<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('mail',[MailController::class,'mail'])->name('mail');

Route::get('send-mail', function () {

    $details = [
        'title' => 'Mail from Testing.com',
        'body' => 'This is for testing email using smtp'
    ];

    Mail::to('yeyintko.mkn@gmail.com')->send(new \App\Mail\MyTestMail($details));

    return  redirect(Route('mail'))->with('status','Message Sending is Successful');

})->name('send-mail');

