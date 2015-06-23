<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>VIZOV</title>

    <link href="/bower_components/bootstrap/dist/css/bootstrap-cosmo.min.css" rel="stylesheet">
    <link href="/bower_components/bootstrap/dist/css/styles.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    @yield('styles')

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

    <header class="slider">
      <div class="container">
        <div class="col-md-2 col-sm-2 el-logo-space">
          <div class="row">
            <a href="{{ route('index') }}" class="logo"><i class="glyphicon glyphicon-flash"></i>VIZOV</a>
          </div>
        </div>
        <div class="col-md-6 col-sm-6 el-search-space">
          <form>
            <div class="input-group">
              <input type="text" class="form-control input-sm" placeholder="Для поиска введите название услуги">
              <span class="input-group-btn">
                <button class="btn btn-default btn-sm" type="button">
                  <i class="glyphicon glyphicon-search"></i> Найти
                </button>
              </span>
            </div>
          </form>
        </div>
        <div class="col-md-4 col-sm-4 el-profile-space">
          <div class="row">
            <ul class="profile-links list-inline pull-right">
              @if (Auth::guest())
                <li><a href="/auth/login">Войти</a></li>
                <li><a href="/auth/register">Регистрация</a></li>
              @else
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="glyphicon glyphicon-user"></i> {{ Auth::user()->name }} <span class="caret"></span></a>
                  <ul class="dropdown-menu pull-right" role="menu">
                    <li><a href="/my_posts">Мои объявления</a></li>
                    <li><a href="/my_profile">Мой профиль</a></li>
                    <li class="divider"></li>
                    <li><a href="/auth/logout">Выход</a></li>
                  </ul>
                </li>
              @endif
            </ul>
          </div>
        </div>
      </div>
    </header>

    <!-- Nav Services -->
    <nav class="bg-nav-services">
      <div class="container">
        <div class="col-md-2 col-sm-2">
          <div class="row">
            <ul class="nav navbar-nav ">
              <li>
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Алматы <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                @foreach(\App\City::all() as $city)
                  <li><a href="#{{ $city->slug }}">{{ $city->title }}</a></li>
                @endforeach
                </ul>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-md-6 col-sm-6">
          <div class="row">
            <ul class="nav nav-lines">
              <li class="@if(Request::is('/') OR Request::path() == 'uslugi_vyzova') active @endif">
                <a href="{{ route('call') }}">Услуги вызова</a>
              </li>
              <li class="@if(Request::path() == 'uslugi_remonta') active @endif">
                <a href="{{ route('repair') }}">Услуги ремонта</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-md-4 col-sm-4">
          <div class="row">
            <a class="btn btn-success btn-sm btn-post-service pull-right" href="{{ route('posts.create') }}">
              <i class="glyphicon glyphicon-plus"></i> Разместить услугу
            </a>
          </div>
        </div>
      </div>
    </nav>

    <div class="container">
      <br>
      @yield('content')
    </div>

    <footer class="footer">
      <hr>
      <div class="container">
        <div class="col-md-3">
          <p>© 2015 — 2016 «VIZOV»</p>
        </div>
        <div class="col-md-9">
          <ul class="list-unstyled list-inline">
            <li><a href="#">О проекте</a></li>
            <li><a href="#">Написать письмо</a></li>
            <li><a href="#">Правила сайта</a></li>
            <li><a href="#">Реклама на сайте</a></li>
            <li><a href="#">Карта сайта</a></li>
          </ul>
        </div>
        <div class="col-md-12 text-center">
          <br>
          <ul class="list-inline">
            <li><a href="#"><i class="fa fa-facebook fa-2x"></i> </a></li>
            <li><a href="#"><i class="fa fa-vk fa-2x"></i> </a></li>
            <li><a href="#"><i class="fa fa-google-plus fa-2x"></i> </a></li>
            <li><a href="#"><i class="fa fa-twitter fa-2x"></i> </a></li>
            <li><a href="#"><i class="fa fa-youtube fa-2x"></i> </a></li>
            <li><a href="#"><i class="fa fa-linkedin fa-2x"></i> </a></li>
            <li><a href="#"><i class="fa fa-instagram fa-2x"></i> </a></li>
          </ul>
        </div>
      </div>
      <br>
    </footer>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    @yield('scripts')
  </body>
</html>