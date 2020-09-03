<?php

use App\Http\Models\ModelCategory;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;
use Symfony\Component\Console\Input\Input;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes(['register'=>false]);

Route::get('/home', 'HomeController@index')->name('home');

// Rotas Produto
Route::get('/products/index', 'ProductController@index')->name('index');
Route::get('/', 'ProductController@Menu')->name('index.home');
Route::get('/products/create', 'ProductController@create')->name('create.products');
Route::get('/products/edit/{id}', 'ProductController@edit')->name('edit.products');
Route::put('/products/update/{id}', 'ProductController@update')->name('update.products');
Route::post('/products/store', 'ProductController@store')->name('store.products');
Route::delete('/products/destroy/{id}', 'ProductController@destroy')->name('destroy.products');
Route::any('/products/search','ProductController@search')->name('products.search');

// Rotas Categorias
Route::get('/category/index', 'CategoryController@index')->name('index.category');
Route::get('/category/create', 'CategoryController@create')->name('create.category');
Route::get('/category/edit/{id}', 'CategoryController@edit')->name('edit.category');
Route::put('/category/update/{id}', 'CategoryController@update')->name('update.category');
Route::post('/category/store', 'CategoryController@store')->name('store.category');
Route::delete('/category/destroy/{id}', 'CategoryController@destroy')->name('destroy.category');
Route::any('/category/search','CategoryController@search')->name('category.search');

// Rotas Estoque
Route::get('/story/index', 'StoryController@index')->name('index.story');
Route::get('/story/create', 'StoryController@create')->name('create.story');
Route::get('/story/edit/{id}', 'StoryController@edit')->name('edit.story');
Route::put('/story/update/{id}', 'StoryController@update')->name('update.story');
Route::post('/story/store', 'StoryController@store')->name('store.story');
Route::delete('/story/destroy/{id}', 'StoryController@destroy')->name('destroy.story');
Route::any('/story/search','StoryController@search')->name('story.search');

// Rotas Deposito
Route::get('/deposito/index', 'DepositoController@index')->name('index.deposito');
Route::get('/deposito/create', 'DepositoController@create')->name('create.deposito');
Route::get('/deposito/edit/{id}', 'DepositoController@edit')->name('edit.deposito');
Route::put('/deposito/update/{id}', 'DepositoController@update')->name('update.deposito');
Route::post('/deposito/store', 'DepositoController@store')->name('store.deposito');
Route::delete('/deposito/destroy/{id}', 'DepositoController@destroy')->name('destroy.deposito');
Route::any('/deposito/search','DepositoController@search')->name('deposito.search');
Route::get('/deposito/FilterSelect/{id}', 'DepositoController@FilterSelect')->name('FilterSelect.deposito');

// Rotas User
Route::get('/user/index', 'UserController@index')->name('index.user');
Route::get('/user/create', 'UserController@create')->name('create.user');
Route::get('/user/edit/{id}', 'UserController@edit')->name('edit.user');
Route::put('/user/update/{id}', 'UserController@update')->name('update.user');
Route::post('/user/store', 'UserController@store')->name('store.user');
Route::delete('/user/destroy/{id}', 'UserController@destroy')->name('destroy.user');
Route::any('/user/search','UserController@search')->name('user.search');

// Rotas Vendas online
Route::get('/vendasonline/index', 'PedidoVendaController@index')->name('index.vendasonline');
Route::get('/vendasonline/create', 'PedidoVendaController@create')->name('create.vendasonline');
Route::get('/vendasonline/edit/{number}', 'PedidoVendaController@edit')->name('edit.vendasonline');
Route::put('/vendasonline/update/{number}', 'PedidoVendaController@update')->name('update.vendasonline');
Route::post('/vendasonline/store', 'PedidoVendaController@store')->name('store.vendasonline');
Route::delete('/vendasonline/destroy/{id}', 'PedidoVendaController@destroy')->name('destroy.vendasonline');
Route::any('/vendasonline/search','PedidoVendaController@search')->name('vendasonline.search');

// Rotas Financeiro
Route::get('/financeiro/index', 'FinanceiroController@index')->name('index.financeiro');
Route::get('/financeiro/indexBaixa', 'FinanceiroController@indexBaixarLancamento')->name('indexBaixa.financeiro');
Route::get('/financeiro/create', 'FinanceiroController@create')->name('create.financeiro');
Route::get('/financeiro/create/{id}', 'FinanceiroController@createbaixalancamento')->name('create.baixalancamento');
Route::get('/financeiro/faturamento/create/{id}', 'FinanceiroController@createFaturamento')->name('create.faturamento');
Route::get('/financeiro/edit/{number}', 'FinanceiroController@edit')->name('edit.financeiro');
Route::put('/financeiro/update/{number}', 'FinanceiroController@update')->name('update.financeiro');
Route::post('/financeiro/store', 'FinanceiroController@store')->name('store.financeiro');
Route::delete('/financeiro/destroy/{id}', 'FinanceiroController@destroy')->name('destroy.financeiro');
Route::any('/financeiro/search','FinanceiroController@search')->name('financeiro.search');
Route::any('/financeiro/search/baixa','FinanceiroController@searchbaixa')->name('financeiro.searchbaixa');

// Rotas Report
Route::get('/relatorio/indexuser', 'JasperReportController@indexUser')->name('report.indexuser');
Route::get('/relatorio/indexproducts', 'JasperReportController@indexProduct')->name('report.indexproducts');
Route::get('/relatorio/user/{name}', 'JasperReportController@generateReportUser')->name('report.user');
Route::get('/relatorio/products/{name}', 'JasperReportController@generateReportProdutos')->name('report.products');

// Rotas Paginas de Usuario
Route::get('/Paginauser/index', 'PaginaUsuarioController@index')->name('index.Paginauser');
Route::get('/Paginauser/create', 'PaginaUsuarioController@create')->name('create.Paginauser');
Route::post('/Paginauser/store', 'PaginaUsuarioController@store')->name('store.Paginauser');
Route::delete('/Paginauser/destroy/{id}', 'PaginaUsuarioController@destroy')->name('destroy.carrinho');

// rotas de filtragem
Route::get('/filtrocategory/{selectcategorys}','PaginaUsuarioController@filterCategory')->name('products.filter');
Route::any('/products/indexuser/search','PaginaUsuarioController@search')->name('user.products.search');

//rota do carrinho
Route::get('/carrinho','PaginaUsuarioController@carrinhoShow')->name('carrinho.show');
Route::get('/pedidovenda','PaginaUsuarioController@pedidoVendaShow')->name('pedidoVenda.show');
Route::put('/produto/updateCarrinho/comprado/{id}','PaginaUsuarioController@updateCarrinhocomprado')->name('Carrinho.updatecomprado');
Route::put('/produto/updateCarrinho/cancelado/{id}','PaginaUsuarioController@updateCarrinhocancelar')->name('Carrinho.updatecancelado');
Route::put('/produto/updateCarrinho/{id}','PaginaUsuarioController@update')->name('carrinho.update');
Route::post('/produto/carrinhoStory','PaginaUsuarioController@carrinhoStore')->name('carrinho.store');

// rota show de produtos
Route::get('/show/{id}','PaginaUsuarioController@Show')->name('products.show');
Route::get('/shows/{id},{selectcategorys}','PaginaUsuarioController@Showfilter')->name('products.showfilter');




