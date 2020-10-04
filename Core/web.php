<?php

use Core\Router;

Router::get('/', 'MainController@index');

Router::get('/cms', 'MainController@cms');

Router::post('/create', 'MainController@create');
Router::post('/update', 'MainController@update');

Router::post('/login', 'MainController@login');

