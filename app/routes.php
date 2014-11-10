<?php

Route::get('', [ 'as' => 'app.index', 'uses' => 'ApplicationController@index' ]);
Route::get('/submit', [ 'as' => 'app.submit', 'uses' => 'ApplicationController@submit', 'before' => 'check-query' ]);
Route::post('/submit', [ 'uses' => 'ApplicationController@handleSubmit' ]);