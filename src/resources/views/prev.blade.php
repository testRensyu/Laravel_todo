@extends('layout')

@section('styles')
  @include('share.stayles')
@endsection

@section('content')
    <div class="container">
      <div class="row">
        <div class="col col-md-offset-3 col-md-6">
          <nav class="panel panel-primary">
            <div class="panel-heading">書き込み内容確認</div>
            <div class="panel-body">
              @if($errors -> any())
              <div class="alert alert-danger">
                @foreach($errors -> all() as $message)
                <p>{{ $message }}</p>
                @endforeach
              </div>
              @endif

              @if($type == "response")
              <form action="{{ route('CreateResponse',['id' => $board_id]) }}" method="post" enctype="multipart/form-data">
              @elseif($type == "edit_bbs")
              <form action="{{ route('update.bbs',['id' => $id]) }}" method="post" enctype="multipart/form-data">
              @elseif($type == "edit_replie")
              <form action="{{ route('Replie_update.bbs',['id' => $id]) }}" method="post" enctype="multipart/form-data">
              @else
              <form action="{{ route('entry.bbs') }}" method="post" enctype="multipart/form-data">
              @endif

                @csrf
                <div class="form-group">
                  <label for="name">名前</label>
                  <p>{{ $name }}</p>
                  <input type="hidden" class="form-control" name="name" id="name" value="{{ $name }}" maxlength="30" required>
                </div>
                <div class="form-group">
                  <label for="title">件名</label>
                  <p>{{ $title }}</p>
                  <input type="hidden" class="form-control" name="title" id="title" value="{{ $title }}" maxlength="120" required>
                </div>
                <div class="form-group">
                  <label for="message">メッセージ</label><br>
                  <p style="white-space: pre-wrap;">{{ $message }}</p>
                  <input type="hidden" name="message" id="message" value="{{ $message }}">
                </div>
                <div class="form-group">
                  <label for="image">画像</label>
                  <img src="{{ Storage::url($image) }}" alt="">
                  <input type="hidden" name="image" id="image" value="{{ $image }}">
                </div>
                <div class="form-group">
                  <label for="email">メールアドレス</label>
                  <p>{{ $email }}</p>
                  <input type="hidden" class="form-control" name="email" id="email" value="{{ $email }}" maxlength="120"> 
                </div>
                <div class="form-group">
                  <label for="website">URL</label>
                  <p>{{ $website }}</p>
                  <input type="hidden" class="form-control" name="website" placeholder="https://" value="{{ $website }}" maxlength="256">
                </div>  
                <div class="form-group">
                  <label for="text_color">文字色</label>
                  <label style="color:{{ $text_color }};"><input type="radio" name="text_color" value="{{ $text_color }}"  checked>&nbsp;■</label>
                </div>
                <div class="form-group">
                  <label for="delete_key">削除キー （半角英数字のみで４～８文字）</label>
                  <p>{{ $delete_key }}</p>
                  <input type="hidden" class="form-control" name="delete_key" value="{{ $delete_key }}">
                </div>
                <div class="text-right">
                  <button type="button" onclick=history.back() class="btn btn-primary">戻る</button>
                  <button type="submit" class="btn btn-primary">送信</button>
                </div>
              </form>
            </div><!-- close_panel-body -->
            <!-- 掲示板ここから -->     
            <!-- 掲示板ここまで -->
          </nav>
        </div><!-- close_col col-md-offset-3 col-md-6 -->
      </div><!-- close_row -->
    </div><!-- close_container -->
@endsection