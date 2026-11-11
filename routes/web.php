<?php

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

// Public landing & directories
Route::get('/', 'SiteController@home')->name('home');
Route::get('/dataSiswa', 'SiteController@dataSiswa')->name('data.siswa');
Route::get('/dataGuru', 'SiteController@dataGuru')->name('data.guru');

// PPDB Online (Public)
Route::get('/ppdb', 'PpdbController@info')->name('ppdb.info');
Route::get('/ppdb/daftar', 'PpdbController@daftar')->name('ppdb.daftar');
Route::post('/ppdb/daftar', 'PpdbController@store')->name('ppdb.store');
Route::get('/ppdb/cek-status', 'PpdbController@cekStatus')->name('ppdb.cekStatus');
Route::get('/ppdb/bukti/{nomor}', 'PpdbController@bukti')->name('ppdb.bukti');

// Public News & Announcements (CMS)
Route::get('/berita', 'SiteController@berita')->name('berita.index');
Route::get('/berita/{slug}', 'SiteController@detailBerita')->name('berita.detail');
Route::get('/pengumuman', 'SiteController@pengumuman')->name('pengumuman.index');
Route::get('/pengumuman/{slug}', 'SiteController@detailPengumuman')->name('pengumuman.detail');

// Profiles pages
Route::get('/profile/sejarah-singkat', 'ProfilesController@sejarah')->name('profile.sejarah');
Route::get('/profile/visi-misi', 'ProfilesController@visi')->name('profile.visi');
Route::get('/profile/kepala-sekolah', 'ProfilesController@kepala')->name('profile.kepala');
Route::get('/profile/struktur-organisasi', 'ProfilesController@organisasi')->name('profile.organisasi');
Route::get('/profile/prestasi-sekolah', 'ProfilesController@prestasi')->name('profile.prestasi');

// Jurusan Pages (Dynamic + Legacy Slugs)
Route::get('/keahlian/rekayasa-perangkat-lunak', 'JurusanController@rpl')->name('jurusan.rpl');
Route::get('/keahlian/rekayasa-perankat-lunak', 'JurusanController@rpl');
Route::get('/keahlian/geologi-pertambangan', 'JurusanController@gp')->name('jurusan.gp');
Route::get('/keahlian/teknik-komputer-jaringan', 'JurusanController@tkj')->name('jurusan.tkj');
Route::get('/keahlian/pengelolaan-migas-petrokimia', 'JurusanController@tpmp')->name('jurusan.tpmp');
Route::get('/keahlian/pengelolaan-migas-petrokmia', 'JurusanController@tpmp');
Route::get('/keahlian/teknik-kendaraan-ringan', 'JurusanController@tkr')->name('jurusan.tkr');
Route::get('/keahlian/usaha-perjalanan-wisata', 'JurusanController@upw')->name('jurusan.upw');
Route::get('/keahlian/multimedia', 'JurusanController@mm')->name('jurusan.mm');
Route::get('/keahlian/teknik-elektronika-industri', 'JurusanController@tein')->name('jurusan.tein');
Route::get('/keahlian/{slug}', 'JurusanController@show')->name('jurusan.show');

// Authentication routes
Route::get('/login', 'AuthController@login')->name('login');
Route::post('/postlogin', 'AuthController@postlogin')->name('postlogin');
Route::get('/logout', 'AuthController@logout')->name('logout');

