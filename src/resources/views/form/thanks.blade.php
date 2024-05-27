@extends('layout')

@section('styles')
  @include('share.stayles')
@endsection

@section('content')
    <div class="container">
      <div class="row">
        <div class="col col-md-offset-3 col-md-6">
          <nav class="panel panel-default">
            <div class="panel-heading">
              <h1>ありがとうございます</h1>
              <p>以下の内容でお問い合わせを受け付けました。</p>
            </div>
            <div class="panel-body">
            <form action="#" method="post" class="confirm">
                @csrf
                <div class="form-group">
                  <label class="bg-color" for="onamae">名前</label>
                  <p>{{ $name }}</p>
                </div>
                <div class="form-group">
                  <label class="bg-color" for="mail_address">メールアドレス</label>
                  <p>{{ $mail_address }}</p>
                </div>
                <div class="form-group">
                  <label class="bg-color" for="sex">性別</label><br>
                  @if($sex == 1)
                  <p>男性</p>
                  @else
                  <p>女性</p>
                  @endif
                </div>
                <div class="form-group">
                  <label class="bg-color" for="cates">お問い合わせ</label><br>
                  @foreach($cates as $val)
                  <p>{{ $val }}</p>
                  @endforeach
                </div>
                <div class="form-group">
                  <label class="bg-color" for="pref">住まいエリア</label><br>
                  <p>{{ $pref }}</p>
                </div>
                <div class="form-group">
                  <label class="bg-color" for="message">メッセージ</label><br>
                  <p style="white-space: pre-wrap;">{{ $message }}</p>
                </div>
                <div class="form-group">
                  <label class="bg-color" for="image">画像</label><br>
                  <img src="{{ $path }}" alt="">
                </div>
              </form>
              <a href="/top">戻る</a>
            </div><!-- close_panel-body -->
          </nav>
        </div><!-- close_col col-md-offset-3 col-md-6 -->
      </div><!-- close_row -->
    </div><!-- close_container -->
@endsection