<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title_description', 'Vizov.kz')</title>
    <meta name="description" content="@yield('meta_description', 'Vizov.kz')">

    <link href="/bower_components/bootstrap/dist/css/bootstrap-cosmo.css" rel="stylesheet">
    <link href="/bower_components/bootstrap/dist/css/styles.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    @yield('styles')

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <header class="navbar-basic">
      <div class="container">
        <div class="row">
          <div class="col-md-2 col-sm-2">
            <a href="{{ route('index') }}" class="logo"><i class="glyphicon glyphicon-send"></i> VIZOV</a>
          </div>
          <div class="col-md-6 col-sm-6">
            <form action="/search">
              <div class="input-group">
                <input type="text" class="form-control input-sm" name="text" minlength="2" maxlength="100" placeholder="Введите название услуги или товара" required>
                <span class="input-group-btn">
                  <button class="btn btn-default btn-sm" type="submit">
                    <i class="glyphicon glyphicon-search"></i> Найти
                  </button>
                </span>
              </div>
            </form>
          </div>
          <div class="col-md-4 col-sm-4">
            <div class="btn-group pull-right">
              @if (Auth::guest())
                <a class="btn btn-primary btn-sm" href="/auth/login">Войти</a>
                <a class="btn btn-primary btn-sm" href="/auth/register">Регистрация</a>
              @elseif (Auth::user()->is('user'))
                <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="glyphicon glyphicon-user"></i> {{ Auth::user()->name }} <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                  <li><a href="/my_profile">Мой профиль</a></li>
                  <li><a href="/my_posts">Мои объявления</a></li>
                  <li class="divider"></li>
                  <li><a href="/auth/logout">Выход</a></li>
                </ul>
              @elseif (Auth::user()->is('admin'))
                <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="glyphicon glyphicon-user"></i> {{ Auth::user()->name }} <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                  <li><a href="/admin/users">Пользователи</a></li>
                  <li><a href="/admin/section">Рубрики</a></li>
                  <li><a href="/admin/posts">Объявления</a></li>
                  <li><a href="/admin/pages">Страницы</a></li>
                  <li class="divider"></li>
                  <li><a href="/auth/logout">Выход</a></li>
                </ul>
              @endif
            </div>
          </div>
        </div>
      </div>
    </header>

    <nav class="navbar-services">
      <div class="container">
        <div class="row">
          <div class="col-md-offset-2 col-sm-offset-2 col-md-6 col-sm-6">
            <ul class="nav nav-lines">
              <li @if (Request::is('/', 'uslugi_vyzova', 'uslugi_vyzova/*')) class="active" @endif>
                <a href="{{ route('call') }}">Услуги вызова</a>
              </li>
              <li @if (Request::is('uslugi_remonta', 'uslugi_remonta/*')) class="active" @endif>
                <a href="{{ route('repair') }}">Услуги ремонта</a>
              </li>
              <li @if (Request::is('stroymaterialy', 'stroymaterialy/*')) class="active" @endif>
                <a href="{{ route('materials') }}">Стройматериалы</a>
              </li>
            </ul>
          </div>
          <div class="col-md-4 col-sm-4">
            <a class="btn btn-success btn-sm btn-post-service pull-right" href="{{ route('posts.create') }}">Разместить услугу</a>
          </div>
        </div>
      </div>
    </nav>

    <div class="container">
      <br>
      @yield('content')
    </div>

    <footer class="footer">
      <br>
      <div class="container">
        <div class="col-md-3">
          <p>© 2015 — 2016 «VIZOV»</p>
        </div>
        <div class="col-md-9">
          <ul class="list-unstyled list-inline">
            @foreach ($pages as $page)
              <li><a href="{{ url($page->slug) }}">{{ $page->title }}</a></li>
            @endforeach
          </ul>
        </div>
        <div class="col-md-12 text-center">
          <br>
          <ul class="list-inline">
            <li><a href="#"><i class="fa fa-facebook fa-2x"></i> </a></li>
            <li><a href="#"><i class="fa fa-vk fa-2x"></i> </a></li>
            <li><a href="#"><i class="fa fa-google-plus fa-2x"></i> </a></li>
            <li><a href="#"><i class="fa fa-twitter fa-2x"></i> </a></li>
            <li><a href="#"><i class="fa fa-instagram fa-2x"></i> </a></li>
          </ul>
        </div>
      </div>
      <br>
    </footer>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- // <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    @yield('scripts')
  </body>
</html>
