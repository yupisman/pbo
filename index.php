<?php

define('VERSION', '0.1.0');

require_once './lib/settings.php';
require_once './lib/library.php';

init();

route('GET', '/', 'HomeController@index');
route('POST', '/tugas', 'HomeController@store');
route('PUT', '/tugas/(\d+)', 'HomeController@update');
route('DELETE', '/tugas/(\d+)', 'HomeController@delete');

run();
