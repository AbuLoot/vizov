@extends('layout')

@section('content')
      <div class="col-md-6 col-md-offset-2 content-block">
        <h3 class="text-center">Авторизация</h3>
        @include('partials.alerts')

        <form method="POST" action="/auth/login">
          {!! csrf_field() !!}
          <div class="form-group">
            <label for="email" class="control-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" minlength="8" maxlength="60" placeholder="Введите email" required>
          </div>
          <div class="form-group">
            <div class="row">              
              <div class="col-md-6 col-sm-6">
                <label for="password" class="control-label">Пароль</label>
              </div>
              <div class="col-md-6 col-sm-6 text-right">
                <a href="/password/email">Забыли пароль?</a>
              </div>
            </div>
            <input type="password" class="form-control" id="password" name="password" minlength="6" maxlength="60" placeholder="Введите пароль" required>
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox" name="remember"> Запомнить меня
            </label>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary">Войти</button>
          </div>
        </form>
      </div>
@endsection