<?php

use Core\Router;

Router::get('/', 'MainController@index');

Router::get('/cms', 'MainController@cms');

Router::post('/create', 'MainController@create_or_update');
Router::post('/update', 'MainController@create_or_update');

Router::post('/login', 'MainController@login');
Router::post('/logout', 'MainController@logout');

