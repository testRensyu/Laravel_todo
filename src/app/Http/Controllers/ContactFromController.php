<?php

namespace App\Http\Controllers;

use App\ContactForm; //ContactFormモデルの呼び出し
use Illuminate\Http\Request;
use App\Http\Requests\ContactFormRequest; 

class ContactFromController extends Controller
{
    // formの表示
    public function showform(Request $request){
        return view('contactform');
    }


    // 確認画面の表示
    public function showConfirm(ContactFormRequest $request)
    {
        
        // 画像の受け取り
        $image = $request->file('image'); // リクエストされた画像ファイルの取得

        // 指定したパスに画像データを保存
        if(!is_null($image)){
            $path = $image->store('public/images'); 
        }else{
            $path = null;
        }

        return view('confirm')->with([
            'name' => $request->onamae,
            'mail_address'=>$request->mail_address,
            'sex'=>$request->sex,
            'cates'=>$request->cates,
            'pref'=>$request->pref,
            'message'=>$request->message,
            'image'=>$image,
            'path'=>$path,

         ]); 
    }




    // DBに登録する
    public function thanks(ContactFormRequest $request)
    {
        // インスタンス化
        $form = new ContactForm();
        
        // リクエスト内容をDB登録
        $form->name = $request->onamae;
        $form->mail_address = $request->mail_address;
        $form->sex = $request->sex;
        $form->cates = implode(',', $request->cates);
        $form->pref = $request->pref;
        $form->message = $request->message;
        $form->image = $request->image;

        $form->save();

        return view('thanks')->with([
            'name' => $request->onamae,
            'mail_address'=>$request->mail_address,
            'sex'=>$request->sex,
            'cates'=>$request->cates,
            'pref'=>$request->pref,
            'message'=>$request->message,
            'path'=>$request->image,

         ]); 

    }

}
