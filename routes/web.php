<?php


use App\Http\Controllers\DisplayController;
use App\Http\Controllers\RegistrationController;


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
Auth::routes();
Route::get('/', function () {
    return view('welcome');
});


//パスリセ
//トップ
Route::get('/',[DisplayController::class,'index'])->name('top');
//検索
Route::get('/search',[DisplayController::class,'itemSearch'])->name('item.search');
//商品詳細
Route::get('/item/{id}/detail',[RegistrationController::class,'itemDetail'])->name('item.detail');


Route::group(['middleware' => 'auth'],function(){
    
    //マイページ
    Route::get('/mypage',[RegistrationController::class,'myPage'])->name('my.page');
    //マイページ編集
    Route::get('/user/edit',[RegistrationController::class,'userEditForm'])->name('user.edit');
    Route::post('/user/edit',[RegistrationController::class,'userEdit']);
    //注文履歴
    Route::get('/order',[RegistrationController::class,'userOrder'])->name('user.order');
    //退会
    Route::get('/user/delete',[RegistrationController::class,'userDelete'])->name('user.delete');
    //カートの中身
    Route::get('/cart/contents',[RegistrationController::class,'cartContents'])->name('cart.contents');
    //カートに入れる
    Route::get('/cart/{id}',[RegistrationController::class,'AddCart'])->name('Add.cart');
    //いいね
    Route::post('/like',[DisplayController::class,'itemLike'])->name('item.like');
    //カートから削除
    Route::get('/cart/{id}/delete',[RegistrationController::class,'cartDelete'])->name('cart.delete');
    //購入完了
    Route::get('/complete/{id}',[RegistrationController::class,'cartComplete'])->name('cart.complete');
    //レビュー
    Route::get('/review/{id}',[RegistrationController::class,'reviewRegistrationForm'])->name('review.form');
    Route::post('/review/{id}',[RegistrationController::class,'reviewRegistration']);

});


    Route::resource('sample', sampleController::class);
  
    //管理者ページ
    Route::get('/admin',[RegistrationController::class,'adminPage'])->name('admin.page');
    //商品リスト
    Route::get('/list',[RegistrationController::class,'itemList'])->name('item.list');
    //商品削除
    Route::get('/item/{id}/delete',[RegistrationController::class,'itemDelete'])->name('item.delete');
    //ユーザーリスト
    Route::get('/user/list',[RegistrationController::class,'userList'])->name('user.list');
    //非表示
    Route::get('/item/{id}/hidden',[RegistrationController::class,'itemHidden'])->name('item.hidden');
    //商品編集
    Route::get('/item/{id}/edit',[RegistrationController::class,'itemEditForm'])->name('item.edit');
    Route::post('/item/{id}/edit',[RegistrationController::class,'itemEdit']);

























//登録商品表示
//Route::get('/item/{id}/detail',[DisplayController::class,'itemDetail'])->name('item.detail');




Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
