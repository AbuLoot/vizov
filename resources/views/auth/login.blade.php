@extends('layout')

@section('content')
      <div class="col-md-6 col-md-offset-2 content-block">
        <h3 class="text-center">Авторизация</h3>
        @if (count($errors) > 0)
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif
        <form method="POST" action="/auth/login">
          {!! csrf_field() !!}
          <div class="form-group">
            <label for="email" class="control-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" minlength="8" maxlength="60" placeholder="Введите email" required>
          </div>
          <div class="form-group">
            <label for="password" class="control-label">Пароль</label>
            <input type="password" class="form-control" id="password" name="password" minlength="6" maxlength="60" placeholder="Введите пароль" required>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary">Войти</button>
          </div>
        </form>
      </div>
@endsection