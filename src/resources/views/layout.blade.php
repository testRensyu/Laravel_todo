<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>laravel 掲示板</title>
  @yield('styles')
  <link rel="stylesheet" href="{{ asset('/css/style.css') }}">  
  <style>
      .text_color{
        font-size: 20px;
      }
      .col1{
          color: #a52a2a;
      }
      .col2{
          color: #008000;
      }
      .col3{
          color: #0000ff;
      }
      .col4{
          color: #800080;
      }
      .col5{
          color: #ff00ff;
      }
      .col6{
          color: #ffa500;
      }
      .col7{
          color: #000080;
      }
      .col8{
          color: #808080;
      }
      img{
        width: auto;
        height: 200px;
      }
      .form-button {
            display: inline-block;
      }
      /* 返信のCSSだけを解除する */
      .panel-success>.panel-heading {
        color: #3c763d;
        background-color: #c3e0da;
        border-color: #d6e9c6;
      }
      .panel-success button{
        background-color:#c3e0da;
        color: #3c763d;
      }
      .btn-success {
        border-color: transparent !important;
      }


  </style>
</head>
<body>
  <header>
    <nav class="my-navbar">
      <a href="/top" class="my-navbar-brand">laravel 掲示板</a>
      <div class="my-navbar-control">
      <a class="my-navbar-item" href="#">一覧(新規投稿)</a>
      ｜
      <a class="my-navbar-item" href="#">ワード検索</a>
      ｜      
      <a class="my-navbar-item" href="#">使い方</a>
      ｜
      <a class="my-navbar-item" href="#">携帯へURLを送る</a>
      ｜
      <a class="my-navbar-item" href="#">管理</a>
      </div><!-- close my-navbar-control -->
    </nav>
  </header>
  <main>
    @yield('content') 
  </main>
@yield('scripts')
</body>
</html>