// Protected admin routes
Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

    // Siswa Management
    Route::get('/siswa', 'SiswaController@index')->name('siswa.index');
    Route::post('/siswa/create', 'SiswaController@create')->name('siswa.create');
    Route::get('/siswa/{id}/edit', 'SiswaController@edit')->name('siswa.edit');
    Route::post('/siswa/{id}/update', 'SiswaController@update')->name('siswa.update');
    Route::delete('/siswa/{id}', 'SiswaController@delete')->name('siswa.delete');
    Route::get('/siswa/{id}/delete', 'SiswaController@delete');
    Route::get('/siswa/{id}/profile', 'SiswaController@profile')->name('siswa.profile');

    // Guru Management
    Route::get('/admin/gurus', 'GuruController@index')->name('gurus.index');
    Route::get('/admin/gurus/create', 'GuruController@create')->name('gurus.create');
    Route::post('/admin/gurus', 'GuruController@store')->name('gurus.store');
    Route::get('/admin/gurus/{id}/edit', 'GuruController@edit')->name('gurus.edit');
    Route::post('/admin/gurus/{id}/update', 'GuruController@update')->name('gurus.update');
    Route::delete('/admin/gurus/{id}', 'GuruController@destroy')->name('gurus.destroy');

    // Kelas Management
    Route::get('/admin/kelas', 'KelasController@index')->name('kelas.index');
    Route::post('/admin/kelas', 'KelasController@store')->name('kelas.store');
    Route::get('/admin/kelas/{id}/edit', 'KelasController@edit')->name('kelas.edit');
    Route::post('/admin/kelas/{id}/update', 'KelasController@update')->name('kelas.update');
    Route::delete('/admin/kelas/{id}', 'KelasController@destroy')->name('kelas.destroy');

    // Mata Pelajaran Management
    Route::get('/admin/mapels', 'MataPelajaranController@index')->name('mapels.index');
    Route::post('/admin/mapels', 'MataPelajaranController@store')->name('mapels.store');
    Route::get('/admin/mapels/{id}/edit', 'MataPelajaranController@edit')->name('mapels.edit');
    Route::post('/admin/mapels/{id}/update', 'MataPelajaranController@update')->name('mapels.update');
    Route::delete('/admin/mapels/{id}', 'MataPelajaranController@destroy')->name('mapels.destroy');

    // Presensi Siswa Management
    Route::get('/admin/presensi', 'PresensiController@index')->name('presensi.index');
    Route::post('/admin/presensi', 'PresensiController@store')->name('presensi.store');
    Route::delete('/admin/presensi/{id}', 'PresensiController@destroy')->name('presensi.destroy');

    // Nilai Siswa & Transkrip
    Route::get('/admin/nilais', 'NilaiController@index')->name('nilais.index');
    Route::post('/admin/nilais', 'NilaiController@store')->name('nilais.store');
    Route::delete('/admin/nilais/{id}', 'NilaiController@destroy')->name('nilais.destroy');
    Route::get('/admin/nilais/transkrip/{siswa_id}', 'NilaiController@transkrip')->name('nilais.transkrip');

    // PPDB Online Admin Management
    Route::get('/admin/ppdb', 'PpdbAdminController@index')->name('admin.ppdb.index');
    Route::get('/admin/ppdb/{id}', 'PpdbAdminController@show')->name('admin.ppdb.show');
    Route::post('/admin/ppdb/{id}/verifikasi', 'PpdbAdminController@verifikasi')->name('admin.ppdb.verifikasi');
    Route::delete('/admin/ppdb/{id}', 'PpdbAdminController@destroy')->name('admin.ppdb.destroy');

    // Artikel CMS Management
    Route::get('/admin/artikels', 'ArtikelController@index')->name('artikels.index');
    Route::get('/admin/artikels/create', 'ArtikelController@create')->name('artikels.create');
    Route::post('/admin/artikels', 'ArtikelController@store')->name('artikels.store');
    Route::get('/admin/artikels/{id}/edit', 'ArtikelController@edit')->name('artikels.edit');
    Route::post('/admin/artikels/{id}/update', 'ArtikelController@update')->name('artikels.update');
    Route::delete('/admin/artikels/{id}', 'ArtikelController@destroy')->name('artikels.destroy');

    // Pengumuman Management
    Route::get('/admin/pengumumans', 'PengumumanController@index')->name('pengumumans.index');
    Route::get('/admin/pengumumans/create', 'PengumumanController@create')->name('pengumumans.create');
    Route::post('/admin/pengumumans', 'PengumumanController@store')->name('pengumumans.store');
    Route::get('/admin/pengumumans/{id}/edit', 'PengumumanController@edit')->name('pengumumans.edit');
    Route::post('/admin/pengumumans/{id}/update', 'PengumumanController@update')->name('pengumumans.update');
    Route::delete('/admin/pengumumans/{id}', 'PengumumanController@destroy')->name('pengumumans.destroy');

    // Jurusan Management
    Route::get('/admin/jurusans', 'JurusanAdminController@index')->name('jurusans.index');
    Route::get('/admin/jurusans/create', 'JurusanAdminController@create')->name('jurusans.create');
    Route::post('/admin/jurusans', 'JurusanAdminController@store')->name('jurusans.store');
    Route::get('/admin/jurusans/{id}/edit', 'JurusanAdminController@edit')->name('jurusans.edit');
    Route::post('/admin/jurusans/{id}/update', 'JurusanAdminController@update')->name('jurusans.update');
    Route::delete('/admin/jurusans/{id}', 'JurusanAdminController@destroy')->name('jurusans.destroy');
});
