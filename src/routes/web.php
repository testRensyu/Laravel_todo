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

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Contact Form作成
|--------------------------------------------------------------------------
|
|
*/

// 入力画面
Route::get('/form/top', 'ContactFromController@showform');

// 確認画面
Route::post('/form/confirm', 'ContactFromController@showConfirm') -> name('confirm');

// thanx画面
Route::post('/form/thanks', 'ContactFromController@thanks')-> name('thankspage');


/*
|--------------------------------------------------------------------------
| laravel bbs作成
|--------------------------------------------------------------------------
|
*/

//bbsトップページ表示
Route::get('/bbs', 'bbsController@showindex')->name('bbs');

//プレビュー画面
Route::post('/prev', 'bbsController@showprv');

//書き込み保存
Route::post('/bbs', 'bbsController@entrybbs')->name('entry.bbs');

//返信ページの表示(boardsのidをコントローラに渡すためクエリパラメーターに含む)
Route::post('/response/{id}', 'bbsController@showresponse')->name('showresponse.bbs');


//返信ページからの返信処理
Route::post('/response/{id}/sled', 'ResponseController@CreateResponseSled')->name('CreateResponse');


//パスワードチェック(いまだにわからん。。。なんでgetもpostも書かなきゃいけないのがわからん。。。)
Route::get('/password_check/{model}/{type}/{id}', 'PasswordCheckController@show')->name('password.show');
Route::post('/password_check/{model}/{type}/{id}', 'PasswordCheckController@check')->name('password.check');



//修正
// (GETリクエストはページを表示するために/POSTリクエストはユーザーからのデータを処理するために利用される？)


// Route::get('/password_check/{model}/{type}/{id}','PasswordCheckController@show')->name('password.show');
// Route::post('/password_check/{model}/{type}/{id}','PasswordCheckController@show');

// Route::get('/password_check/{model}/{type}/{id}/test','PasswordCheckController@check')->name('password.check');
// Route::post('/password_check/{model}/{type}/{id}/test','PasswordCheckController@check');

// 通常書き込み修正ページ表示
Route::get('/board/edit/{id}', 'BbsController@edit')->name('edit.bbs');
// 通常書き込み修正処理
Route::post('/board/edit/{id}', 'BbsController@editUpdate')->name('update.bbs');


// 返信書き込み修正ページ表示
Route::get('/replies/edit/{id}','ResponseController@edit')->name('Replie_edit.bbs');
// 返信書き込み修正処理
Route::post('/replies/edit/{id}','ResponseController@editUpdate')->name('Replie_update.bbs');


// 削除
Route::get('/board/delete/{id}','BbsController@delete');
Route::get('/replies/delete/{id}','ResponseController@delete');
