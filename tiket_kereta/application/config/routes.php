<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['pesanTiket'] = 'guest/pesanTiket';
$route['pesan/(:any)'] = 'guest/pesan/$1';
$route['cariTiket'] = 'guest/cari_tiket';

$route['default_controller'] = 'guest/keHalamanDepan';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
