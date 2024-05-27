@extends('layout')

@section('styles')
  @include('share.stayles')
@endsection

@section('content')
    <div class="container">
      <div class="row">
        <div class="col col-md-offset-3 col-md-6">
          <nav class="panel panel-primary">
            <div class="panel-heading">削除画面</div>
            <div class="panel-body">
              @if($errors -> any())
              <div class="alert alert-danger">
                @foreach($errors -> all() as $message)
                <p>{{ $message }}</p>
                @endforeach
              </div>
              @endif
              <p>指定したデータを削除しました。</p>
              <a href="/bbs">topへ戻る</a>
            </div><!-- close_panel-body -->
            </nav>          
        </div><!-- close_col col-md-offset-3 col-md-6 -->
      </div><!-- close_row -->
    </div><!-- close_container -->
@endsection