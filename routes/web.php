<?php

use Illuminate\Support\Facades\Auth;
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
    $data = array(
        'title' => 'Dashboard',
        'menu' => 'dashboard',
    );
    return view('admin.login', $data);
})->name('login');

Route::get('/login', function () {
    $data = array(
        'title' => 'Dashboard',
        'menu' => 'dashboard',
    );
    return view('admin.login', $data);
})->name('login-page');

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        $data = array(
            'title' => 'Dashboard',
            'menu' => 'dashboard',
        );
        return view('admin.dashboard.index', $data);
    })->name('dashboard');

    Route::get('/data-project', function () {
        $data = array(
            'title' => 'Data Project',
            'menu' => 'data-project'
        );
        return view('admin.data-project.index', $data);
    })->name('data-project');

    Route::get('/data-project/detail', function () {
        $data = array(
            'title' => 'Data Project',
            'menu' => 'data-project'
        );
        return view('admin.data-project.detail', $data);
    })->name('data-project-detail');

    Route::get('/data-project/tambah', function () {
        $data = array(
            'title' => 'Tambah Data Project',
            'menu' => 'data-project'
        );
        return view('admin.data-project.tambah', $data);
    })->name('data-project-detail-tambah');

    Route::get('/data-pegawai','PegawaiController@index' )->name('data-pegawai');
    Route::post('/data-pegawai/post-pegawai', 'PegawaiController@tambah')->name('post-edit-pegawai');
    Route::delete('/data-pegawai/delete-pegawai/{id}', 'PegawaiController@delete')->name('delete-pegawai');

    Route::get('/data-client', function () {
        $data = array(
            'title' => 'Data Client',
            'menu' => 'data-client'
        );
        return view('admin.data-client.index', $data);
    })->name('data-client');

    Route::get('/data-tentang-perusahaan', function () {
        $data = array(
            'title' => 'Data Tentang Perusahaan',
            'menu' => 'data-tentang-perusahaan'
        );
        return view('admin.data-tentang-perusahaan.index', $data);
    })->name('data-tentang-perusahaan');
});

Auth::routes();
