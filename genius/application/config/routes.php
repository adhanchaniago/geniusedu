<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['login'] = 'login/index';
$route['logout'] = 'login/logout';
$route['login/aksi'] = 'login/aksi_login';

$route['beranda'] = 'home/index';

$route['master'] = 'home/master';
$route['master/aksi'] = 'home/master_aksi';
$route['master/upload/icon'] = 'home/master_upload_icon';
$route['master/upload/logo'] = 'home/master_upload_logo';

$route['user'] = 'home/user';
$route['user/tambah'] = 'home/user_tambah';
$route['user/tambah/aksi'] = 'home/user_tambah_aksi';
$route['user/edit/(:num)'] = 'home/user_edit/$1';
$route['user/edit/aksi/(:num)'] = 'home/user_edit_aksi/$1';
$route['user/ubahpassword/(:num)'] = 'home/user_ubahpassword/$1';
$route['user/ubahpassword/aksi/(:num)'] = 'home/user_ubahpassword_aksi/$1';
$route['user/hapus/(:num)'] = 'home/user_hapus/$1';

$route['paketbimbel'] = 'home/paketbimbel';
$route['paketbimbel/tambah'] = 'home/paketbimbel_tambah';
$route['paketbimbel/tambah/aksi'] = 'home/paketbimbel_tambah_aksi';
$route['paketbimbel/edit/(:num)'] = 'home/paketbimbel_edit/$1';
$route['paketbimbel/edit/aksi/(:num)'] = 'home/paketbimbel_edit_aksi/$1';
$route['paketbimbel/hapus/(:num)'] = 'home/paketbimbel_hapus/$1';

$route['pesertadidik'] = 'home/pesertadidik';
$route['pesertadidik/tambah'] = 'home/pesertadidik_tambah';
$route['pesertadidik/tambah/aksi'] = 'home/pesertadidik_tambah_aksi';
$route['pesertadidik/edit/(:num)'] = 'home/pesertadidik_edit/$1';
$route['pesertadidik/edit/aksi/(:num)'] = 'home/pesertadidik_edit_aksi/$1';
$route['pesertadidik/hapus/(:num)'] = 'home/pesertadidik_hapus/$1';

$route['guru'] = 'home/guru';
$route['guru/tambah'] = 'home/guru_tambah';
$route['guru/tambah/aksi'] = 'home/guru_tambah_aksi';
$route['guru/edit/(:num)'] = 'home/guru_edit/$1';
$route['guru/edit/aksi/(:num)'] = 'home/guru_edit_aksi/$1';
$route['guru/hapus/(:num)'] = 'home/guru_hapus/$1';

$route['pembayaran'] = 'home/pembayaran';
$route['pembayaran/bayar/(:num)'] = 'home/pembayaran_bayar/$1';
$route['pembayaran/bayar/simpan/(:num)'] = 'home/pembayaran_bayar_simpan/$1';
$route['pembayaran/bayar/aksi/(:num)'] = 'home/pembayaran_bayar_aksi/$1';
$route['pembayaran/bayar/hapus/(:num)'] = 'home/pembayaran_bayar_hapus/$1';
$route['pembayaran/bayar/cetak/(:num)'] = 'home/pembayaran_bayar_cetak/$1';

$route['pengeluaran'] = 'home/pengeluaran';
$route['pengeluaran/tambah'] = 'home/pengeluaran_tambah';
$route['pengeluaran/tambah/aksi'] = 'home/pengeluaran_tambah_aksi';
$route['pengeluaran/hapus/(:num)'] = 'home/pengeluaran_hapus/$1';
$route['pengeluaran/edit/(:num)'] = 'home/pengeluaran_edit/$1';
$route['pengeluaran/edit/aksi/(:num)'] = 'home/pengeluaran_edit_aksi/$1';
$route['pengeluaran/setting'] = 'home/pengeluaran_setting';
$route['pengeluaran/setting/tambah'] = 'home/pengeluaran_setting_tambah';
$route['pengeluaran/setting/tambah/aksi'] = 'home/pengeluaran_setting_tambah_aksi';
$route['pengeluaran/setting/edit/(:num)'] = 'home/pengeluaran_setting_edit/$1';
$route['pengeluaran/setting/edit/aksi/(:num)'] = 'home/pengeluaran_setting_edit_aksi/$1';
$route['pengeluaran/setting/hapus/(:num)'] = 'home/pengeluaran_setting_hapus/$1';