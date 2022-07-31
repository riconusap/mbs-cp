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

    Route::get('/data-client', 'ClientController@index')->name('data-client');
    Route::post('/data-client/post-client', 'ClientController@tambah')->name('post-edit-client');
    Route::delete('/data-client/delete-client/{id}', 'ClientController@delete')->name('delete-client');

    Route::get('/data-tentang-perusahaan', 'TentangPerusahaanController@index')->name('data-tentang-perusahaan');
    Route::post('/data-tentang-perusahaan/post-tentang-perusahaan', 'TentangPerusahaanController@tambah')->name('post-edit-tentang-perusahaan');

    Route::get('/data-jabatan', 'MasterJabatanController@index')->name('data-jabatan');
    Route::post('/data-jabatan/post-jabatan', 'MasterJabatanController@tambah')->name('post-edit-jabatan');
    Route::delete('/data-jabatan/delete-jabatan/{id}', 'MasterJabatanController@delete')->name('delete-jabatan');

    Route::get('/data-expertise', 'ExpertiseContentController@index')->name('data-expertise');
    Route::post('/data-expertise/post-expertise', 'ExpertiseContentController@tambah')->name('post-edit-expertise');
    Route::delete('/data-expertise/delete-expertise/{id}', 'ExpertiseContentController@delete')->name('delete-expertise');

    Route::get('/data-kategori', 'MasterKategoriController@index')->name('data-kategori');
    Route::post('/data-kategori/post-kategori', 'MasterKategoriController@tambah')->name('post-edit-kategori');
    Route::delete('/data-kategori/delete-kategori/{id}', 'MasterKategoriController@delete')->name('delete-kategori');

    Route::get('/data-artikel', 'ArtikelController@index')->name('data-artikel');
    Route::get('/data-artikel/detail/{id}', 'ArtikelController@tambah')->name('data-artikel-detail');
    Route::get('/data-artikel/tambah', 'ArtikelController@tambah')->name('data-artikel-tambah');
    Route::post('/data-artikel/post-artikel', 'ArtikelController@post')->name('post-edit-artikel');
    Route::delete('/data-artikel/delete-artikel/{id}', 'ArtikelController@delete')->name('delete-artikel');

    Route::delete('data-artikel/detail/delete-komentar/{id}', 'ArtikelController@deleteKomentar')->name('data-artikel-delete-komentar');
    Route::delete('data-artikel/detail/delete-komentar-child/{id}', 'ArtikelController@deleteKomentarChild')->name('data-artikel-delete-komentar-child');


});

Auth::routes();
