<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\UserController;

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

Route::get('admin/dashboard', 'AdminController@index')->name('admin.index');
Route::resource('users', 'AdminUserController');
Route::resource('positions', 'AdminPositionController');
Route::resource('officers', 'AdminOfficerController');
Route::resource('candidates', 'AdminCandidateController');
Route::resource('votes', 'ClientVoteController');
Route::resource('results', 'AdminResultController');
Route::resource('partylists', 'PartylistController');
Route::get('/users/{user}/profile/', 'AdminUserController@editProfile')->name('users.edit-profile');
Route::put('/users/{user}/profile/', 'AdminUserController@updateProfile')->name('users.update-profile');

Route::get('tallies', 'ClientVoteController@tallies')->name('votes.tallies');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
