@extends('layout')

@section('styles')
  @include('share.stayles')
@endsection

@section('content')
    <div class="container">
      <div class="row">
        <div class="col col-md-offset-3 col-md-6">
          <nav class="panel panel-primary">
            <div class="panel-heading">スレッドを編集する画面</div>
            <div class="panel-body">
              @if($errors -> any())
              <div class="alert alert-danger">
                @foreach($errors -> all() as $message)
                <p>{{ $message }}</p>
                @endforeach
              </div> 
              @endif
              @if($type == "board")
              <form action="{{ route('update.bbs', ['id' => $value->id])}}" method="post" enctype="multipart/form-data">
              @elseif($type == "replies")
              <form action="{{ route('Replie_update.bbs',['id'=>$value->id]) }}" method="post" enctype="multipart/form-data">                
              @endif  
              @csrf
              <div class="form-group">
                  <label for="name">名前</label>
                  <input type="text" class="form-control" name="name" id="name" value="{{ $value->name }}" maxlength="30" required>
                </div>
                <div class="form-group">
                  <label for="title">件名</label>
                  <input type="text" class="form-control" name="title" id="title" value="{{ $value->title }}" maxlength="120" required>
                </div>
                <div class="form-group">
                  <label for="message">メッセージ</label><br>
                  <textarea class="form-control" name="message" id="message" cols="30" rows="5" style="white-space: pre-wrap;" maxlength="250" required>{{ $value->message }}</textarea>
                  </select>
                </div>
                <div class="form-group">
                  <label for="image">画像</label>
                  <input type="file" name="image" height="60"> 
                </div>
                <div class="form-group">
                  <label for="email">メールアドレス</label>
                  <input type="email" class="form-control" name="email" id="email" value="{{ $value->email  }}" maxlength="120"> 
                </div>
                <div class="form-group">
                  <label for="website">URL</label>
                  <input type="text" class="form-control" name="website" value="{{ $value->website }}" placeholder="https://" maxlength="256">
                </div>
                <div class="form-group">
                  <label for="text_color">文字色</label>
                  <label class="col1 text_color"><input type="radio" name="text_color" value="#a52a2a"  checked>&nbsp;■</label>
                  <label class="col2 text_color"><input type="radio" name="text_color" value="#008000" >&nbsp;■</label>
                  <label class="col3 text_color"><input type="radio" name="text_color" value="#0000ff" >&nbsp;■</label>
                  <label class="col4 text_color"><input type="radio" name="text_color" value="#800080" >&nbsp;■</label>
                  <label class="col5 text_color"><input type="radio" name="text_color" value="#ff00ff" >&nbsp;■</label>
                  <label class="col6 text_color"><input type="radio" name="text_color" value="#ffa500" >&nbsp;■</label>
                  <label class="col7 text_color"><input type="radio" name="text_color" value="#000080" >&nbsp;■</label>
                  <label class="col8 text_color"><input type="radio" name="text_color" value="#808080" >&nbsp;■</label>
                </div>
                <div class="form-group">
                  <label for="password">削除キー （半角英数字のみで４～８文字）</label>
                  <input type="password" class="form-control" name="delete_key" maxlength="8" value="{{ $value->delete_key }}" required>
                </div>
                <div class="form-group">
                  <input type="checkbox" name="prev" value="1"> 
                  <label for="name">プレビューチェック（投稿前に、内容をプレビューして確認できます）</label>
                </div>
                <div class="text-right">
                  <button type="reset" class="btn btn-primary">リセット</button>
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