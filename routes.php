<?php
use MVC\Core\Routing\Route;

Route::get('/', 'SiteController@index');

Route::get('/hello/{nome}', 'SiteController@hello');