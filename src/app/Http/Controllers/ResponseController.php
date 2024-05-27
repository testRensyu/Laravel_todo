<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Replie;
use Illuminate\Http\Request;

class ResponseController extends Controller
{
    /*------------ Repliesテーブルへの書き込み / prvの出し分け / imageの受け取り -------------------------*/
    
    public function CreateResponseSled(Request $request, $id)
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
           //"public/images/9WL00f0s6ZZparmXj8kMllVmJ7RCMuVKmoifWiW3.png"

            return view('prev')->with([
                // 書き込まれた値を代入する
                "type"=> "response",
                'board_id'=>$id,
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

            //prvにチェックがなかった時の処理
            $replies = new Replie();

            // 書き込まれた値を代入する
            $replies->board_id = $id;
            $replies->name = $request->name;
            $replies->title = $request->title;
            $replies->message = $request->message;
            $replies->text_color = $request->text_color;
            $replies->image = $path;
            $replies->email = $request->email;
            $replies->website = $request->website;
            $replies->delete_key = $request->delete_key;
            $replies->del_flg = 0;
            $replies->created_at = Carbon::now();
            $replies->updated_at = Carbon::now();
            
            $replies->save();

            return redirect('/bbs');
        }   
    }
    
    /*------------------------------------- スレッドの編集 --------------------------------------*/

    public function edit($id)
    {
        //返信ページに飛ばす
        $edit = Replie::find($id);


        return view('edit',['value'=>$edit,'type'=>'replies',]);
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
                'type'=>"edit_replie",
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
            $bbs = Replie::find($id);
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
        $delete = Replie::find($id);
        $delete->del_flg = 1;
        $delete->save();


        return view('/delete');
    }

}
