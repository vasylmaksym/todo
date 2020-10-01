<?php

use Core\Router;

Router::get('/', 'MainController@index');
Router::post('/create', 'MainController@create');