<?php

Route::get('/', function () {
    return redirect('clear-cache');
});

Route::get('/login', function(){    
    return view('auth.login');
});

Route::get('/clear-cache', function() {
    // $exitCode = Artisan::call('cache:flush');
    $exitCode = Cache::flush();
    // $exitCode = Artisan::call('view:clear');
    // $exitCode = Artisan::call('config:clear');    
    return redirect('login');
   
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


Route::post('GetMunicipio','CneController@GetMunicipios');
Route::post('GetParroquia','CneController@GetParroquias');
Route::post('GetUbchs','CneController@GetUbchs');

Route::get('/ubch','UbchController@index');
Route::post('get_listUbch','UbchController@get_listUbch');
Route::post('get_SearchUbch','UbchController@get_SearchUbch');
Route::post('validaJefeUbch','UbchController@validaJefedeUBCH');

Route::get('/comunidad','ComunidadController@index');
Route::post('get_listComunidad','ComunidadController@get_listComunidad');
Route::post('get_Comunidad','ComunidadController@get_Comunidad');
Route::post('addUserComuniti','AutoUsuarioController@addUserComuniti');
Route::post('updUserComuniti','AutoUsuarioController@updUserComuniti');

Route::get('/calle','CalleController@index');
Route::post('get_SelectComunidad','ComunidadController@get_SelectComunidad');
Route::post('get_listmanzana','CalleController@get_manzana');
Route::post('addUserCalle','AutoUsuarioController@addUserCalle');
Route::post('getManzanero','CalleController@getManzanero');
Route::post('upUserCalle','AutoUsuarioController@upUserCalle');

Route::get('/familia','FamiliaController@index');
Route::post('get_SelectCalle','FamiliaController@get_SelectCalle');
Route::post('validaCedulaFamilia','FamiliaController@validaCedulaFamilia');
Route::post('addGrouoFamilia','FamiliaController@addGroupFamilia');
Route::post('GetListarJefeFamily','FamiliaController@GetListarJefeFamily');
Route::post('getJefeFamilia','FamiliaController@getJefeFamilia');
Route::post('updGroupFmilia','FamiliaController@updGroupFmilia');
Route::post('instMiembroCedulado','FamiliaController@instMiembroCedulado');
Route::post('instMiembroNoCedulado','FamiliaController@instMiembroNoCedulado');
Route::post('GetListarFamily','FamiliaController@GetListarFamily');

Route::post('getRegCdno','RegCdnoControler@getRegCdno');
Route::post('validaemail','AutoUsuarioController@validaemail');
Route::post('addUser','AutoUsuarioController@addUser');
Route::post('get_listComunidad2','ComunidadController@get_listComunidad2');
Route::post('CreateUbchComunidad','ComunidadController@CreateUbchComunidad');
Route::post('UpdateUbchComunidad','ComunidadController@UpdateUbchComunidad');

Route::post('EstadComunidades','EstadisticasController@EstadComunidades');
Route::post('EstadCalles','EstadisticasController@EstadCalles');
Route::post('EstadFamilias','EstadisticasController@EstadFamilias');
Route::post('ChartDona','EstadisticasController@ChartDona');
Route::post('LineComunidades','EstadisticasController@LineComunidades');
Route::post('LineCalles','EstadisticasController@LineCalles');
Route::post('LineFamilias','EstadisticasController@LineFamilias');










Route::get('/register/verify/{code}', 'GuestController@verify');
Route::get('/changePassword','ChangePasswordController@showChangePasswordForm');
Route::post('/changePassword','ChangePasswordController@changePassword')->name('changePassword');
Route::get('profile', 'UserController@profile');
Route::post('profile', 'UserController@update_avatar');
Route::get('adminuser', 'adminController@indexUser');




