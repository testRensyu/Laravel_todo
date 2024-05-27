@extends('layout')

@section('styles')
  @include('share.stayles')
@endsection

@section('content')
    <div class="container">
      <div class="row">
        <div class="col col-md-offset-3 col-md-6">
          <nav class="panel panel-default">
            <div class="panel-heading">お問い合わせ内容確認</div>
            <div class="panel-body">
            <form action="{{ route('thankspage')}}" method="post" class="confirm">
                @csrf
                <div class="form-group">
                  <label class="bg-color" for="onamae">名前</label>
                  <p>{{ $name }}</p>
                  <input type="hidden" class="form-control" name="onamae" id="onamae" value="{{ $name }}">
                </div>
                <div class="form-group">
                  <label class="bg-color" for="mail_address">メールアドレス</label>
                  <p>{{ $mail_address }}</p>
                  <input type="hidden" class="form-control" name="mail_address" id="mail_address" value="{{ $mail_address }}">
                </div>
                <div class="form-group">
                  <label class="bg-color" for="sex">性別</label><br>
                  @if($sex == 1)
                  <p>男性</p>
                  <input type="hidden" name="sex" id="sex" value="1">
                  @else
                  <p>女性</p>
                  <input type="hidden" name="sex" id="sex" value="2">
                  @endif
                </div>
                <div class="form-group">
                  <label class="bg-color" for="cates">お問い合わせ</label><br>
                  @foreach($cates as $val)
                  <p>{{ $val }}</p>
                  <input type="hidden" name="cates[]" id="cates" value="{{ $val }}" checked>
                  @endforeach
                </div>
                <div class="form-group">
                  <label class="bg-color" for="pref">住まいエリア</label><br>
                  <p>{{ $pref }}</p>
                  <input type="hidden" name="pref" id="pref" value="{{ $pref }}">
                </div>
                <div class="form-group">
                  <label class="bg-color" for="message">メッセージ</label><br>
                  <p style="white-space: pre-wrap;">{{ $message }}</p>
                  <input type="hidden" name="message" id="message" value="{{ $message }}">
                </div>
                <div class="form-group">
                  <label class="bg-color" for="image">画像</label><br>
                  <img src="{{ Storage::url($path) }}" alt="">
                  <input type="hidden" name="image" value="{{ Storage::url($path) }}">
                </div>
                <div class="text-right">
                  <button type="submit" class="btn btn-primary">送信</button>
                </div>
            </div><!-- close_panel-body -->
          </nav>
        </div><!-- close_col col-md-offset-3 col-md-6 -->
      </div><!-- close_row -->
    </div><!-- close_container -->
@endsection