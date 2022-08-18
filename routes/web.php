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

// Routers Users
Route::get('/','DashboardUserController@index' )->name('dashboard-user');
Route::get('/attorney/detail/{id}','DetailPegawaiController@detail' )->name('data-detail-attorney');
Route::get('/attorney','DetailPegawaiController@index' )->name('data-attorney');

Route::get('/contactUs', function () {
    $data = array(
        'title' => 'Contact Us',
        'menu' => 'data-contact-us'
    );
    return view('user.contactUs.index', $data);
})->name('data-contact-us');

Route::get('/artikel/detail/{slug}','ArtikelUserController@detail' )->name('data-detail-artikel-user');
Route::get('/artikel','ArtikelUserController@index' )->name('data-artikel-user');
Route::post('/postKomen','ArtikelUserController@postKomentar' )->name('postKomen');
Route::post('/postKomen-reply','ArtikelUserController@postKomentarReply' )->name('postKomenReply');
Route::get('/artikel/search/{kategori}','ArtikelUserController@artikelGroupByKategori' )->name('data-artikel-user-by-kategori');

// end Routers user

Route::get('/admin/login', function () {
    $data = array(
        'title' => 'Dashboard',
        'menu' => 'dashboard',
    );
    return view('admin.login', $data);
})->name('login-page');


Route::middleware(['auth'])->group(function () {

    Route::get('/admin', function () {
        $data = array(
            'title' => 'Dashboard',
            'menu' => 'dashboard',
        );
        return view('admin.dashboard.index', $data);
    })->name('dashboard');

    Route::get('/admin/data-project', function () {
        $data = array(
            'title' => 'Data Project',
            'menu' => 'data-project'
        );
        return view('admin.data-project.index', $data);
    })->name('data-project');

    Route::get('/admin/data-project/detail', function () {
        $data = array(
            'title' => 'Data Project',
            'menu' => 'data-project'
        );
        return view('admin.data-project.detail', $data);
    })->name('data-project-detail');

    Route::get('/admin/data-project/tambah', function () {
        $data = array(
            'title' => 'Tambah Data Project',
            'menu' => 'data-project'
        );
        return view('admin.data-project.tambah', $data);
    })->name('data-project-detail-tambah');

    Route::get('/admin/data-pegawai','PegawaiController@index' )->name('data-pegawai');
    Route::post('/admin/data-pegawai/post-pegawai', 'PegawaiController@tambah')->name('post-edit-pegawai');
    Route::delete('/admin/data-pegawai/delete-pegawai/{id}', 'PegawaiController@delete')->name('delete-pegawai');

    Route::get('/admin/data-client', 'ClientController@index')->name('data-client');
    Route::post('/admin/data-client/post-client', 'ClientController@tambah')->name('post-edit-client');
    Route::delete('/admin/data-client/delete-client/{id}', 'ClientController@delete')->name('delete-client');

    Route::get('/admin/data-tentang-perusahaan', 'TentangPerusahaanController@index')->name('data-tentang-perusahaan');
    Route::post('/admin/data-tentang-perusahaan/post-tentang-perusahaan', 'TentangPerusahaanController@tambah')->name('post-edit-tentang-perusahaan');

    Route::get('/admin/data-jabatan', 'MasterJabatanController@index')->name('data-jabatan');
    Route::post('/admin/data-jabatan/post-jabatan', 'MasterJabatanController@tambah')->name('post-edit-jabatan');
    Route::delete('/admin/data-jabatan/delete-jabatan/{id}', 'MasterJabatanController@delete')->name('delete-jabatan');

    Route::get('/admin/data-expertise', 'ExpertiseContentController@index')->name('data-expertise');
    Route::post('/admin/data-expertise/post-expertise', 'ExpertiseContentController@tambah')->name('post-edit-expertise');
    Route::delete('/admin/data-expertise/delete-expertise/{id}', 'ExpertiseContentController@delete')->name('delete-expertise');

    Route::get('/admin/data-kategori', 'MasterKategoriController@index')->name('data-kategori');
    Route::post('/admin/data-kategori/post-kategori', 'MasterKategoriController@tambah')->name('post-edit-kategori');
    Route::delete('/admin/data-kategori/delete-kategori/{id}', 'MasterKategoriController@delete')->name('delete-kategori');

    Route::get('/admin/data-artikel', 'ArtikelController@index')->name('data-artikel');
    Route::get('/admin/data-artikel/detail/{id}', 'ArtikelController@tambah')->name('data-artikel-detail');
    Route::get('/admin/data-artikel/tambah', 'ArtikelController@tambah')->name('data-artikel-tambah');
    Route::post('/admin/data-artikel/post-artikel', 'ArtikelController@post')->name('post-edit-artikel');
    Route::delete('/admin/data-artikel/delete-artikel/{id}', 'ArtikelController@delete')->name('delete-artikel');

    Route::delete('delete-komentar/{id}', 'ArtikelController@deleteKomentar')->name('data-artikel-delete-komentar');
    Route::delete('delete-komentar-child/{id}', 'ArtikelController@deleteKomentarChild')->name('data-artikel-delete-komentar-child');

    Route::get('/admin/users', 'UsersController@index')->name('users');
    Route::post('/admin/users/resetPassword', 'auth\ResetPasswordController@resetPassword')->name('reset');
});

Auth::routes();
