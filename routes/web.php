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

// Route::get('keynes/{id}', function ($id) {
// 	Auth::loginUsingId($id);
// 	return redirect('/');
// });

Route::get('/storage', function () {
	Artisan::call('storage:link');
});

Route::get('storage/{filename}', function ($filename)
{
    $path = storage_path($filename);

    if (!File::exists($path)) {
        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});


Route::get('zohoverify', 'ViewController@zohoverify');

Route::get('alert/{AlertType}','SweetAlertController@alert')->name('alert');
Route::get('/', 'ViewController@index')->name('index');
Route::get('about', 'ViewController@about')->name('about');
Route::get('privacy-policy', 'ViewController@privacy')->name('privacy');
Route::get('term-and-policy', 'ViewController@termandpolicy')->name('termandpolicy');
Route::resource('view-beasiswa', 'PublicBeasiswa');
Route::resource('view-usaha-kecil-menengah', 'PublicUkm');
Route::resource('view-kegiatan-infak', 'Publickegiataninfak');
Route::get('home', 'ViewController@index')->name('index');
Route::get('search', 'ViewController@searchpage')->name('searchpage');
Route::get('faq', 'ViewController@faqpage')->name('faqpage');
Route::get('kalkulator-zakat', 'ViewController@kalkulatorzakat')->name('kalkulatorzakat');
Route::get('doa-zakat', 'ViewController@doazakat')->name('doazakat');

// Login and Signup
// Route::get('/login', 'Auth\LoginController@index');
//Route::get('/signup', 'Auth\LoginController@signup');
Route::auth();

//Route::post('donasi-sekarang/verifikasi', 'DonasiUser@verifikasi')->name('user.verifikasi');
//Route::post('donasi-sekarang/pembayaran-donasi/bayar', 'DonasiUser@prosespembayaran')->name('proses.donasi');
//Route::get('donasi-sekarang/pembayaran-donasi', 'DonasiUser@pembayaran')->name('bayar.donasi');
//Route::resource('donasi-sekarang', 'DonasiUser');

Route::get('/donasi-sekarang/{url}', 'DonasiUser@create');
Route::post('/donasi-sekarang/donate', 'DonasiUser@store');
Route::post('/donasi-sekarang/zakat', 'DonasiUser@storeZakat');
Route::get('/donasi-pembayaran', 'DonasiUser@pembayaran');
Route::get('/donasi-pembayaran-zakat', 'DonasiUser@pembayaranZakat');
Route::get('/donasi-summary', 'DonasiUser@summary');
Route::get('/donasi-summary-zakat', 'DonasiUser@summaryZakat');
Route::get('/donasi-summary-status', 'DonasiUser@summaryStatus');

//Midtrans
Route::post('/donasi-finish', function(){
    return redirect()->route('welcome');
})->name('donation.finish');
Route::post('/notification/handler', 'DonasiUser@notificationHandler')->name('notification.handler');
Route::get('/donasi-status/{token}', 'DonasiUser@getStatus');
Route::post('/notification', 'DonasiUser@notificationKitaBisa')->name('notification.kitabisa');


#aktivasi emaail token
Route::get('/user/activation/{token}', 'Auth\VerifyController@activateUser')->name('user.activate');


// PROKER
Route::get('proker/{slug}', 'ViewProker@show');
Route::get('proker/{slug}/berita', 'ViewProker@shownews');
Route::get('prokers/{kategori}', 'ViewProker@listProkerByKategori');
Route::get('campaign/{slug}', 'ViewProker@show');
Route::get('categories/{kategori}', 'ViewProker@listProkerByKategori');

//Route::get('{slug}', 'ViewProker@show');

//INFAK
Route::get('infak/{slug}', 'ViewProker@show');

Route::get('send', function () {
    return view('sendemail');
});

//Facebook
Route::get('/redirect/{provider}', 'SocialAuthFacebookController@redirect');
Route::get('/callback/{provider}', 'SocialAuthFacebookController@callback');

//Auth::routes();
Auth::routes(['verify' => false]);

Route::prefix('donatur')->group(function() {
	Route::post('berhenti-jadi-donatur-tetap', 'HomeController@stop')->name('stop-donatur');
	Route::get('/', 'HomeController@awal')->name('donatur.index');
	Route::get('/about', 'HomeController@about')->name('donatur-about');
	Route::get('/home', 'HomeController@awal')->name('donatur.home');
	Route::get('riwayat-donasi', 'HomeController@index')->name('donatur.dashboard');
	Route::resource('/beasiswa', 'Beasiswa');
	Route::resource('/usaha-kecil-menengah', 'ViewUkm');
	Route::resource('/kegiatan-infak', 'KegiatanInfak');
	Route::get('/donasi-sekarang', 'HomeController@donasidonatur')->name('donasi.donatur');
	Route::get('/donasi-penyaluran', 'HomeController@donasipenyaluran')->name('donasi.penyaluran');
	Route::get('/edit-profile', 'HomeController@editprofile')->name('edit.profile');
	
	Route::get('/akun', 'HomeController@akun')->name('akun');
	Route::get('/akun/detail', 'HomeController@akundetail')->name('akun.detail');
	Route::get('/akun/edit', 'HomeController@akunedit')->name('akun.edit');

	Route::get('/edit-password', 'HomeController@editpassword')->name('edit.password');
	Route::put('/proses-edit-profile', 'HomeController@proseseditprofile')->name('proses.edit.profile');
	Route::put('/proses-edit-password', 'HomeController@proseseditpassword')->name('proses.edit.password');
	Route::get('/daftar-donatur', 'HomeController@daftardonatur')->name('daftar.donatur');
	Route::get('/daftar-mitra', 'HomeController@daftarmitra')->name('daftar.mitra');
	Route::get('/pembayaran-donatur/{id}/upload-donasi', 'HomeController@pembayarandonatur')->name('pembayaran.donatur');
	Route::post('/pembayaran-donatur/{id}/konfirmasi', 'HomeController@konfirmasi')->name('konfirmasi.bayar');
	Route::get('/view-pembayaran', 'HomeController@index');
	Route::post('/view-pembayaran', 'HomeController@verifikasi')->name('verifikasi.bayar');
	// Route::resource('/view-pembayaran', 'Verifikasi');
	Route::get('/riwayat', 'HomeController@riwayat')->name('riwayat');

	Route::resource('/campaigns', 'CampaignController');
});

Route::middleware(['admin', 'optimizeImages'])->prefix('admin')->group(function() {

	Route::get('/', 'AdminController@index')->name('admin.dashboard');
	Route::get('/login', 'Auth\AdminLoginController@showloginform')->name('admin.login');
	Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
	Route::get('/admin-logout', 'Auth\AdminLoginController@logout');
	Route::get('penyaluran/trash', 'Penyaluran@trash')->name('penyaluran.trash');
	Route::post('/penylauran/{id}/restore', 'Penyaluran@restore')->name('penyaluran.restore');
	Route::delete('/penyaluran/{id}/delete-permanent',
		'Penyaluran@deletepermanent')->name('penyaluran.deletepermanent');
	Route::resource("penyaluran", "Penyaluran");
	Route::resource("manage-donasi-user", "ManageDonasi");

	Route::get("manage-donasi-ngo", "ManageDonasi@ngo")->name('manage-donasi-user.ngo');
	Route::get("manage-donasi-manual", "ManageDonasi@manual")->name('manage-donasi-user.manual');
	Route::get("manage-donasi-status", "ManageDonasi@status")->name('manage-donasi-user.status');

	Route::resource("manageuser", "ManageUsers");
	Route::resource("manageadmin", "ManageAdmin");
	Route::resource("manage-infak", "ManageInfak");
	Route::resource("manage-mitra", "ManageMitra");
	Route::put('/ukm/{id}/cair', 'Ukm@cair')->name('ukm.cair');
	Route::resource("ukm", "Ukm");
	Route::put('/manage-beasiswa/{id}/cair', 'ManageBeasiswa@cair')->name('manage-beasiswa.cair');
	Route::resource("manage-beasiswa", "ManageBeasiswa");
	Route::resource("manage-banner", "ManageBanner");
	Route::resource("manage-kategori", "ManageKategori");
	Route::resource("manage-rekening", "ManageRekening");
	Route::resource("manage-donasi-donatur", "ManageDonasiDonatur");
	Route::post("donasi-update-payment", "ManageDonasi@updatePayment")->name('donasi-update-payment');

	Route::resource("laporan", "Laporan");
	Route::resource("manage-campaign", "ManageProker");
    Route::resource("menu", "MenuController");
    Route::resource("user_role", "UserRoleController");

	Route::get('/prokerpilihan/{id}/{status}', 'ManageProker@prokerPilihan');
	Route::get('/prokerurgent/{id}/{status}', 'ManageProker@prokerUrgent');
	Route::get('/prokerstatus/{id}/{status}', 'ManageProker@prokerStatus');
	Route::get('/konfirmasimanual/{id}/{status}', 'ManageDonasi@konfirmasiManual');
	Route::get('/rekeningstatus/{id}/{status}', 'ManageRekening@rekeningStatus');
	Route::get('/kategoristatus/{id}/{status}', 'ManageKategori@kategoriStatus');
	Route::get('/userstatus/{id}/{status}', 'ManageUsers@userStatus');
	Route::get('/logs', 'ManageAdmin@logs');

});

// Route::get('bank-transfers', 'BankTransferController@index');
// Route::post('bank-transfers', 'BankTransferController@store');

Route::get('cron/check-payment', 'CronPaymentController');

//Fundraiser
Route::get('penggalangan/fundraiser/{url}', 'HomeController@fundraiser')->name('fundraiser');
Route::get('penggalangan/listfundraiser/{url}', 'HomeController@fundraiserlist')->name('fundraiser.list');

// Cronjobs
Route::get('store-donation-csv/{filename?}', 'DonationCronController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
