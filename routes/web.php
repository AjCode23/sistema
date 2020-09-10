<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
###################################################
#rutas para clientes



########################################################

/*Route::post('login/cliente', 'ClienteController@signin');

/*Route::post('login/cliente', 'ClienteController@signin');
Route::get('login/cliente', 'ClienteController@login');*/

Route::post('login/signin', 'LogController@login');
Route::post('login/cliente', 'LogController@loginCliente');
Route::get('change','LogController@change');
Route::get('logCliente','LogController@logCliente');
Route::post('change/pass','LogController@changepass');
Route::get('logout', 'LogController@logout');
Route::get('/', function () {
	return redirect('login');
    return view('welcome');
});


Route::group(['middleware'=>'auth'],function(){
/* Rutas de Clientes*/


Route::group(['middleware' => 'usuarios'], function () {
	



Route::get('/test',function(){
	return Request::path();
});
Route::get('/email', 'CotizacionController@email');
Route::get('/home', 'HomeController@index');




Route::get('articulos/activar/{articulo}', 'ArticuloController@activar');
Route::get('articulos/delete/{articulo}', 'ArticuloController@destroy');
Route::post('articulos/update/{articulo}', 'ArticuloController@update');

Route::get('banco/{banco}/act', 'ClienteController@actBanco');
Route::get('banco/{banco}/del', 'ClienteController@delBanco');
Route::get('telefonos/{tel}/act', 'ClienteController@actTlf');
Route::get('telefonos/{tel}/del', 'ClienteController@delTlf');
Route::get('comercio/{com}/act', 'ClienteController@actComercio');
Route::get('comercio/{com}/del', 'ClienteController@delComercio');
Route::get('clientes/activar/{cliente}', 'ClienteController@activar');
Route::get('clientes/delete/{cliente}', 'ClienteController@destroy');
Route::get('moneda/delete/{moneda}', 'ClienteController@delMoneda');
Route::post('clientes/add/moneda', 'ClienteController@addMoneda');
Route::post('clientes/add/Banco', 'ClienteController@addBanco');
Route::post('clientes/add/comercio', 'ClienteController@addComercio');
Route::post('clientes/update/{cliente}', 'ClienteController@update');
Route::post('clientes/add/telefonos/{cliente}', 'ClienteController@addTlf');
Route::post('clientes/update/{cliente}', 'ClienteController@update');
Route::post('clientes/edit/telefono/{tel}', 'ClienteController@editTlf');
Route::post('clientes/edit/banco/{b}', 'ClienteController@editBanco');
Route::post('clientes/edit/comercio/{c}', 'ClienteController@editComercio');


Route::get('cotizaciones/delete/{id}', 'CotizacionController@destroy');
Route::get('cotizaciones/{id}/editar', 'CotizacionController@editar');
Route::get('cotizaciones/pdf', 'PdfController@cotizaciones');
Route::get('cotizacion/max', 'CotizacionController@max');
Route::get('cotizacion/add/{id}', 'CotizacionController@add');
Route::get('cotizacion/detalles/{id}', 'CotizacionController@detalles');
Route::get('cotizacion/detalles/edit/{id}', 'CotizacionController@detallesEdit');
Route::get('cotizacion/delete/{id}', 'CotizacionController@delete');
Route::get('cotizacion/destroy/full/{id}', 'CotizacionController@destroyFull');
Route::post('cotizaciones/update/orden', 'CotizacionController@update');
Route::post('cotizaciones/update/{id}', 'CotizacionController@Modificar');



Route::get('ordenes/detalles/{id}', 'OrdenController@detalles');
Route::get('ordenes/add/{id}', 'OrdenController@add');

	
Route::post('categorias/update/{id}', 'CategoriaController@update');
Route::get('categoria/delete/{id}', 'CategoriaController@destroy');
Route::get('categoria/act/{id}', 'CategoriaController@activar');


Route::get('facturaciones/pendientes', 'FacturacionController@pendientes');


Route::post('orden/procesar', 'OrdenController@procesar');


Route::get('ordenes/compras', 'OrdenController@OrdenCompras');
Route::get('ordenCompra/{orden}/edit', 'OrdenController@OrdenCompra');



Route::post('compra/aprobar', 'OrdenController@aprobar');



Route::post('permisos/update/{permiso}', 'PermisoController@update');
Route::get('permisos/delete/{id}', 'PermisoController@destroy');
Route::get('permisos/act/{id}', 'PermisoController@activar');
Route::get('permisos/{id}/destroy', 'PermisoController@del');

Route::post('users/pass', 'UserController@pass');
Route::post('users/editar', 'UserController@update');
Route::get('users/desact/{user}', 'UserController@destroy');
//////////////////
#PDFs
//////////////////
Route::get('articulos/pdf', 'PdfController@articulos');
Route::get('clientes/pdf', 'PdfController@clientes');
Route::get('cotizacion/pdf/{orden}', 'PdfController@cotizacion');
Route::get('orden/pdf/{orden}', 'PdfController@orden');

///////////ALMACEN/////////////
Route::get('almacen/ingreso', 'AlmacenController@ingreso');
Route::get('almacen/ingresos', 'AlmacenController@ingresos');
Route::get('almacen/inspecciones', 'AlmacenController@inspecciones');
Route::post('almacen/inspeccion/{id}', 'AlmacenController@saveInspeccion');
Route::post('almacen/inspeccion/update/{id}', 'AlmacenController@editInspeccion');
Route::post('almacen/update/{ingreso}', 'AlmacenController@editIngreso');
Route::post('almacen/delete/{ingreso}', 'AlmacenController@deleteIngreso');
Route::post('almacen/cubiculo/create', 'AlmacenController@createCubiculo');



Route::post('cubiculos/edit/{cubiculo}', 'CubiculoController@update');
Route::post('cubiculos/create', 'CubiculoController@createCubiculos');
Route::get('cubiculos/delete/{cubiculo}', 'CubiculoController@destroy');
Route::get('cubiculos/act/{cubiculo}', 'CubiculoController@act');
Route::get('cubiculos/editar', 'CubiculoController@verificar');
/////////////////////////////////////////
#  RESOURCES
/////////////////////////////////////
Route::resource('ordenes-trabajo','OrdenTrabajoController');
Route::resource('cubiculos','CubiculoController');
Route::resource('almacen','AlmacenController');
Route::resource('articulos','ArticuloController');
Route::resource('clientes','ClienteController');
Route::resource('cotizaciones','CotizacionController');
Route::resource('ordenes','OrdenController');
Route::resource('categorias','CategoriaController');
Route::resource('usuarios','UserController');
Route::resource('facturaciones','FacturacionController');
Route::resource('permisos','PermisoController');



	/*

/////////////////////////////////////////
#  MIDDLEWARE PARA RUTAS DE ADMINISTRADOR
/////////////////////////////////////
Route::group(['middleware' => 'root'], function () {


Route::post('reset','UserController@reset');



*/





});//fin usuarios


Route::group(['middleware' => 'clientes'], function () {

Route::get('cliente/home', 'ClienteController@home');
Route::get('cliente/cotizaciones', 'ClienteController@cotizaciones');
	
Route::get('cotizaciones/aprobacion/{id}', 'CotizacionController@aprobacion');
Route::get('cliente/cotizaciones/{id}', 'CotizacionController@show');
Route::get('cliente/anular/cotizacion/{orden}', 'CotizacionController@AnularCotizacionCliente');
Route::get('cliente/ordenes', 'OrdenController@OrdenCliente');
Route::post('cotizacion/aprobar', 'CotizacionController@aprobar');

Route::get('cliente/cotizacion/pdf/{orden}', 'PdfController@cotizacion');
});//midd clientes

});//fin auth
Auth::routes();

