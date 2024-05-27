<?php
//old
namespace App\Http\Controllers;

use App\Board;
use App\Replie;
use Illuminate\Http\Request;

class PasswordCheckController extends Controller
{
    /*-------------------------------------- パスワード入力ページ表示 --------------------------------------*/

    public function show($model, $type, $id)
    {
        return view('password_check',  ['model' => $model, 'type' => $type, 'id' => $id, ]);
    }


    /*-------------------------------------- パスワードチェックメソッド作成 --------------------------------------*/
    
    private function passwordchecktest ($request, $record)
    {
        if( $request->password !== $record->delete_key ){
            return false;
        }
        return true;
    }

    /*------------------------------------------- モデルとタイプ別の分岐 -------------------------------------------*/

    public function check(Request $request, $model, $type, $id)
    {
        
        
        switch ($model) {
            // Boardモデルだった時
            case 'board':
                // レコード取得
                $record = Board::find($id);
                // dd($this->passwordchecktest($request, $record));
                // パスワードチェック
                if($this->passwordchecktest($request, $record)){

                    if($type == "edit" ){
                        return redirect()->action('BbsController@edit', ['id' => $id]);
                    }elseif($type == "delete"){
                        return redirect()->action('BbsController@delete', ['id' => $id]);
                    }

                }else{
                    // パスワードが一致しなかった場合

                    return back();
                }
                break;
            // repliesモデルだった時
            case 'replies':
                // レコード取得
                $record = Replie::find($id);
                // パスワードチェック
                if($this->passwordcheck($request, $record)){

                    if($type == "edit" ){
                        return redirect()->action('ReplieController@edit', ['id' => $id]);
                    }elseif($type == "delete"){
                        return redirect()->action('ReplieController@delete', ['id' => $id]);
                    }
                }else{
                    // パスワードが一致しなかった場合
                    $echotest = "てすとおおおおおおおおおおおおおおお！！！";
                    dd($echotest);
                    return back();
                }
                break;
            default:
                // モデルが判別できなかった時
                return back();
                break;
        }

    }
    // return redirect()->action('LoginController@login', ['id' => 1]);





    // public function check(Request $request, $model, $type, $id)
    // {
    //     if($type == "board_edit"){
    //         // idでレコード取得
    //         $board = Board::find($id);

    //         // passwordチェック
    //         if($request->password == $board->password){

    //         }
            
        
    //     }elseif($type == "board_delete"){

    //     }elseif($type == "replies_edit"){

    //     }elseif($type == "replies_delete"){

    //     }else{
    //         $text = "不正な値が入力されました";
    //     }
    //}
    // モデルの判別
    // if($model == "board"){
    //     $record = Board::find($id);
        
    //     // delete
    //     return redirect()->action('LoginController@login', ['id' => 1]);
    //     // edit
    //     return redirect()->action('LoginController@login', ['id' => 1]);

    // }elseif($model == "replies"){
    //     $record = Replie::find($id);
    //     // delete
    //     return redirect()->action('LoginController@login', ['id' => 1]);
    //     // edit
    //     return redirect()->action('LoginController@login', ['id' => 1]);

    // }else{
    //     // 不正な値だった時
    //     return back();
    // }
    
}//close_classend

