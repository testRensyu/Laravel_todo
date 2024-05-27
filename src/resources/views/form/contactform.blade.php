@extends('layout')

@section('styles')
  @include('share.stayles')
@endsection

@section('content')
    <div class="container">
      <div class="row">
        <div class="col col-md-offset-3 col-md-6">
          <nav class="panel panel-default">
            <div class="panel-heading">お問い合わせする</div>
            <div class="panel-body">
              @if($errors -> any())
              <div class="alert alert-danger">
                @foreach($errors -> all() as $message)
                <p>{{ $message }}</p>
                @endforeach
              </div>
              @endif
              <form action="{{ route('confirm')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="onamae">名前</label>
                  <input type="text" class="form-control" name="onamae" id="onamae" maxlength="20" required>
                </div>
                <div class="form-group">
                  <label for="mail_address">メールアドレス</label>
                  <input type="email" class="form-control" name="mail_address" id="mail_address" maxlength="100" required> 
                </div>
                <div class="form-group">
                  <label for="sex">性別</label><br>
                  <input type="radio" name="sex" id="sex" value="1" checked>&emsp;男性&emsp;
                  <input type="radio" name="sex" id="sex" value="2">&emsp;女性
                </div>
                <div class="form-group">
                  <label for="cates">お問い合わせ</label><br>
                  <input type="checkbox" name="cates[]" id="cates" value="製品について" checked>&ensp;製品について<br>
                  <input type="checkbox" name="cates[]" id="cates" value="サービスについて">&ensp;サービスについて<br>
                  <input type="checkbox" name="cates[]" id="cates" value="採用について">&ensp;採用について<br>
                  <input type="checkbox" name="cates[]" id="cates" value="その他">&ensp;その他<br>
                </div>
                <div class="form-group">
                  <label for="pref">住まいエリア</label><br>
                  <select name="pref" id="pref" class="form-control">
                    <option value="北海道">北海道</option>
                    <option value="東北">東北</option>
                    <option value="関東">関東</option>
                    <option value="中部">中部</option>
                    <option value="近畿">近畿</option>
                    <option value="中国">中国</option>
                    <option value="四国">四国</option>
                    <option value="九州・沖縄">九州・沖縄</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="message">メッセージ</label><br>
                  <textarea class="form-control" name="message" id="message" cols="30" rows="10" style="white-space: pre-wrap;" maxlength="250" required></textarea>
                  </select>
                </div>
                <div class="form-group">
                  <label for="image">画像</label><br>
                  <input type="file" name="image" class="form-control" height="60" maxlength="250"> 
                </div>
                <div class="text-right">
                  <button type="submit" class="btn btn-primary">送信</button>
                </div>
              </form>
            </div><!-- close_panel-body -->
          </nav>
        </div><!-- close_col col-md-offset-3 col-md-6 -->
      </div><!-- close_row -->
    </div><!-- close_container -->
@endsection