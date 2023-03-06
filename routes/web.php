<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\HomeController;
use App\Models\UnitOfMeasure;
use Illuminate\Support\Facades\Auth;

use App\Models\Client;
use App\Models\Invoice;
use Illuminate\Support\Facades\Route;

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
})->name('welcome');

Route::get('/panel','PanelController@index')->name('admin.panel');

Route::resource('clients', 'ClientController')->only(['index', 'create', 'store']);
//->middleware(['verified']);
Route::get('invoices/{invoice}/mail', 'MailController@sendMail')->name('invoices.mail');
ROute::get('profile', 'ProfileController@edit')->name('profile.edit');
ROute::put('profile', 'ProfileController@update')->name('profile.update');
Route::get('client/{client}/edit', [\App\Http\Controllers\ClientController::class, 'edit'])->name('client.edit');
Route::post('client/{client}/update', [\App\Http\Controllers\ClientController::class, 'update'])->name('client.update');
Route::delete('client/{client}', [\App\Http\Controllers\ClientController::class, 'destroy'])->name('client.destroy');


Auth::routes([
    'verify' => true,
]);
Route::resource('users', \App\Http\Controllers\UserController::class);
Route::get('users/{user}/assign', 'UserController@assingAdmin')->name('users.assign.admin');
Route::get('users/{user}/approve', 'UserController@approveUser')->name('users.approve');
Route::get('users/{user}/assign/admin', 'UserController@assingAdmin')->name('users.assign.admin');
Route::resource('users', \App\Http\Controllers\UserController::class);
Route::get('users/{user}/assign/editor', 'UserController@assingEditor')->name('users.assign.editor');
Auth::routes();
Route::resource('roles', 'RoleAndPermissionController');

Route::resource('invoices', 'InvoiceController');
Route::put('invoices/{invoice}/update', 'InvoiceController@updateDescription')->name('invoices.description.update');

Route::get('/find', ['as' => 'invoices.find', 'uses' => 'InvoiceController@find']);
Route::get('/create', function () {
    $clients = Client::all();
    return view('invoices.create')->with([
        'clients' => $clients,
    ]);
})->name('invoices.create');

Route::resource('items', 'InvoiceItemController');
Route::resource('companies', 'CompanyController');

Route::get('/user/register', function () {
    return view('auth.postregister');
})->name('postregister');
