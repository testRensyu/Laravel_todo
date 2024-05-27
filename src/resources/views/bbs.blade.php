@extends('layout')

@section('styles')
  @include('share.stayles')
@endsection

@section('content')
    <div class="container">
      <div class="row">
        <div class="col col-md-offset-3 col-md-6">
          <nav class="panel panel-primary">
            <div class="panel-heading">掲示板に書き込みする</div>
            <div class="panel-body">
              @if($errors -> any())
              <div class="alert alert-danger">
                @foreach($errors -> all() as $message)
                <p>{{ $message }}</p>
                @endforeach
              </div>
              @endif
              <form action="{{ route('entry.bbs') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="name">名前</label>
                  <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" maxlength="30" required>
                </div>
                <div class="form-group">
                  <label for="title">件名</label>
                  <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}" maxlength="120" required>
                </div>
                <div class="form-group">
                  <label for="message">メッセージ</label><br>
                  <textarea class="form-control" name="message" id="message" cols="30" rows="5" style="white-space: pre-wrap;" maxlength="250" required>{{ old('message') }}</textarea>
                  </select>
                </div>
                <div class="form-group">
                  <label for="image">画像</label>
                  <input type="file" name="image" height="60"> 
                </div>
                <div class="form-group">
                  <label for="email">メールアドレス</label>
                  <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}" maxlength="120"> 
                </div>
                <div class="form-group">
                  <label for="website">URL</label>
                  <input type="text" class="form-control" name="website" value="{{ old('website') }}" placeholder="https://" maxlength="256">
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
                  <input type="password" class="form-control" name="delete_key" maxlength="8" required>
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
            </nav>
            <!-- 掲示板ここから -->
            @foreach($bbs as $val)
            
            <div class="panel panel-info">

            @if($val->del_flg == "0")

              <div class="panel-heading">
                <p>{{ $val->title }}</p>
                <p class="text-right">name:{{ $val->name }}</p>
              </div>
              <div class="panel-body">
                <p style="color:{{ $val->text_color }}; white-space: pre-wrap;">{{ $val->message }}</p>
                @if(!is_null($val->image))
                <img src="{{ Storage::url($val->image) }}" alt=""><!-- 通常投稿の場合 -->
                @endif
                <p class="text-right">created_at : {{$val->created_at}}</p>
              </div>

            @elseif($val->del_flg == "1")

              <div class="panel-heading">
                <p>投稿者削除</p>
                <p class="text-right">name:投稿者削除</p>
              </div>
              <div class="panel-body">
                <p style="color:{{ $val->text_color }}; white-space: pre-wrap;">(投稿者により削除されました)</p>
                <p class="text-right">created_at : {{$val->created_at}}</p>
              </div>
              
            @endif

              <div class="panel-footer">
                <!-- ルートパラメーターをコントローラーに渡す --> 
                <form action="{{ route('showresponse.bbs', ['id' => $val->id]) }}" method="post" class="form-button">
                  @csrf
                  <button type="submit" class="btn btn-info">返信</button>
                </form>
                <form action="{{ route('password.show', ['model'=>'board','type'=>'edit','id'=>$val->id,]) }}" method="post" class="form-button">
                  @csrf 
                  <button type="submit" class="btn btn-info">編集</button>
                </form>
                <form action="{{ route('password.show', ['model'=>'board','type'=>'delete','id'=>$val->id,]) }}" method="post" class="form-button">
                  @csrf
                  <button type="submit" class="btn btn-info">削除</button>
                </form>
              </div><!-- close panel-footer -->
              {{-- ******************************************** 返信 ここから *************************************** --}}
              @foreach($replie as $repval)
              
                @if($val->id == $repval->board_id  )
                
                <div class="panel panel-success">
                  




                @if($repval->del_flg == "0")

                  <div class="panel-heading">
                    <p>Re:{{ $repval->title}}</p>
                    <p class="text-right">name:{{ $repval->name }}</p>
                  </div>
                  <div class="panel-body">
                    <p style="color:{{ $repval->text_color }}; white-space: pre-wrap;">{{ $repval->message }}</p>
                    @if(!is_null($repval->image))
                    <img src="{{ Storage::url($repval->image) }}" alt="">
                    @endif
                    <p class="text-right">created_at : {{ $repval->created_at }}</p>
                  </div>

                @elseif($repval->del_flg == "1")

                  <div class="panel-heading">
                    <p>Re:投稿者削除</p>
                    <p class="text-right">name:投稿者削除</p>
                  </div>
                  <div class="panel-body">
                    <p style="color:{{ $repval->text_color }}; white-space: pre-wrap;">(投稿者により削除されました)</p>
                    <p class="text-right">created_at : {{ $repval->created_at }}</p>
                  </div>
                  
                @endif

                <div class="panel-footer">
                <!-- ルートパラメーターをコントローラーに渡す --> 
                  <form action="{{  route('password.show', ['model'=>'replies','type'=>'edit', 'id'=>$repval->id,]) }}" method="post" class="form-button">
                    @csrf 
                    <button type="submit" class="btn btn-success">編集</button>
                  </form>
                  <form action="{{  route('password.show', ['model'=>'replies','type'=>'delete', 'id'=>$repval->id,]) }}" method="post" class="form-button">
                    @csrf
                    <button type="submit" class="btn btn-success">削除</button>
                  </form>
                </div><!-- close panel-footer -->
                </div>
                @endif
              @endforeach
              {{-- ******************************************** 返信 ここまで *************************************** --}}

            </div><!-- close_panel-info -->
            @endforeach            
            <!-- 掲示板ここまで -->
          
        </div><!-- close_col col-md-offset-3 col-md-6 -->
      </div><!-- close_row -->
    </div><!-- close_container -->
@endsection