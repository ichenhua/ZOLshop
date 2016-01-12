<?php 

Route::get('login','Home/User/login');
Route::get('reg','Home/User/reg');
Route::get('home','Home/User/home');

Route::get('/','Home/Index/index');

