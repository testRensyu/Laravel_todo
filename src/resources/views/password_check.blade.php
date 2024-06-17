@extends('layout')

@section('styles')
  @include('share.stayles')
@endsection

@section('content')
    <div class="container">
      <div class="row">
        <div class="col col-md-offset-3 col-md-6">
          <nav class="panel panel-primary">
            <div class="panel-heading">パスワード確認</div>
            <div class="panel-body">
            <form action="{{ route('password.check', ['model'=> $model, 'type'=>$type, 'id'=>$id]) }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label for="password">password</label>
                <input type="text" class="form-control" name="password" id="password" value="" maxlength="30" required>
              </div>
              <div class="text-right">
                <button type="submit" class="btn btn-primary">送信</button>
              </div>
          </form>
            </div>
          </nav>
        </div><!-- close_col col-md-offset-3 col-md-6 -->
      </div><!-- close_row -->
    </div><!-- close_container -->
@endsection