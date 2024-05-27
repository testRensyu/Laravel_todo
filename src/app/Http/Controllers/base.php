<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Board;
use App\Replie;
use Illuminate\Http\Request;

class BbsController extends Controller
{
    /*-------------------------------------- bbsトップページ表示 --------------------------------------*/

    public function showindex(Request $request)
    {
        $bbs = Board::all(); //boardsのインスタンス全てを取得。そのためforeachで取得する必要がある。
        
        $replies = Replie::all();

        return view('bbs', [
            'bbs'=>$bbs,
            'replie'=>$replies,
        ]);
        
    }
    /*------------  関数化 ---------------------*/
    
    public function prvCheck(Request $request)
    {
        // 画像の受け取り(リクエストされた画像ファイルの取得)
        $image = $request->file('image'); 
                // 指定したパスに画像データを保存
                if(!is_null($image)){
                    $path = $image->store('public/images'); 
                }elseif(!is_null($request->image)){
                    $path = $request->image;
                }else{
                    $path = null;
                }
    
    }
    
    /*------------ Boardsテーブルへの書き込み / prvの出し分け / imageの受け取り -------------------------*/
    
    public function entrybbs(Request $request)
    {
        // prvの値受け取り
        $prv = $request->prev;

        // 画像の受け取り(リクエストされた画像ファイルの取得)
        $image = $request->file('image'); 

        
        // 指定したパスに画像データを保存
        if(!is_null($image)){
            $path = $image->store('public/images'); 
        }elseif(!is_null($request->image)){
            $path = $request->image;
        }else{
            $path = null;
        }
        
        //プレビューにチェックがあった時の処理
        if($prv === "1"){ 

            return view('prev')->with([
                // 書き込まれた値を代入する
                'type'=>"bbs",
                'name'=>$request->name,
                'title'=>$request->title,
                'message'=>$request->message,
                'text_color'=>$request->text_color,
                'image'=>$path, //"public/images/muEmW675mfgtRX4QMS89bQ4iDcSDZatq9aufCDCG.png"
                'email'=>$request->email,
                'website'=>$request->website,
                'delete_key'=>$request->delete_key,
                'del_flg'=>0,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ]); 

        }else{ 

            //prvにチェックがなかった時の処理
            $bbs = new Board();

            // 書き込まれた値を代入する
            $bbs->name = $request->name;
            $bbs->title = $request->title;
            $bbs->message = $request->message;
            $bbs->text_color = $request->text_color;
            $bbs->image = $path;//"public/images/Gh742TAjwHxrUuknfYoIYoXP46gFCokBLsEjYep0.png"
            $bbs->email = $request->email;
            $bbs->website = $request->website;
            $bbs->delete_key = $request->delete_key;
            $bbs->del_flg = 0;
            $bbs->created_at = Carbon::now();
            $bbs->updated_at = Carbon::now();
            
            $bbs->save();

            return redirect('/bbs');
        }   
    }
    
    /*------------------------------------- スレッドの返信 --------------------------------------*/

    //返信ページの表示
    public function showresponse(Request $request, $id)
    {
        
        $sled = Board::find($id); // boardのインスタンス１レコードのみを取得しているためキー指定で取得する必要がある。
        return view('response', [
            'id' => $id,
            'bbs'=>$sled,
        ]);
    }




    /*------------------------------------- スレッドの編集 --------------------------------------*/

    //編集画面の表示
    public function edit($id)
    {
        //返信ページに飛ばす
        $edit = Board::find($id);

        return view('edit',['value'=>$edit,'type'=>'board',]);
    }

    //編集画面からのデータを登録
    public function editupdate(Request $request, $id)
    {
        // 画像の受け取り(リクエストされた画像ファイルの取得)
        $image = $request->file('image'); 

        // 指定したパスに画像データを保存
        if(!is_null($image)){
            $path = $image->store('public/images'); 
        }elseif(!is_null($request->image)){
            $path = $request->image;
        }else{
            $path = null;
        }
        
        // prvの値受け取り
        $prv = $request->prev;
        //プレビューにチェックがあった時の処理
        if($prv === "1"){ 
            return view('prev')->with([
                // 書き込まれた値を代入する
                'type'=>"edit_bbs",
                'id'=>$id,
                'name'=>$request->name,
                'title'=>$request->title,
                'message'=>$request->message,
                'text_color'=>$request->text_color,
                'image'=>$path,
                'email'=>$request->email,
                'website'=>$request->website,
                'delete_key'=>$request->delete_key,
                'del_flg'=>0,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ]); 

        }else{ 
                
            // 書き込まれた値を代入する
            $bbs = Board::find($id);
            $bbs->name = $request->name;
            $bbs->title = $request->title;
            $bbs->message = $request->message;
            $bbs->text_color = $request->text_color;
            $bbs->image = $path;
            $bbs->email = $request->email;
            $bbs->website = $request->website;
            $bbs->delete_key = $request->delete_key;
            $bbs->del_flg = 0;
            $bbs->created_at = Carbon::now();
            $bbs->updated_at = Carbon::now();
            
            $bbs->save();

            return redirect()->route('bbs');
        }
    }

    /*------------------------------------- スレッドの削除 --------------------------------------*/
    public function delete($id)
    {
        $delete = Board::find($id);
        $delete->del_flg = 1;
        $delete->save();


        return view('/delete');
    }





} // class_Contoller_end
